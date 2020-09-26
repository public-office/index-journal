<? snippet('header') ?>

<main>
  <? $sections = $page->cfp_builder()->toStructure() ?>
  <? foreach($sections as $section): ?>
  <section class="initial ">
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
          <div class="issue-essays">
            <ul>
              <? if($page->hasChildren()): ?>
             
              
              <li><? if($page->hasDocuments()): ?><span class="title">(<a href="<?= $page->documents()->first()->url() ?>" target="_blank">PDF</a>)</span><? endif ?> </li>
              <? foreach($page->children()->listed()->template('essay') as $article): ?>

              <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>

              <? endforeach ?>
              <? endif ?>
            </ul>
          </div>

          <!--START OF SECTIONS-->
          <div class="issue-sections">
            <!--         IF ISSUE HAS SECTIONS, GET EACH SECTION OF THE ISSUE-->
            <? if($page->hasChildren()): ?>
            <? foreach($page->children()->listed()->template('section') as $section): ?>
            <div class="title-block-section" style=""><span class="title"><?= $section->title() ?></span></div>
            <ul>
              <!--         IF SECTION HAS ARTICLES, GET EACH ARTICLE FROM SECTION-->
              <? if($section->hasChildren()): ?>
              <? foreach($section->children()->listed() as $article): ?>
              <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span><? if($article->subtitle()->isNotEmpty()): ?><span class="section-subtitle"><?= $article->subtitle()->kti() ?></span><? endif ?> by <?= $article->author() ?></a></li>
              <? endforeach ?>
              <? endif ?>
            </ul>
            <? endforeach ?>
            <? endif ?>
          </div>
          <!--END OF SECTIONS-->
        </div>
      </section>
      <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
    </section>
  </div>
  <? endforeach ?>
</main>
<div class="issue-overlay">
  <span class="issue-overlay-close">(close)</span>
  <img src="<?= $page->issue_image()->toFile()->url() ?>" alt="">
</div>
</body>

</html>
