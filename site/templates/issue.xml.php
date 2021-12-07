<?xml version="1.0" encoding="UTF-8"?>
<doi_batch xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.crossref.org/schema/5.3.0 ../../schemas/crossref5.3.0.xsd"
    xmlns="http://www.crossref.org/schema/5.3.0" xmlns:jats="http://www.ncbi.nlm.nih.gov/JATS1"
    xmlns:fr="http://www.crossref.org/fundref.xsd" version="5.3.0" xmlns:mml="http://www.w3.org/1998/Math/MathML">
    <head>
        <doi_batch_id>index-journal-<?php echo date("YmdHis") ?></doi_batch_id>
        <timestamp>2021010100000000</timestamp>
        <depositor>
            <depositor_name>indj</depositor_name>
            <email_address>editors@index-journal.org</email_address>
        </depositor>
        <!-- <registrant>Society of Metadata Idealists</registrant> -->
    </head>
    <body>
        <journal>
            <journal_metadata language="en" reference_distribution_opts="any">
                <full_title>Index Journal</full_title>
                <abbrev_title>Index</abbrev_title>
                <issn media_type="electronic">2652-4740</issn>
                <!-- <coden>xyIUB8</coden> -->
                <!-- <archive_locations>
                    <archive name="Portico"/>
                    <archive name="CLOCKSS"/>
                    <archive name="DWT"/>
                    <archive name="Internet Archive"/>
                    <archive name="KB"/>
                    <archive name="LOCKSS"/>
                </archive_locations> -->
                <doi_data>
                    <doi>10.38030/index-journal</doi>
                    <timestamp><?php echo date("YmdHis") ?></timestamp>
                    <resource>http://www.index-journal.org/</resource>
                </doi_data>
            </journal_metadata>

            <journal_issue>
                <!-- contributors and title are mostly relevant for special issues that have guest editors -->
                <contributors>
                    <?php foreach ($page->editors()->toStructure()->slice(0, 1) as $editor) : ?>
                        <person_name sequence="first" contributor_role="editor">
                            <given_name><?= $editor->first_name() ?></given_name>
                            <surname><?= $editor->last_name() ?></surname>
                            <?php if ($editor->orcid()->isNotEmpty()) : ?>
                                <ORCID><?= $editor->orcid() ?></ORCID>
                            <?php endif ?>
                        </person_name>
                    <?php endforeach ?>
                    <?php foreach ($page->editors()->toStructure()->slice(1) as $editor) : ?>
                        <person_name sequence="additional" contributor_role="editor">
                            <given_name><?= $editor->first_name() ?></given_name>
                            <surname><?= $editor->last_name() ?></surname>
                            <?php if ($editor->orcid()->isNotEmpty()) : ?>
                                <ORCID><?= $editor->orcid() ?></ORCID>
                            <?php endif ?>
                        </person_name>
                    <?php endforeach ?>
                </contributors>
                <titles>
                    <title><?php $page->title() ?></title> 
                </titles>
                <publication_date media_type="online">
                    <month>07</month>
                    <day>07</day>
                    <year>2021</year>
                </publication_date>
                <journal_volume>
                    <volume>4</volume>
                    <doi_data>
                        <doi>10.32013/U.4fAZy4</doi>
                        <resource>https://gitlab.com/crossref/schema</resource>
                    </doi_data>
                </journal_volume>
                <issue>1</issue>
                <doi_data>
                    <doi>10.32013/B2Y7qLJ</doi>
                    <resource>https://gitlab.com/crossref/schema</resource>
                </doi_data>
            </journal_issue>
        </journal>        
    </body>
</doi_batch>
