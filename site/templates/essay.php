<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <section class="title-block">
      <h1><span class="title"><?= $page->title() ?></span><br>
        by <span class="author"><?= $page->author() ?></span>
      </h1>
    </section>
    <div class="text-block">
      <span class="subtitle"><?= smartypants($page->subtitle()->kti()) ?></span>
      <div class="abstract">
        <p class="abstract-trigger">(see Abstract)</p>
        <div class="abstract-content">
          <p class="abstract">ABSTRACT: <?= smartypants($page->abstract()->kti()) ?></p>
        </div>
      </div>

      <?= smartypants($page->text()->kirbytext()) ?>
    </div>

  </main>
</body>
</html>
