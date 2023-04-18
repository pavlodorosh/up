<?php header('HTTP/1.1 404 Not Found');  ?>

<?php get_header();?>



<a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php _e('Go Home', 'ltml'); ?> </a>




<?php get_footer();?>