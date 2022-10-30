<div class="grid">
    <div class="column" style="--columns: 12">
        <ul class="gallery">
            <?php foreach ($block->images()->toFiles() as $image) : ?>
                <li>
                    <a href="<?= $image->url() ?>" data-lightbox>
                        <figure class="img" style="--w:<?= $image->width() ?>;--h:<?= $image->height() ?>">
                            <?= $image ?>
                        </figure>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>