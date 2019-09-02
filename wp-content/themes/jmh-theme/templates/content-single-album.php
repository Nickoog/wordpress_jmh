<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
        <div class="row flex-column justify-content-around background" style="background-image: url(<?= get_the_post_thumbnail_url( null, 'large' ) ?>);">
            <h1 class="entry-title mx-5"><?php the_title(); ?></h1>
            <div class="align-self-end meta-container mx-5">
                <?php get_template_part('templates/entry-meta'); ?>
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
                        <div class="col-md-3">
                            <a href="<?php echo $image['url']; ?>" data-lightbox="post-gallery">
                                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <p><?php echo $image['caption']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer>
        <nav class="post-nav">
            <ul class="pager">
                <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
                    <li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
                <?php } ?>
                <?php if (strlen(get_next_post()->post_title) > 0) { ?>
                    <li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
                <?php } ?>
            </ul>
        </nav>
    </footer>
  </article>
<?php endwhile; ?>
