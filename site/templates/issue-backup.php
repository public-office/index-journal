<?php snippet('header') ?>

  <main>
    <?php $sections = $page->cfp_builder()->toStructure() ?>
    <?php foreach($sections as $section): ?>
      <section class="initial">
        <?= $section->message()->kirbytext() ?>
      </section>

      <figure class="wipe" style="background-image: url('<?= $section->wipe_img()->toFile()->url() ?>');"></figure>
      <section class="spacer"></section>

      <div class="text-block">
        <section class="call">
          <?= $section->secondary_text()->kirbytext() ?>

          <section class="title-block">
            <span class="title-block-issue">Issue No.<?= $page->num() ?> <span class="title"><?= $page->title() ?></span></span>
            <div class="issue-items">
              <ul>
                <?php if($page->hasChildren()): ?>
                  <?php foreach($page->children()->listed() as $article): ?>
                    <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>
                  <?php endforeach ?>
                <?php endif ?>
              </ul>
            </div>
          </section>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
        </section>
      </div>
    <?php endforeach ?>
  </main>
  <div class="issue-overlay">
    <span class="issue-overlay-close">(close)</span>
    <img src="<?= $page->issue_image()->toFile()->url() ?>" alt="">
  </div>
</body>
</html>
