<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <section class="title-block">
      <h1><span class="title"><?= $page->title() ?></span><br>
        by <span class="author"><?= $page->author() ?></span>
      </h1>
    </section>
    <div class="text-block">
      <span class="subtitle"><?= $page->subtitle()->kti() ?></span>
      <p class="abstract">ABSTRACT: <?= $page->abstract()->kti() ?></p>
      <?= $page->text()->kirbytext() ?>
    </div>

  </main>
</body>
</html>
