<section id="a-propos" class="container">
    <div class="row justify-content-center text-wrapper">
        <div class="col-lg-12">
            <?= get_field('text'); ?>
        </div>
    </div>
</section>
<section id="a-la-une" class="container-fluid">
    <div class="text-container">
        <?php the_field('text_a_la_une');?>
    </div>
    <div class="owl-slider owl-carousel owl-theme">
        <?php $imagesUne = get_field('gallery-une'); ?>
        <?php if( $imagesUne ): ?>
            <?php foreach( $imagesUne as $imageUne ): ?>
            <a href="<?php echo $imageUne['url']; ?>" data-caption="<?php echo $image['caption']; ?>" data-fancybox="gallery">
                <img class="item" src="<?= $imageUne['url'] ?>" alt="<?= $imageUne['url'] ?>">
                <!-- <img class="item" style="background-image: url(<?= $imageUne['url'] ?>);"></div> -->
            </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<section id="albums" class="container-fluid">
    <div class="text-container">
        <?php the_field('text_albums');?>
    </div>
    <div class="album-container">
        <?php 
            $album = new WP_Query( array( 
                'post_type' => 'album', 
                'posts_per_page' => -1)
            );
            while ( $album->have_posts() ){
                $album->the_post();
                $thumbnail = get_the_post_thumbnail_url( null, 'large' );
                $title = get_the_title();
                $link = get_permalink();
                include(locate_template("/templates/components/album-box.php"));
            }
            wp_reset_postdata();
        ?>
    </div>
</section>
<section id="blog" class="container-fluid">
    <div class="text-container">
        <?php the_field('text_blog');?>
    </div>
    <div class="blog-container">
        <div class="row">
            <?php 
                $article = new WP_Query( array( 
                    'post_type' => 'post', 
                    'posts_per_page' => -1)
                );
                while ( $article->have_posts() ){
                    $article->the_post();
                    $thumbnail = get_the_post_thumbnail_url( null, 'large' );
                    $title = get_the_title();
                    $link = get_permalink();
                    $content = get_the_excerpt();
                    include(locate_template("/templates/components/post-box.php"));
                }
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>