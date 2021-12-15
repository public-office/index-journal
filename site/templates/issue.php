<? snippet('header') ?>

<main>
  <? $sections = $page->cfp_builder()->toStructure() ?>
  <? foreach ($sections as $section) : ?>
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
                <? if ($page->hasChildren()) : ?>


                  <li><? if ($page->hasDocuments()) : ?><span class="title">(<a href="<?= $page->documents()->first()->url() ?>" target="_blank">PDF</a>)</span><? endif ?> </li>
                  <? foreach ($page->children()->listed()->template('essay') as $article) : ?>

                    <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span><? if ($article->subtitle()->isNotEmpty()) : ?><span class="essay-subtitle"><?= $article->subtitle()->kti() ?></span><? endif ?> by <?= $article->author() ?></a></li>

                  <? endforeach ?>
                <? endif ?>
              </ul>
            </div>


            <!--START OF SECTIONS-->
            <div class="issue-sections">
              <!--         IF ISSUE HAS SECTIONS, GET EACH SECTION OF THE ISSUE-->
              <? if ($page->hasChildren()) : ?>
                <? foreach ($page->children()->listed()->template('section') as $section) : ?>
                  <div class="title-block-section" style=""><span class="title"><?= $section->title() ?></span></div>
                  <ul>
                    <!--         IF SECTION HAS ARTICLES, GET EACH ARTICLE FROM SECTION-->
                    <? if ($section->hasChildren()) : ?>
                      <? foreach ($section->children()->listed() as $article) : ?>
                        <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span><? if ($article->subtitle()->isNotEmpty()) : ?><span class="section-subtitle"><?= $article->subtitle()->kti() ?></span><? endif ?> by <?= $article->author() ?></a></li>
                      <? endforeach ?>
                    <? endif ?>
                  </ul>
                <? endforeach ?>
              <? endif ?>
            </div>
            <!--END OF SECTIONS-->
          </div>
        </section>
      </section>
      <style>
        .meta-container {
          padding: 1rem;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
        }
      </style>
      <div class="meta-container">
        <div class="issue-doi">
          <h2 style="margin:0;max-width:unset"> <?= $page->issue_doi() ?></h2>
        </div>
        <div class="issue-issue">
          <h2 style="margin:0;max-width:unset"><?= $page->issue_date()->toDate('d F Y') ?></h2>
        </div>
      </div>
    </div>
  <? endforeach ?>
</main>
<div class="issue-overlay">
  <span class="issue-overlay-close">(close)</span>
  <img src="<?= $page->issue_image()->toFile()->url() ?>" alt="">
  <? $sections = $page->cfp_builder()->toStructure() ?>
  <figcaption style="text-align: center;max-width: 78%;">
    <? foreach ($sections as $section) : ?><?= $section->wipe_img_caption() ?> <? endforeach ?>
  </figcaption>
</div>
</body>

</html>