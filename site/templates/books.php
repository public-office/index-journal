<?php snippet('books/header') ?>

<head>
    <?= css('assets/css/books.css?v=' . sha1_file('assets/css/books.css')) ?>
</head>
<main class="shop">

    <div class="">
        <ul class="shop-about">
            <p>INDEX BOOKS is an independent art history and theory printing house based in Melbourne, Australia. The press presents original scholarship by art historians and theorists from all specialisations, treating the art of the past with the same urgency as it does the art of the present. New titles are forthcoming.</p>
        </ul>
        <ul class="shop-container">

            <?php foreach ($page->children()->listed() as $product) : ?>
                <li>
                    <a href="<?= $product->url() ?>" class="link-container">
                        <?php if ($image = $product->cover()->tofile()) : ?>
                            <figure class="figuregrid product">
                                <span class="img " style="--w:4;--h:3;--background:black;background:black" data-contain="false">
                                    <picture>
                                        <source srcset="<?= $image->srcset('avif') ?>" type="image/avif">
                                        <source srcset="<?= $image->srcset('webp') ?>" type="image/webp">
                                        <img alt="<?= $image->alt() ?>" src="<?= $image->url() ?>" srcset="<?= $image->srcset() ?>" style="  height: 80%; margin: auto;">
                                    </picture>
                                </span>
                            </figure>
                            <div class="info">
                                <figcaption class="text">
                                    <p><?= $product->title() ?></p>
                                    <?php if ($product->editors()) : ?>
                                        <ul class="editors">
                                            <?php foreach ($product->editors()->split() as $editor) : ?>
                                                <li class="editor"><span><?= $editor ?></span></li>
                                            <?php endforeach ?>
                                        </ul>
                                    <?php endif ?>
                                </figcaption>
                            </div>
                        <?php endif ?>

                    </a>
                    </figure>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php snippet('books/footer') ?>