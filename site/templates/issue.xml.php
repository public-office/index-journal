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
                <issue><?= $page->issue_num() ?></issue>
                <doi_data>
                    <doi><?= $page->issue_doi() ?></doi>
                    <resource><? $page->url() ?></resource>
                </doi_data>
            </journal_issue>

            <?php foreach ($page->children() as $subPage) : ?>


                // if the subPage has children – i.e., it is a 'section' – then get essays in the section
                <?php if ($subPage->hasChildren()) : ?>
                    <?php foreach ($page->children() as $essay) : ?>
                        <journal_article publication_type="full_text">
                            <titles>
                                <title><?php $essay->title() ?></title>
                            </titles>
                            <contributors>
                                <?php foreach ($page->authors()->toStructure() as $author) : ?>
                                    <person_name sequence="first" contributor_role="author">
                                        <given_name><?php $author->first_name() ?></given_name>
                                        <surname><?php $author->last_name() ?></surname>
                                        <?php if ($author->orcid()->isNotEmpty()) : ?>
                                            <ORCID><?php $author->orcid() ?></ORCID>
                                        <?php endif ?>
                                    </person_name>
                                <?php endforeach ?>
                            </contributors>
                            <publication_date media_type="print">
                                <year><?= $page->issue_date()->toDate('Y') ?></year>
                            </publication_date>
                            <publication_date media_type="online">
                                <year><?= $page->issue_date()->toDate('Y') ?></year>
                            </publication_date>
                            <doi_data>
                                <doi><?php $essay->doi() ?></doi>
                                <resource><?php $essay->url() ?></resource>
                            </doi_data>
                        </journal_article>
                    <?php endforeach ?>

                    // if it is not a Section, then it is an Essay — so just print the contents of the the Essay
                <?php else :
                        $essay = $subPage
                ?>
                    <?= $essay->title() ?>
                <?php endif ?>
            <?php endforeach ?>
        </journal>
    </body>
</doi_batch>