<?php


function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here

   $wp_customize->add_setting( '1902_backgroundColour' , array(
       'default'   => '#3498db',
       'transport' => 'refresh',
   ) );

   // $wp_customize->add_section( 'mytheme_new_section_name' , array(
   //     'title'      => __( 'Visible Section Name', 'mytheme' ),
   //     'priority'   => 30,
   // ) );

   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_backgroundColourControl', array(
   	'label'      => __( 'Background Colour', '1902Custom' ),
    'description' => 'Change the background Colour',
   	'section'    => 'colors',
   	'settings'   => '1902_backgroundColour',
   ) ) );

   $wp_customize->add_setting( '1902_headerFooterColour' , array(
       'default'   => '#3498db',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_headerFooterColourControl', array(
     'label'      => __( 'Header and Footer Colour', '1902Custom' ),
     'description' => 'Change background colour of your Header and Footer',
     'section'    => 'colors',
     'settings'   => '1902_headerFooterColour',
   ) ) );

   $wp_customize->add_setting( '1902_navLinkColour' , array(
       'default'   => '#ffffff',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_navLinkColourControl', array(
     'label'      => __( 'Nav Link Colours', '1902Custom' ),
     'section'    => 'colors',
     'settings'   => '1902_navLinkColour',
   ) ) );

   $wp_customize->add_setting( '1902_cardBackgroundColour' , array(
       'default'   => '#bdc3c7',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '1902_cardBackgroundColourControl', array(
     'label'      => __( 'Blog Card Background Colour', '1902Custom' ),
     'section'    => 'colors',
     'settings'   => '1902_cardBackgroundColour',
   ) ) );

   $wp_customize->add_section( '1902_footerSection' , array(
       'title'      => __( 'Footer Info', '1902Custom' ),
       'priority'   => 30,
   ) );

   $wp_customize->add_setting( '1902_footerMessage' , array(
       'default'   => 'copyright',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_footerMessageControl', array(
     'label'      => __( 'Footer Message', '1902Custom' ),
     'section'    => '1902_footerSection',
     'settings'   => '1902_footerMessage',
   ) ) );

   $wp_customize->add_section( '1902_front_page_image' , array(
       'title'      => __( 'About Section Info', 'mytheme' ),
       'priority'   => 30,
   ) );

   $wp_customize->add_setting( '1902_aboutImage' , array(
       'default'   => '',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '1902_aboutImageControl', array(
     'label'      => __( 'About Section Image', '1902Custom' ),
     'section'    => '1902_front_page_image',
     'settings'   => '1902_aboutImage',
   ) ) );

   $wp_customize->add_setting( '1902_aboutText' , array(
       'default'   => '',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_aboutTextControl', array(
     'label'      => __( 'About Section Text', '1902Custom' ),
     'section'    => '1902_front_page_image',
     'settings'   => '1902_aboutText',
   ) ) );

   $wp_customize->add_section( '1902_layout_section' , array(
       'title'      => __( 'Layout', 'mytheme' ),
       'priority'   => 30,
   ) );

   $wp_customize->add_setting( '1902_sidebarPosition' , array(
       'default'   => 'left',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_sidebarPositionControl', array(
     'label'      => __( 'Sidebar Position', '1902Custom' ),
     'section'    => '1902_layout_section',
     'settings'   => '1902_sidebarPosition',
     'type'       => 'radio',
     'choices'    => array(
         'left' => 'Left',
         'right' => 'Right'
     )
   ) ) );

   $wp_customize->add_setting( '1902_frontPageCard' , array(
       'default'   => 'grid',
       'transport' => 'refresh',
   ) );

   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '1902_frontPageCardControl', array(
     'label'      => __( 'Card Layout', '1902Custom' ),
     'section'    => '1902_layout_section',
     'settings'   => '1902_frontPageCard',
     'type'       => 'radio',
     'choices'    => array(
         'grid' => 'Grid',
         'rows' => 'Rows'
     )
   ) ) );

   $wp_customize->add_section( '1902_slideshowSection' , array(
       'title'      => __( 'Slideshow', '1902Custom' ),
       'priority'   => 30,
   ) );

   for ($i=1; $i <=3 ; $i++) {
       $wp_customize->add_setting( '1902_slide_'.$i , array(
           'default'   => '',
           'transport' => 'refresh',
       ) );

       $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '1902_slide_'.$i.'Control', array(
         'label'      => __( 'Add Slide ' . $i, '1902Custom' ),
         'section'    => '1902_slideshowSection',
         'settings'   => '1902_slide_'.$i,
       ) ) );
   }



   $wp_customize->add_section( 'featuredSection' , array(
        'title'      => __( 'Featured Info', '1902Custom' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'featuredPost' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );


    $allPosts = get_posts(array(
        'numberposts' => -1
    ));
    // var_dump($allPosts);
    $allChoices = array();
    $allChoices[''] = 'Please Choose a Featured Post';
    foreach ($allPosts as $post) {
        $allChoices[$post->ID] = $post->post_title;
    }

    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'featuredPostControl',
            array(
                'label'          => __( 'Featured Posts', '1902Custom' ),
                'section'        => 'featuredSection',
                'settings'       => 'featuredPost',
                'type'           => 'select',
                'choices'        => $allChoices
            )
        )
    );


}
add_action( 'customize_register', 'mytheme_customize_register' );


function mytheme_customize_css()
{
    ?>
         <style type="text/css">

             body {
                 background-color: <?php echo get_theme_mod('1902_backgroundColour', '#3498db'); ?>;
             }

             .my-theme{
                 background-color: <?php echo get_theme_mod('1902_headerFooterColour', '#3498db'); ?> !important;
             }

             #top_navigation ul li a{
                 color: <?php echo get_theme_mod('1902_navLinkColour', '#ffffff'); ?>;
                 opacity: 0.5;
             }

             #top_navigation ul li.active a{
                 color: <?php echo get_theme_mod('1902_navLinkColour', '#ffffff'); ?>;
                 opacity: 1;
             }

             .blogCard{
                 background-color: <?php echo get_theme_mod('1902_cardBackgroundColour', '#bdc3c7'); ?>;
             }

         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
