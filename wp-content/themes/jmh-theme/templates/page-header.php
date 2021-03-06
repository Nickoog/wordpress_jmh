<?php use Roots\Sage\Titles; ?>

<div class="row page-header">
    <div class="owl-banner owl-carousel owl-theme">
        <?php $images = get_field('gallery'); ?>
        <?php if( $images ): ?>
            <?php foreach( $images as $image ): ?>
                <div class="item" style="background-image: url(<?= $image['sizes']['large'] ?>);"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="image-wrapper">
        <img src="<?= get_field('signature','option')['url'];?>" alt="jean marc photographie"/>
    </div>
</div>
