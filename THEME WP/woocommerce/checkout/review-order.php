<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">

	<div class="product_list product_list_bag">
			<?php
			do_action( 'woocommerce_review_order_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>

                                 <div class="item  <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                    <div class="image">
                                       <a href="<?php echo esc_url( $product_permalink ); ?>">
                                       <?php
                                          $size = 'thumbnail';
                                          $image_size = apply_filters( 'single_product_archive_thumbnail_size ', $size );
                                          $image_id  = $_product->get_image_id();
                                          $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
                                          ?>
                                          <img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" alt="<?php echo $_product->get_name(); ?>">
                                       </a>
                                    </div>
                                    <div class="product_data">
                                       <div class="product_title">
                                          <a href="<?php echo esc_url( $product_permalink ); ?>">
                                             <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ); ?>
                                             <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                                          </a>
                                       </div>
                                       <div class="price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>" >
                                             <?php
                                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                             ?>
                                       </div>

                                       <div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                          <?php
                                          if ( $_product->is_sold_individually() ) {
                                             $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                          } else {
                                             $product_quantity = woocommerce_quantity_input(
                                                array(
                                                   'input_name'   => "cart[{$cart_item_key}][qty]",
                                                   'input_value'  => $cart_item['quantity'],
                                                   'max_value'    => $_product->get_max_purchase_quantity(),
                                                   'min_value'    => '0',
                                                   'product_name' => $_product->get_name(),
                                                ),
                                                $_product,
                                                false
                                             );
                                          }
                                          echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                          ?>
                                       </div>

                                       <div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                          <?php
                                             echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                          ?>
                                       </div>

                                       <div class="delete_product">
                                          <div class="product-remove">
                                             <?php
                                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                   'woocommerce_cart_item_remove_link',
                                                   sprintf(
                                                      '<a href="%s" class="remove btn-close" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                                      esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                      esc_html__( 'Remove this item', 'woocommerce' ),
                                                      esc_attr( $product_id ),
                                                      esc_attr( $_product->get_sku() )
                                                   ),
                                                   $cart_item_key
                                                );
                                             ?>
                                          </div>
                                       </div>


                                    </div>
                                 </div>

					<?php
				}
			}
			do_action( 'woocommerce_review_order_after_cart_contents' );
			?>

	</div>

	<div class="total">
		<div class="page_head">
		<?php _e('To be paid together', 'ventatheme'); ?>
		</div>
		<div class="total_price">
		<div class="row">
			<div class="col-6 text">
				<?php _e('goods worth', 'ventatheme'); ?>
			</div>
			<div class="col-6 data">
				<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
				<div class="order-total">
					<?php wc_cart_totals_order_total_html(); ?>
				</div>
				<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
			</div>
		</div>
		</div>
		<div class="delivery_coast">
		<div class="row">
			<div class="col-6 text">
				<?php _e('Shipping cost', 'ventatheme'); ?>
			</div>
			<div class="col-6 data">
				<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
				<div class="order-total">
					<?php
					$current_shipping_cost = WC()->cart->get_cart_shipping_total();
					if ( WC()->cart->get_shipping_total() == 0 ){
					echo " ---- ";
					}else{
					echo $current_shipping_cost;
					}
					?>
				</div>
				<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
			</div>
		</div>
		</div>
	</div>

</div>
