<?php if(has_nav_menu( 'bottom_navigation' )): ?>
    <footer class="bg-dark text-white p-5 mt-5 my-theme">
        <div class="container">
            <div class="row">
                <?php wp_nav_menu( array(
                    'theme_location' => 'bottom_navigation',
                    'container' => '',
                    'menu_class' => 'footerNav'
                )); ?>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p><?php echo get_theme_mod('1902_footerMessage'); ?></p>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
