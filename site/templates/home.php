<?= snippet('header') ?>

<main>
  <?= if($page->show_hide() == 'true'): ?>
    <?= $sections = $page->cfp_builder()->toStructure() ?>
    <?= foreach($sections as $section): ?>
      <section class="initial">
        <?= $section->message()->kirbytext() ?>
      </section>

      <figure class="wipe" style="background-image: url('<?= $section->wipe_img()->toFile()->url() ?>');"></figure>
      <section class="spacer"></section>

      <div class="text-block">
        <section class="call">
          <?= $section->secondary_text()->kirbytext() ?>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
        </section>
      </div>
    <?= endforeach ?>
  <?= else: ?>
  <?= foreach(page('issues')->children()->listed()->flip()->limit(1) as $home): ?>
    <?= $sections = $home->cfp_builder()->toStructure() ?>
    <?= foreach($sections as $section): ?>
      <section class="initial">
        <?= $section->message()->kirbytext() ?>
      </section>

      <figure class="wipe" style="background-image: url('<?= $section->wipe_img()->toFile()->url() ?>');"></figure>
      <section class="spacer"></section>

      <div class="text-block">
        <section class="call">
          <?= $section->secondary_text()->kirbytext() ?>

          <section class="title-block">
            <span class="title-block-issue">Issue No.<?= $home->num() ?> <span class="title"><?= $home->title() ?></span></span>
            <div class="issue-items">
              <ul>
                <?= if($home->hasChildren()): ?>
                  <?= foreach($home->children()->listed() as $article): ?>
                    <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>
                  <?= endforeach ?>
                <?= endif ?>
              </ul>
            </div>
          </section>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
        </section>
      </div>
    <?= endforeach ?>
    <div class="issue-overlay">
      <span class="issue-overlay-close">(close)</span>
      <img src="<?= $home->issue_image()->toFile()->url() ?>" alt="">
    </div>
  <?= endforeach ?>
<?= endif ?>


</main>
</body>
</html>
