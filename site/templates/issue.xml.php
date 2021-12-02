<doi_batch xmlns="http://www.crossref.org/schema/4.4.2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="4.4.2" xsi:schemaLocation="http://www.crossref.org/schema/4.4.2 http://www.crossref.org/schema/deposit/crossref4.4.2.xsd">
    <script />

    <head>
        <doi_batch_id>index-journal-<?php echo date("YmdHis") ?></doi_batch_id>
        <timestamp><?php echo date("YmdHis") ?></timestamp>
        <depositor>
            <depositor_name>indj</depositor_name>
            <email_address>editors@index-journal.org</email_address>
        </depositor>
        <registrant>WEB-FORM</registrant>
    </head>

    <body>
        <journal>
            <journal_metadata>
                <full_title>Index Journal</full_title>
                <abbrev_title>Index</abbrev_title>
                <issn media_type="electronic">26524740</issn>
                <doi_data>
                    <doi>10.38030/index-journal</doi>
                    <resource>http://www.index-journal.org/</resource>
                </doi_data>
            </journal_metadata>
            <journal_issue>
                <publication_date media_type="print">
                    <year><?= $page->issue_date()->toDate('Y') ?></year>
                </publication_date>
                <publication_date media_type="online">
                    <year><?= $page->issue_date()->toDate('Y') ?></year>
                </publication_date>
                <issue><?= $page->issue_num()?></issue>
                <doi_data>
                    <doi><?= $page->issue_doi() ?></doi>
                    <resource>http://index-journal.org/issues/law</resource>
                </doi_data>
            </journal_issue>

            <journal_article publication_type="full_text">
                <titles>
                    <title>Editors' Introduction</title>
                </titles>
                <contributors>
                    <person_name sequence="first" contributor_role="author">
                        <given_name>Desmond</given_name>
                        <surname>Manderson</surname>
                        <ORCID>https://orcid.org/0000-0002-0376-4394</ORCID>
                    </person_name>
                    <person_name sequence="additional" contributor_role="author">
                        <given_name>Ian</given_name>
                        <surname>McLean</surname>
                        <ORCID>https://orcid.org/0000-0002-8830-6500</ORCID>
                    </person_name>
                </contributors>
                <publication_date media_type="print">
                    <year>2020</year>
                </publication_date>
                <publication_date media_type="online">
                    <year>2020</year>
                </publication_date>
                <doi_data>
                    <doi>10.38030/index-journal.2020.2.0</doi>
                    <resource>http://index-journal.org/issues/law/editors-introduction-by-desmond-manderson-and-ian-mclean</resource>
                </doi_data>
            </journal_article>
        </journal>
    </body>
</doi_batch>