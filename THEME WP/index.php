<?php get_header();?>
<?php $target = get_template_directory_uri(); ?>
<!-- content -->
<div class="content">


      <?php
      $images = get_field('slides');
      if( $images ): ?>
         <?php foreach( $images as $image ): ?>
            <div class="slide">
               <div class="image">
                  <?php $img = get_sub_field('slide'); ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
               </div>
            </div>
         <?php endforeach; ?>
      <?php endif; ?>



      <?php
      $terms = get_field('category_product');
      if( $terms ):
         foreach( $terms as $term ):
            get_template_part( 'woocommerce/content-product-cat-item', '',  array( 'term' => $term) );
         endforeach;
      endif;
      ?>

   <div class="container ">
      <div class="row products-container">

         <?php
         $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'paged' => 1,
         );
         $products = new WP_Query( $args );
         if ( $products->have_posts() ) {
            while ( $products->have_posts() ) {
            $products->the_post();
            get_template_part( 'woocommerce/single-product-item', '',  array( 'product' => get_the_ID(), 'class'=> '3') );
            }
            wp_reset_postdata();
         } else {
            echo 'No products found.';
         }
         ?>

      <div class="spinner"  id="loader" style="display:none;" >
         <svg class="spinner-svg" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
         </svg>
      </div>


   <?php get_template_part( 'subscribe-form' ); ?>




<!-- /content -->

<script>
var page = 1;
var isLoading = false;
jQuery(window).on('scroll', function() {
   var scrollPos = jQuery(window).scrollTop();
   var windowHeight = jQuery(window).height();
   var documentHeight = jQuery(document).height();
   if (scrollPos >= (documentHeight - windowHeight - 600) && !isLoading) {
      isLoading = true;
      $('#loader').show();
      page++;
      jQuery.ajax({
            url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            type: 'post',
            data: {
               action: 'load_more_products',
               page: page
            },
            success: function(response) {
               jQuery('.products-container').append(response);
               isLoading = false;
               $('#loader').hide();
            }
      });
   }
});
</script>

<?php get_footer();?>