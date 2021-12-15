<?= snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <?= foreach(page('issues')->children()->listed()->filterBy('issue_type', 'archive') as $issue): ?>
      <?= $issue->title() ?>
    <?= endforeach ?>
  </main>
</body>
</html>
