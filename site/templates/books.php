<?php snippet('books/header') ?>

<head>
    <?= css('assets/css/books.css?v=' . sha1_file('assets/css/books.css')) ?>
</head>


<main>
    <ul class="shop-container">
        <?php foreach ($page->children()->listed() as $product) : ?>
            <li>
                <a href="<?= $product->url() ?>">
                    <?php if ($image = $product->cover()->tofile()) : ?>
                        <figure style="opacity: 1" class="figuregrid">
                            <span class="img " style="--w:4;--h:3;--background:black;background:black" data-contain="false">
                                <picture>
                                    <source srcset="<?= $image->srcset('avif') ?>" type="image/avif">
                                    <source srcset="<?= $image->srcset('webp') ?>" type="image/webp">
                                    <img alt="<?= $image->alt() ?>" src="<?= $image->resize(300)->url() ?>" srcset="<?= $image->srcset() ?>" width="<?= $image->resize(500)->width() ?>" height="<?= $image->resize(500)->height() ?>" style="  height: 80%; margin: auto;">
                                </picture>
                            </span>
                        </figure>
                    <?php endif ?>
                    <figure class="product" style="opacity: 1">
                        <figcaption class="text">
                            <p class="product-title"><?= $product->title() ?></p>
                            <?php if ($product->editors()) : ?>
                                <ul class="editors">
                                    <?php foreach ($product->editors()->split() as $editor) : ?>
                                        <li class="editor"><span><?= $editor ?></span></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </figcaption>
                </a>
                </figure>
            </li>
        <?php endforeach ?>
    </ul>

</main>

<?php snippet('books/footer') ?>