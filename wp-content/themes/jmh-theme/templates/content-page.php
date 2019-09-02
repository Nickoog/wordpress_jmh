<section class="container">
    <div class="row justify-content-center text-wrapper">
        <div class="col-lg-12">
            <?= get_field('text'); ?>
        </div>
    </div>
</section>
<section class="container-fluid">
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
<section class="container-fluid">
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