<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">
    <div class="introduction">
      <?= $page->intro()->kirbytext() ?>
    </div>
    <ul>
      <? foreach(page('emaj')->children() as $issue): ?>
        <div class="issue-items">
          <li><?= $issue->title() ?>
            <ul>
              <? foreach($issue->children()->listed() as $article): ?>
                <li><a href="<?= $article->url() ?>"><?= $article->title() ?> <span class="authors">by <?= $article->author() ?></span></a></li>
              <? endforeach ?>
            </ul>
          </li>
        </div>
      <? endforeach ?>
    </ul>
  </main>
