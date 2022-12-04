<section class="menu-pane" <?php if ($page->template() == 'essay') : ?>style="background-color: rgb(<?= $page->parent()->issue_color() ?>); box-shadow: 0px 11px 16px 0px rgba(<?= $page->parent()->issue_color() ?>,1);" <?php endif ?>>
    <h1 class="close">(close)</h1>

    <h1 style="display: flex;flex-direction: row;">
        <a href="/">INDEX JOURNAL</a>
        <?php foreach (page('issues')->children()->listed()->flip()->slice(0, 1) as $issue) : ?>
            <a href="<?= $issue->url() ?>" class="current-issue"><span>, Issue </span><span>No. </span><?= $issue->num() ?><span style="text-transform: uppercase;"> <?= $issue->title() ?></span></a>
        <?php endforeach ?>
    </h1>
    <h1 style="">Issues</h1>
    <ul style="margin-top:0">
        <?php foreach ($site->find('issues')->children()->listed() as $subPage) : ?>
            <h1><a href="<?= $subPage->url() ?>">Issue No. <?= $subPage->num() ?> <span style="text-transform:uppercase"><?= $subPage->title() ?></span></a></h1>

        <?php endforeach ?>
    </ul>
    <h1><a href="/books">Books</a></h1>

    <ul style="margin-top:0">
        <?php foreach ($site->find('books')->children()->listed() as $subPage) : ?>
            <h1><a href="<?= $subPage->url() ?>"><span style=""><?= $subPage->title() ?></span></a></h1>

        <?php endforeach ?>
    </ul>
    <h1><a href="/about">About</a></h1>
    <h1><a href="<?= $site->url() ?>/emaj">EMAJ</a></h1>
</section>