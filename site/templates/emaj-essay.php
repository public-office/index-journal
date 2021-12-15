<? snippet('header') ?>

  <main data-template="<?= $page->template() ?>">

      <h1><span class="title"><?= $page->title() ?></span>
        <? if($page->subtitle()->isNotEmpty()): ?><span class="subtitle"><?= smartypants($page->subtitle()->kti()) ?></span><? endif ?>
        <? if($page->slug() != 'introduction'): ?><span class="author">by <?= $page->author() ?></span><? endif ?>
      </h1>
  
    <div class="text-block">

      <? if($page->abstract()->isNotEmpty()): ?>
        <div class="abstract-block">
          <div class="abstract-content">
            <div class="shadow"></div>
            <div class="abstract hidden"><?= smartypants($page->abstract()->kirbytext()) ?></div>
          </div>
        </div>
      <? endif ?>

      <?= smartypants($page->text()->kirbytext()) ?>
      <div class="text-bios">
          <?= smartypants($page->bios()->kirbytext()) ?>
      </div>
      <div class="text-bibliography">
          <?= smartypants($page->bibilography()->kirbytext()) ?>
      </div>

      <? if($page->slug() != 'introduction'): ?><span class="essay-extra">(<? if($page->doi()->isNotEmpty()): ?><span class="doi">DOI: <a href="https://doi.org/<?= $page->doi() ?>"><?= $page->doi() ?></span></a><? endif ?><? if($page->hasDocuments()): ?><span class="pdf"><a href="<?= $page->documents()->first()->url() ?>" target="_blank">PDF</a></span><? endif ?>)</span><? endif ?>
    </div>

  </main>
</body>
</html>
