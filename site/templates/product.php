<?php snippet('books/header') ?>

<head>
    <?= css('assets/css/books.css?v=' . sha1_file('assets/css/books.css')) ?>
</head>

<?php $product = $page ?>

<main>
    <section class="title-block product-title" style="background-color: rgb(<?= $page->parent()->issue_color() ?>)">
        <h1 style="font-size:6vw"><span class="title"><?= $page->title() ?></span>
            <?php if ($page->subtitle()->isNotEmpty()) : ?><span class="subtitle"><?= smartypants($page->subtitle()->kti()) ?></span><?php endif ?>
            <?php if ($page->slug() != 'introduction') : ?><span class="author">

                    <ul class="editors" style="font-size:6vw">
                        <?php if ($product->editors()->isNotEmpty()) : ?>
                            <?php foreach ($product->editors()->split() as $editor) : ?>
                                <li class="editor" style="font-size:6vw"><span> <?= $editor ?></span></li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?php foreach ($product->authors()->split() as $author) : ?>
                                <li class="author" style="font-size:6vw"><span><?= $author ?></span></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>

                </span><?php endif ?>
        </h1>
    </section>

    <ul class="product-container">


        <li class="text">
            <?= $product->description()->kt() ?>
            <?php if ($product->reviews()->isNotEmpty()) : ?>
                <h2>Reviews</h2>
                <?= $product->reviews()->kt() ?>
            <?php endif ?>
        </li>
        <li class="image">

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
                <figcaption class="details"><?= kirbytextinline($product->details()) ?>
                </figcaption>
                <figcaption>A$<?php
                                $number = $product->price()->value();
                                echo number_format((float)$number, 2, '.', '');
                                ?></figcaption>

                <figcaption class="snipcart-add-item" data-item-id="<?= $product->id() ?>" data-item-price="<?= $product->price() ?>" data-item-description="<?= $product->details() ?>" data-item-image="<?= $image->resize(300)->url() ?>" data-item-name="<?= $product->title() ?>" data-item-width="<?= $product->width() ?>" data-item-height="<?= $product->height() ?>" data-item-length="<?= $product->length() ?>" data-item-weight="<?= $product->weight() ?>" style="cursor:pointer;">
                    ADD TO CART
                </figcaption>


            <?php endif ?>



        </li>


    </ul>

    <div class="layouts">
        <?php foreach ($page->layout()->toLayouts() as $layout) : ?>
            <section class="grid" id="<?= $layout->id() ?>">
                <?php foreach ($layout->columns() as $column) : ?>
                    <div class="column" style="--span:<?= $column->span() ?>; --columns:<?= $column->span() ?>">
                        <?php foreach ($column->blocks() as $block) : ?>
                            <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
                                <?= $block ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </section>
        <?php endforeach ?>
    </div>
</main>

<?php snippet('books/footer') ?>