<?php
    /*
        Template Name: Full Width
        Template Post Type: page, post
    */
 ?>

 <?php get_header(); ?>

 <div class="container-fluid">
     <div class="row my-3">
         <?php if( have_posts() ): ?>
             <?php while( have_posts() ): the_post(); ?>
                 <div class="card h-100">
                     <h2 class="card-header text-center"><?php the_title(); ?></h2>
                     <div class="card-body">
                         <?php the_content(); ?>
                     </div>
                 </div>
             <?php endwhile; ?>
         <?php endif; ?>
     </div>
 </div>


 <?php get_footer(); ?>
