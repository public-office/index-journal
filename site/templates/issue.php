<? snippet('header') ?>

<main>
<style>
  .doi{
    position:fixed;
    bottom:0;
    left:0;
    padding: 1rem;

  }

  .issue{
    position:fixed;
    bottom:0;
    right:0;
    padding: 1rem;
  }
</style>
  <div class="doi"><h1> <?= $page->issue_doi() ?></h1></div>
  <div class="issue"><h1><?= $page->issue_date()->toDate('d m Y') ?></h1></div>


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
        <? $sections = $page->cfp_builder()->toStructure() ?>
        <? foreach ($sections as $section) : ?>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: relative; "><?= $section->wipe_img_caption() ?></p>
        <? endforeach ?>
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