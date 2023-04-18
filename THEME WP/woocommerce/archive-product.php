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

         <?php woocommerce_breadcrumb(); ?>

                        <?php woocommerce_page_title(); ?>


                    <?php
                    if ( woocommerce_product_loop() ) {
                    ?>

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



        <?php get_template_part( 'subscribe-form' ); ?>





<?php } ?>
<?php get_footer( 'shop' ); ?>
