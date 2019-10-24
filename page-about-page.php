<?php get_header(); ?>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <?php if( have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>
                    <div class="card h-100">
                        <h5 class="card-header"><?php the_title(); ?></h5>
                        <div class="card-body">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php if(has_nav_menu('side_navigation')): ?>
            <div class="col-12 col-md-3">
                <div class="card h-100">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'side_navigation',
                        'menu_class' => 'list-group list-group-flush',
                        'container' => '',
                        'menu_id' => 'sideNav'
                    )); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
