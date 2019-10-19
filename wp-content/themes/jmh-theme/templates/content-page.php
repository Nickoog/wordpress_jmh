<section id="blog" class="container-fluid">
    <div class="text-container">
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
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