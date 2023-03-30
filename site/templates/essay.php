<?php snippet('header') ?>

<head>
  <!-- https://scholar.google.com/intl/en/scholar/inclusion.html#indexing -->
  <meta name="citation_title" content="<?= $page->title() ?>">
  <?php foreach ($page->authors()->yaml() as $author) : ?>
    <meta name="citation_author" content="<?= $author['last_name'] ?>, <?= $author['first_name'] ?>">
  <?php endforeach ?>
  <meta name="citation_publication_date" content="<?= $page->parent()->issue_date()->toDate('Y/m/d') ?>">
  <meta name="citation_journal_title" content="<?= $site->title() ?>">
  <meta name="citation_volume" content="<?= $page->parent()->issue_date()->toDate('Y') ?>">
  <meta name="citation_issue" content="<?= $page->parent()->num() ?>">
  <meta name="citation_pdf_url" content="<?= $page->documents()->first()->url() ?>">
</head>

<main data-template="<?= $page->template() ?>">

  <section class="title-block" style="background-color: rgb(<?= $page->parent()->issue_color() ?>)">
    <h1 style="font-size:6vw"><span class="title"><?= $page->title() ?></span>
      <?php if ($page->subtitle()->isNotEmpty()) : ?><span class="subtitle"><?= smartypants($page->subtitle()->kti()) ?></span><?php endif ?>
      <?php if ($page->slug() != 'introduction') : ?><span class="author">by <?= $page->author() ?></span><?php endif ?>
    </h1>
  </section>
  <div class="text-block">
    <?php if ($page->slug() != 'introduction') : ?><?php if ($page->hasDocuments()) : ?><span class="pdf">(<a href="<?= $page->documents()->first()->url() ?>" target="_blank">PDF</a>)</span><?php endif ?></span><?php endif ?>
<?php if ($page->abstract()->isNotEmpty()) : ?>
  <div class="abstract-block">
    <div class="abstract-content">
      <div class="shadow"></div>
      <div class="abstract hidden"><?= smartypants($page->abstract()->kirbytext()) ?></div>
    </div>
  </div>
<?php endif ?>

<?= smartypants($page->text()->kirbytext()) ?>

<div class="text-bios">
  <?= smartypants($page->bios()->kirbytext()) ?>
</div>

<?php if ($page->bibilography()->isNotEmpty()) : ?>
  <p style="font-size: var(--font-small); text-indent: 0; text-transform: uppercase; margin-bottom: 1em;">Bibliography</p>
  <div class="text-bibliography">
    <?= smartypants($page->bibilography()->kirbytext()) ?>
  </div>
<?php endif ?>
  </div>
  <?php if ($page->slug() != 'introduction') : ?><span class="essay-extra">(<?php if ($page->doi()->isNotEmpty()) : ?><span class="doi"><a href="http://doi.org/<?= $page->doi() ?>"><?= $page->doi() ?></a>)</span><?php endif ?><?php endif ?>
</main>
</body>

</html>