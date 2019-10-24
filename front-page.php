<?php get_header(); ?>

<!-- <img src="<?php echo get_header_image(); ?>" alt="" class="img-fluid"> -->

<?php if(has_header_image()): ?>
    <div class="container-fluid p-0">
        <div class="headerImage" style="background-image:url(<?php echo get_header_image(); ?>);">
            <h1 class="display-3"><?php echo get_bloginfo('name'); ?></h1>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-3"><?php echo get_bloginfo('name'); ?></h1>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if( have_posts() ): ?>
    <div class="container py-5">
        <div class="row">
            <?php while( have_posts() ): the_post(); ?>
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"<?php the_excerpt() ; ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">Read More</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>




<?php get_footer(); ?>
