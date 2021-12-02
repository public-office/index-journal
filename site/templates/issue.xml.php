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
            <?php foreach ($page->children()->listed() as $subPage) : ?>
                <?php if ($subPage->hasChildren()) : ?>
                    <?php foreach ($subPage->children()->listed() as $essay) : ?>
                        <journal_article publication_type="full_text">
                            <titles>
                                <title><?= $essay->title() ?><?php if ($essay->subtitle()->isNotEmpty()) : ?>: <?= $essay->subtitle() ?><?php endif ?></title>
                            </titles>
                            <contributors>
                                <?php foreach ($essay->authors()->toStructure()->slice(0, 1) as $author) : ?>
                                    <person_name sequence="first" contributor_role="author">
                                        <given_name><?= $author->first_name() ?></given_name>
                                        <surname><?= $author->last_name() ?></surname>
                                        <?php if ($author->orcid()->isNotEmpty()) : ?>
                                            <ORCID><?= $author->orcid() ?></ORCID>
                                        <?php endif ?>
                                    </person_name>
                                <?php endforeach ?>
                                <?php foreach ($essay->authors()->toStructure()->slice(1) as $author) : ?>
                                    <person_name sequence="additional" contributor_role="author">
                                        <given_name><?= $author->first_name() ?></given_name>
                                        <surname><?= $author->last_name() ?></surname>
                                        <?php if ($author->orcid()->isNotEmpty()) : ?>
                                            <ORCID><?= $author->orcid() ?></ORCID>
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
                                <doi><?= $essay->doi() ?></doi>
                                <resource><?= $essay->url() ?></resource>
                            </doi_data>
                        </journal_article>
                    <?php endforeach ?>
                <?php else :
                    $essay = $subPage
                ?>
                    <journal_article publication_type="full_text">
                        <titles>
                            <title><?= $subPage->title() ?></title>
                        </titles>
                        <contributors>
                            <?php foreach ($essay->authors()->toStructure()->slice(0,1) as $author) : ?>
                                <person_name sequence="first" contributor_role="author">
                                    <given_name><?= $author->first_name() ?></given_name>
                                    <surname><?= $author->last_name() ?></surname>
                                    <?php if ($author->orcid()->isNotEmpty()) : ?>
                                        <ORCID><?= $author->orcid() ?></ORCID>
                                    <?php endif ?>
                                </person_name>
                            <?php endforeach ?>
                            <?php foreach ($essay->authors()->toStructure()->slice(1) as $author) : ?>
                                <person_name sequence="additional" contributor_role="author">
                                    <given_name><?= $author->first_name() ?></given_name>
                                    <surname><?= $author->last_name() ?></surname>
                                    <?php if ($author->orcid()->isNotEmpty()) : ?>
                                        <ORCID><?= $author->orcid() ?></ORCID>
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
                            <doi><?= $essay->doi() ?></doi>
                            <resource><?= $essay->url() ?></resource>
                        </doi_data>
                    </journal_article>
                <?php endif ?>
            <?php endforeach ?>
        </journal>
    </body>
</doi_batch>