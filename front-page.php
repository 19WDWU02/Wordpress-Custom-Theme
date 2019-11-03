<?php get_header(); ?>

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
    <?php
        $cardLayout = get_theme_mod('1902_frontPageCard');
     ?>
    <div class="container py-5">
        <div class="row">
            <?php while( have_posts() ): the_post(); ?>
                <?php if($cardLayout === 'grid'): ?>
                    <div class="col-12 col-md-4 mb-3">
                        <?php get_template_part('templates/grid/content', get_post_format()); ?>
                    </div>
                <?php else: ?>
                    <div class="col-12 pb-2">
                        <?php get_template_part('templates/row/content', get_post_format()); ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php
            $count_posts = wp_count_posts();
            $published_posts = $count_posts->publish;

            $default_posts_per_page = get_option( 'posts_per_page' );
         ?>
         <?php if($published_posts > $default_posts_per_page): ?>
             <?php
                $args = array(
                    'type' => 'array'
                );
                $paginationLinks = paginate_links( $args );
              ?>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php foreach($paginationLinks as $link): ?>
                        <li class="page-item">
                            <?php echo str_replace('page-numbers', 'page-link', $link); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="row">
                <div class="col">
                    <?php if(get_previous_posts_link()): ?>
                        <?php echo str_replace('<a', '<a class="btn btn-outline-primary"', get_previous_posts_link()); ?>
                    <?php endif ?>
                </div>
                <div class="col d-flex justify-content-end">
                    <?php if(get_next_posts_link()): ?>
                        <?php echo str_replace('<a', '<a class="btn btn-outline-primary"', get_next_posts_link()); ?>
                    <?php endif; ?>
                </div>
            </div>
         <?php endif; ?>
    </div>
<?php endif; ?>

<?php if(get_theme_mod('1902_aboutImage')): ?>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img src="<?php echo get_theme_mod('1902_aboutImage'); ?>" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h3 class="display-4"><?php echo get_theme_mod('1902_aboutText'); ?></h3>
            </div>
        </div>
    </div>
<?php endif; ?>






<?php
    for ($i=1; $i <= 3 ; $i++) {
        if(get_theme_mod('1902_slide_'.$i)){
            $firstSlide = $i;
            break;
        }
    }
 ?>

 <?php if(isset($firstSlide)): ?>
     <div class="container">
         <div id="homeCarousel" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                <?php for ($i=1; $i <= 3 ; $i++): ?>
                    <?php if(get_theme_mod('1902_slide_'.$i)): ?>
                       <div class="carousel-item <?php if($firstSlide === $i){ echo 'active';} ?>">
                           <img src="<?php echo get_theme_mod('1902_slide_'.$i); ?>" class="d-block w-100" alt="...">
                       </div>
                    <?php endif; ?>
                <?php endfor; ?>
             </div>
         </div>
     </div>
 <?php endif; ?>



<?php get_footer(); ?>
