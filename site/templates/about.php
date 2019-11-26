<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <div class="text-block">
      <?= $page->text()->kirbytext() ?>
      <div class="people">
        <?= $page->people()->kirbytext() ?>
      </div>
    </div>
  </main>
</body>
</html>
