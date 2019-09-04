<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
        <div class="row background" style="background-image: url(<?= get_the_post_thumbnail_url( null, 'large' ) ?>);">
            <div class="d-flex flex-column justify-content-around filter">
                <h1 class="entry-title mx-5"><?php the_title(); ?></h1>
                <div class="align-self-end meta-container mx-5">
                    <?php get_template_part('templates/entry-meta'); ?>
                </div>
            </div>  
        </div>
    </header>
    <div class="container entry-content">
        <?php the_content(); ?>
        <div class="gallery-container">
            <?php $images = get_field('post-gallery'); ?>
            <?php if( $images ): ?>
                <div class="row">
                    <?php foreach( $images as $image ): ?>
                        <div class="col-md-4 p-1">
                            <a href="<?php echo $image['url']; ?>" data-caption="<?php echo $image['caption']; ?>" data-fancybox="gallery">
                                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer class="my-5">
        <hr>
        <nav class="post-nav my-4">
            <div class="d-flex justify-content-between pager">
                <?php if (strlen(get_next_post()->post_title) > 0) { ?>
                    <div class="next"><?php next_post_link( '%link', '<i class="fa fa-angle-left" aria-hidden="true"></i> %title' ); ?></div>
                <?php } ?>
                <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
                    <div class="previous"><?php previous_post_link( '%link', '%title <i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?></div>
                <?php } ?>
            </div>
        </nav>
        <hr>
    </footer>
  </article>
<?php endwhile; ?>
