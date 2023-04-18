<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );
if ( is_search() ) {
    wc_get_template_part( 'search-product' );
} else {
?>
<!-- content -->
      <div class="content catalog_page">
      <div class="container">
         <?php woocommerce_breadcrumb(); ?>
      </div>
        <div class="container">
            <div class="row">
                <div class="page_title">
                    <h1>
                        <?php woocommerce_page_title(); ?>
                    </h1>
                </div>
                <div class="col-lg-3 filter">
                    filter
                </div>

                <div class="col-lg-9 product_list">
                    <div class="row">

                    <?php
                    if ( woocommerce_product_loop() ) {
                    ?>
                        <div class="sort">
                            <?php
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action( 'woocommerce_before_shop_loop' );
                            ?>
                        </div>
                        <div class="category">
                            <?php
                                //woocommerce_product_loop_start();
								$current_category = get_queried_object();
								$sub_categories = get_terms( 'product_cat', array( 'parent' => $current_category->term_id ) );
								if ( ! empty( $sub_categories ) && ! is_wp_error( $sub_categories ) ) {
									foreach ( $sub_categories as $sub_category ) {
										get_template_part( 'woocommerce/content-product-cat-item', '',  array( 'term' => $sub_category->term_id) );
									}
								}
                            ?>
                        </div>
                        <?php
                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();

                                    get_template_part( 'woocommerce/single-product-item', '',  array( 'product' => get_the_ID(), 'class'=> '4') );

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );
                                }
                            }
                        woocommerce_product_loop_end();
                        ?>
                        <!-- pagination -->
                        <div class="woocommerce_after_shop_loop">
                        <?php
                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop' );
                            ?>
                        </div>
                        <!-- /pagination -->
                    <?php
                        } else {
                        ?>
                    <div class="woocommerce_no_products_found">
                        <?php
                        do_action( 'woocommerce_no_products_found' );
                        ?>
                    </div>
                    <?php
                        }?>

                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part( 'subscribe-form' ); ?>

        <div class="container">
         <div class="row">
            <div class="seo_block">
               <div class="title">
                <?php
                    if ( is_shop() ) {
                        echo get_field('sub_title', wc_get_page_id( 'shop' ));
                    }else{
                        echo get_field( 'sub_title', 'product_cat_' . get_queried_object_id() );
                    }
                    ?>
               </div>
               <div class="text">
                <?php
                    if ( is_shop() ) {
                        $my_postid = woocommerce_get_page_id( 'shop' );//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo $content;
                    }
                    else {
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    }
                ?>
                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 *
                 * @hooked woocommerce_taxonomy_archive_description - 10
                 * @hooked woocommerce_product_archive_description - 10
                 */
                //( 'woocommerce_archive_description' );
                ?>
               </div>
               <div class="link_more">
                  <a href="">
                  <?php _e('Розвернути', 'ltm'); ?>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 12L12 20M12 20L4 12M12 20L12 4" stroke="black" stroke-width="2"/>
                  </svg>

                  </a>
               </div>
            </div>
         </div>
        </div>
      </div>

<!-- /content -->
<?php } ?>
<?php get_footer( 'shop' ); ?>
