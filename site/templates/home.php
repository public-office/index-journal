<? snippet('header') ?>

<main>

    <? $sections = $page->cfp_builder()->toStructure() ?>
    <? foreach($sections as $section): ?>
      <section class="initial">
        <?= $section->message()->kirbytext() ?>
      </section>

      <figure class="wipe" style="background-image: url('<?= $section->wipe_img()->toFile()->url() ?>');"></figure>
      <section class="spacer"></section>

      <div class="text-block">
        <section class="call">
          <?= $section->secondary_text()->kirbytext() ?>
          <p style="text-indent: 0; text-align: center; max-width: 80%; font-size: 90%; margin: 1em auto; position: absolute; bottom: 0.5rem;"><?= $section->wipe_img_caption() ?></p>
        </section>
      </div>

    <? endforeach ?>


</main>
</body>
</html>
