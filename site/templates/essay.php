<?php snippet('header') ?>
<?php echo $page->counterCss(); ?>
<main data-template="<?= $page->template() ?>">
  <!-- Title -->
  <section class="title-block" style="background-color: rgb(<?= $page->parent()->issue_color() ?>)">
    <h1 style="font-size:6vw">
      <span class="title"><?= $page->title() ?></span>
      <?php if ($page->subtitle()->isNotEmpty()) : ?>
        <span class="subtitle"><?= smartypants($page->subtitle()->kti()) ?></span>
      <?php endif ?>
      <?php if ($page->slug() != 'introduction') : ?>
        <span class="author">by <?= $page->author() ?></span>
      <?php endif ?>
    </h1>
  </section>

  <!-- Text -->
  <div class="text-block">
    <?php if ($page->slug() != 'introduction') : ?>
      <?php if ($page->hasDocuments()) : ?>
        <span class="pdf">(<a href="<?= $page->documents()->first()->url() ?>" target="_blank" rel="noopener noreferrer">PDF</a>)</span>
      <?php endif ?>
    <?php endif ?>
    <!-- content -->
    <div class="content-block">
      <?= smartypants($page->text()->kirbytext()) ?>
    </div>
  </div>

  <!-- Bios -->
  <div class="text-bios">
    <?= smartypants($page->bios()->kirbytext()) ?>
  </div>

  <!-- bibliographies -->
  <?php if ($page->bibilography()->isNotEmpty()) : ?>
    <p style="font-size: var(--font-small); text-indent: 0; text-transform: uppercase; margin-bottom: 1em; padding: 0 4em;
">Bibliography</p>
    <div class="text-bibliography">
      <?= smartypants($page->bibilography()->kirbytext()) ?>
    </div>
  <?php endif ?>

  <?php if ($page->slug() != 'introduction') : ?>
    <span class="essay-extra">
      <?php if ($page->doi()->isNotEmpty()) : ?>
        <span class="doi">
          <a href="http://doi.org/<?= $page->doi() ?>"><?= $page->doi() ?></a>
        </span>
      <?php endif ?>
    </span>
  <?php endif ?>
</main>
</body>

</html>