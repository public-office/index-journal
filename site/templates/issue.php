<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <section class="title-block">
      <h1>Issue No.<?= $page->num() ?> <span class="title"><?= $page->title() ?></span></h1>
      <div class="issue-items">
        <ul>
          <? if($page->hasChildren()): ?>
            <? foreach($page->children()->visible() as $article): ?>
              <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>
            <? endforeach ?>
          <? endif ?>
        </ul>
      </div>
      <!-- <h1>Book Reviews</h1>
      <div class="issue-items">
        <ul>
          <? if($page->hasChildren()): ?>
            <? foreach($page->children()->visible() as $article): ?>
              <li><a href="<?= $article->url() ?>"><span class="title"><?= $article->title() ?></span> by <?= $article->author() ?></a></li>
            <? endforeach ?>
          <? endif ?>
        </ul>
      </div> -->
    </section>
  </main>
</body>
</html>
