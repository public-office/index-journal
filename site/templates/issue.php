<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <? $sections = $page->cfp_builder()->toStructure() ?>
    <? foreach($sections as $section): ?>
      <section class="initial">
        <?= $section->message()->kirbytext() ?>
      </section>

      <figure class="wipe" style="background-image: url('<?= $section->wipe_img()->toFile()->url() ?>');"></figure>
      <section class="spacer"></section>

      <div class="text-block">
        <section class="call">
          <?= $section->secondary_text()->kirbytext() ?>

          <section class="title-block">
            <h1>Issue No.<?= $page->num() ?> <span class="title"><?= $page->title() ?></span></h1>
            <div class="issue-items">
              <ul>
                <? if($page->hasChildren()): ?>
                  <? foreach($page->children()->listed() as $article): ?>
                    <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>
                  <? endforeach ?>
                <? endif ?>
              </ul>
            </div>
          </section>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
        </section>
      </div>
    <? endforeach ?>

  </main>
</body>
</html>
