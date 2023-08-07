<?php

function generateXML($issueData, $essaysData)
{
    $baseXml = <<<XML
    <xsd:schema xmlns="http://www.crossref.org/schema/5.3.1" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:fr="http://www.crossref.org/fundref.xsd" xmlns:ct="http://www.crossref.org/clinicaltrials.xsd" xmlns:ai="http://www.crossref.org/AccessIndicators.xsd" xmlns:rel="http://www.crossref.org/relations.xsd" xmlns:mml="http://www.w3.org/1998/Math/MathML" xmlns:jats="http://www.ncbi.nlm.nih.gov/JATS1" targetNamespace="http://www.crossref.org/schema/5.3.1"></xsd:schema>
    XML;

    $xml = new SimpleXMLElement($baseXml);



    // Journal Volume (Issue)
    $journalVolume = $xml->addChild('journal_volume');
    $journalVolume->addChild('volume', htmlspecialchars($issueData['number']));

    // Optional: Add doi_data if you have a DOI for the entire volume
    // $doiData = $journalVolume->addChild('doi_data');
    // $doiData->addChild('doi', htmlspecialchars($issueData['issue_doi']));
    // $doiData->addChild('resource', 'YOUR_RESOURCE_URL');

    // Essays (Journal Articles)
    foreach ($essaysData as $essay) {
        $journalArticle = $xml->addChild('journal_article');

        // Titles
        $titles = $journalArticle->addChild('titles');
        $titles->addChild('title', htmlspecialchars($essay['title']));
        if (!empty($essay['subtitle'])) {
            $titles->addChild('subtitle', htmlspecialchars($essay['subtitle']));
        }

        // Contributors (Authors)
        if (!empty($essay['authors'])) {
            $contributors = $journalArticle->addChild('contributors');
            foreach ($essay['authors'] as $author) {
                $personName = $contributors->addChild('person_name');
                $personName->addAttribute('contributor_role', 'author'); // Assuming all are authors
                $personName->addAttribute('sequence', 'first'); // Change as per requirement
                $personName->addChild('given_name', htmlspecialchars($author['first_name']));
                $personName->addChild('surname', htmlspecialchars($author['last_name']));
            }
        }

        // Abstract
        if (!empty($essay['abstract'])) {
            $journalArticle->addChild('jats:abstract', htmlspecialchars($essay['abstract']));
        }

        // Publication date (Assuming it's the issue date for now)
        $publicationDate = $journalArticle->addChild('publication_date');
        $publicationDate->addAttribute('media_type', 'print'); // Change as per requirement
        $publicationDate->addChild('month', htmlspecialchars(date('m', strtotime($issueData['issue_date']))));
        $publicationDate->addChild('day', htmlspecialchars(date('d', strtotime($issueData['issue_date']))));
        $publicationDate->addChild('year', htmlspecialchars(date('Y', strtotime($issueData['issue_date']))));

        // DOI Data
        $doiData = $journalArticle->addChild('doi_data');
        $doiData->addChild('doi', htmlspecialchars($essay['doi']));
        $doiData->addChild('resource', 'YOUR_RESOURCE_URL_FOR_ESSAY'); // Provide the appropriate resource URL for the essay.
    }

    return $xml->asXML();
}


Kirby::plugin('paris-lettau/crossref-register', [
    'routes' => [
        [
            'pattern' => 'generate-xml/(:all)',
            'action'  => function ($issueId) {
                $issue = page($issueId);
                if (!$issue) {
                    return new Response('Issue not found', 'html', 404);
                }

                // Extract issue data
                $issueData = [
                    // 'cover_image' => $issue->issue_cover()->toFile()->url(),
                    // 'color'       => $issue->issue_color()->value(),
                    'doi'         => $issue->issue_doi()->value(),
                    'date'        => $issue->issue_date()->toDate('Y-m-d'),
                    'number'      => $issue->issue_num()->value(),
                    'editors'     => $issue->editors()->toStructure()->toArray(),
                ];

                // Iterate through the issue's essays
                $essaysData = [];
                foreach ($issue->descendants()->listed()->filterBy('template', 'essay') as $essay) {
                    $essayData = [
                        'title'    => $essay->title()->value(),
                        'subtitle' => $essay->subtitle()->value(),
                        'authors'  => $essay->authors()->toStructure()->toArray(),
                        'doi'      => $essay->doi()->value(),
                        'abstract' => $essay->abstract()->value(),
                    ];
                    $essaysData[] = $essayData;
                }

                // Generate XML
                $xml = generateXML($issueData, $essaysData);

                // Return XML as downloadable response
                return new Response($xml, 'application/xml', 200, [
                    'Content-Disposition' => 'attachment; filename="crossref.xml"'
                ]);
            }
        ]
    ]


]);
