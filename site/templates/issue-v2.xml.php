<doi_batch xmlns="http://www.crossref.org/schema/4.4.2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="4.4.2" xsi:schemaLocation="http://www.crossref.org/schema/4.4.2 http://www.crossref.org/schema/deposit/crossref4.4.2.xsd">

    <head>
        <doi_batch_id>index-journal-<?php echo date("YmdHis") ?></doi_batch_id>
        <timestamp>2021010100000000</timestamp>
        <depositor>
            <depositor_name>indj</depositor_name>
            <email_address>editors@index-journal.org</email_address>
        </depositor>
    </head>

    <body>
        <journal>
            <journal_metadata language="en" reference_distribution_opts="any">
                <full_title>Index Journal</full_title>
                <abbrev_title>Index</abbrev_title>
                <issn media_type="electronic">2652-4740</issn>
                <doi_data>
                    <doi>10.38030/index-journal</doi>
                    <timestamp><?php echo date("YmdHis") ?></timestamp>
                    <resource>http://www.index-journal.org/</resource>
                </doi_data>
            </journal_metadata>

            <journal_issue>
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
                    <month><?= $page->issue_date()->toDate('m') ?></month>
                    <day><?= $page->issue_date()->toDate('d') ?></day>
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
                            <jats:abstract>
                                <jats:p xml:lang="en"><?= $essay->abstract() ?></jats:p>
                            </jats:abstract>
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
                        <jats:abstract>
                            <jats:p xml:lang="en"><?= $essay->abstract() ?></jats:p>
                        </jats:abstract>
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
                <?php endif ?>
            <?php endforeach ?>
        </journal>
    </body>
</doi_batch>