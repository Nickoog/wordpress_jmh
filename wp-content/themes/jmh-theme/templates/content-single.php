<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
        <div class="row background" style="background-image: url(<?= get_the_post_thumbnail_url( null, 'large' ) ?>);">
            <div class="d-flex align-items-end filter">
                <h1 class="entry-title mx-5"><?php the_title(); ?></h1>
            </div>
            <a href="<?= esc_url(home_url('/blog')); ?>" class="close-container">
                <div class="leftright"></div>
                <div class="rightleft"></div>
                <label class="close">close</label>
            </a>
        </div>
    </header>
    <div class="container-fluid entry-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
        <div class="gallery-container">
            <?php $images = get_field('post-gallery'); ?>
            <?php if( $images ): ?>
                <div class="gallery">
                    <?php foreach( $images as $image ): ?>
                        <div class="image-gallery">
                            <a href="<?php echo $image['url']; ?>" data-caption="<?php echo $image['caption']; ?>" data-fancybox="gallery">
                                <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php get_template_part('templates/comments'); ?>
    <footer class="my-5">
        <hr>
        <nav class="post-nav my-4">
            <div class="d-flex justify-content-between pager">
                <div class="previous"><?php previous_post_link( '%link', '<i class="fa fa-angle-left" aria-hidden="true"></i> %title' ); ?></div>
                <div class="next"><?php next_post_link( '%link', '%title <i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?></div>
            </div>
        </nav>
        <hr>
    </footer>
  </article>
<?php endwhile; ?>
