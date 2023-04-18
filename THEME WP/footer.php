<?php $target = get_template_directory_uri(); ?>



               <?php // Repeater ?>
               <?php if( have_rows('phones','option' ) ): ?>
                  <?php while( have_rows('phones','option') ): the_row();?>
                  <div class="item">
                  <?php $icon =  get_sub_field('icon'); ?>
                     <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                     <a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a>
                  </div>

                  <?php endwhile; ?>
               <?php endif; ?>


                <?php _e('Інформація', 'ltml'); ?>


               <li>
                   © <?php _e('Інтернет-магазин «LTM — гуртівня верхнього одягу» 2020', 'ltml'); ?>  – <?php echo date("Y"); ?>
               </li>


<?php wp_footer();?>

<!-- Modal -->
<script src="<?php echo $target; ?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo $target; ?>/js/jquery-migrate-3.3.0.min.js"></script>


<script>
jQuery(document).ready(function($) {
    // Add to Wish List
    $(document).on('click', '.add-to-wishlist', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        console.log(product_id);
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'add_to_wishlist',
                product_id: product_id
            },
            success: function(response) {
                 updateWishlistCounter();
                 $('[data-product-id="' + product_id + '"]').addClass('remove-from-wishlist');
                 $('[data-product-id="' + product_id + '"]').removeClass('add-to-wishlist');
            },
            error: function(xhr, textStatus, errorThrown) {
                // Error, do something
                alert('Error adding product to wish list');
            }
        });
    });

    // Remove from Wish List
    $(document).on('click', '.remove-from-wishlist', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        console.log(product_id);
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'remove_from_wishlist',
                product_id: product_id
            },
            success: function(response) {
                updateWishlistCounter();
                $('[data-product-id="' + product_id + '"]').removeClass('remove-from-wishlist');
                $('[data-product-id="' + product_id + '"]').addClass('add-to-wishlist');
            }
        });
    });

    // Update Wish List Counter
    function updateWishlistCounter() {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'get_wishlist_count'
            },
            success: function(response) {
                $('.wishlist-counter').text(response);
            }
        });
    }

    var wishlistCount = <?php echo get_wishlist_count_from_cookie(); ?>;
    $('.wishlist-counter').text(wishlistCount);

   function wishlistwishlist(){
      var products = $('.wishlist');
      if(products.length > 1 ){
      var wishlistItems = <?php echo json_encode($_COOKIE['wishlist_items']); ?>;
      var wishlistItems = wishlistItems.toString();
      products.each(function() {
         var productId = $(this).data('product-id');
         if (wishlistItems.indexOf(productId) !== -1) {
               $(this).addClass('in-wishlist');
               $(this).removeClass('add-to-wishlist');
               $(this).addClass('remove-from-wishlist');
         }
      });
      }
   }
   wishlistwishlist();

});
</script>


</body>

</html>