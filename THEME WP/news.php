<? /* Template name: blog */ ?>
<?php get_header(); ?>

         <?php
         $args = array(
            'paged' => $my_page,
            'posts_per_page' => 12,
            'post_type'   => 'post',
            'post_status' => 'publish',
            'cat'   => 1,

         );
         $my_query = new WP_Query( $args );
         while ($my_query->have_posts()) : $my_query->the_post();
         ?>
            <div class="item">
               <a href="<?php the_permalink(); ?>">
                  <div class="image">
                        <img class="img-fluid img-data-lazy" data-lazy="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  </div>
                  <div class="caption">
                        <div class="data">
                        <?php the_time( 'j F Y'); ?>
                        </div>
                        <div class="title">
                        <?php the_title(); ?>
                        </div>
                        <div class="description">
                        <?php echo wp_trim_words(get_the_content(), 60, '...');?></div>
                        <div class="icon">

                        </div>
                  </div>
               </a>
            </div>
         <?php
            $index++;
            endwhile;
            ?>

            <?php $big = 999999999;
            echo paginate_links( array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'  => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $my_query->max_num_pages,
            ) ); ?>

<?php get_footer(); ?>