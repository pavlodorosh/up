<?php get_header(); ?>
<?php   $target = get_template_directory_uri(); ?>


        <?php the_title(); ?>

        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        <?php endif; ?>


        <?php get_template_part( 'subscribe-form' ); ?>



<?php get_footer(); ?>
