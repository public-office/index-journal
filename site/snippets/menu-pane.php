<section class="menu-pane" <?php if ($page->template() == 'essay') : ?>style="background-color: rgb(<?= $page->parent()->issue_color() ?>); box-shadow: 0px 11px 16px 0px rgba(<?= $page->parent()->issue_color() ?>,1);" <?php endif ?>>
    <h1 class="close">(close)</h1>

    <h1>INDEX JOURNAL</h1>
    <h1 style="">Issues</h1>
    <ul style="margin-top:0">
        <?php foreach ($site->find('issues')->children()->listed() as $subPage) : ?>
            <h1><a href="<?= $subPage->url() ?>">Issue No. <?= $subPage->num() ?> <span style="text-transform:uppercase"><?= $subPage->title() ?></span></a></h1>

        <?php endforeach ?>
    </ul>
    <?php foreach ($site->children()->listed()->flip() as $subPage) : ?>
        <h1><a href="<?= $subPage->url() ?>"><?= $subPage->title() ?></a></h1>
    <?php endforeach ?>
    <h1><a href="<?= $site->url() ?>/emaj">EMAJ</a></h1>
</section>