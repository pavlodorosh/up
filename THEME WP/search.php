<?php
/**
 * Template Name: Product Search
 *
 */
?>

                        <h1 class="page-title"><?php printf( __( 'Результати пошуку: %s', 'ltm' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

                        <?php
                        if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                                get_template_part( 'woocommerce/single-product-item', '',  array( 'product' => get_the_ID(), 'class'=> '3') );
                        endwhile;
                        else :
                            esc_html_e( 'No products found.', 'ltm' );
                        endif;
                        ?>

                <div id="loader" style="display:none;">
                    <svg class="spinner-svg" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                        <circle class="spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                    </svg>
                </div>







<script>
    jQuery(document).ready(function($) {
        var page = 1;
        var totalPages = <?php echo $wp_query->max_num_pages; ?>;
        var isLoading = false;
        if (totalPages <= 1) {
            $('#loader').hide();
        }
        jQuery(window).on('scroll', function() {
        var scrollPos = jQuery(window).scrollTop();
        var windowHeight = jQuery(window).height();
        var documentHeight = jQuery(document).height();
        if (scrollPos >= (documentHeight - windowHeight - 600) && !isLoading && page < totalPages) {
            isLoading = true;
            $('#loader').show();
            page++;
            jQuery.ajax({
                url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
                type: 'post',
                data: {
                    action: 'woocommerce_search_load_more',
                    search_query: '<?php echo get_search_query(); ?>',
                    page: page
                },
                success: function(response) {
                    $('#woocommerce-search-results').append(response);
                    isLoading = false;
                    $('#loader').hide();
                }
            });
        }
        });
    });
</script>

<?php get_footer(); ?>