<?php
//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_payment', 'woocommerce_checkout_payment', 20 );
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

      <!-- content -->
      <div class="content bag_page">
         <div class="container">
            <div class="row">
               <div class="page_head">
                  <h2 class="title">
                    <?php woocommerce_page_title(); ?>
                  </h2>
               </div>
               <div class="col-xl-8 info_bag">
                  <div class="info">
                     <div class="title">
                        <span>1</span> <?php _e('Your contacts', 'ventatheme'); ?>
                     </div>
                     <div class="form">
                        <div class="billing" >
                           <?php if ( $checkout->get_checkout_fields() ) : ?>
                              <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                                    <?php //do_action( 'woocommerce_checkout_billing' ); ?>
                                    <?php //'checkout/form-billing.php'; ?>

                                    <div class="woocommerce-billing-fields">
                                       <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
                                       <div class="woocommerce-billing-fields__field-wrapper">
                                          <?php
                                          $fields = $checkout->get_checkout_fields( 'billing' );
                                          foreach ( $fields as $key => $field ) {
                                             woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                                          }
                                          ?>
                                       </div>

                                    </div>

                                    <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
                                       <div class="woocommerce-account-fields">

                                          <?php if ( ! $checkout->is_registration_required() ) : ?>
                                             <p class="form-row form-row-wide create-account">
                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                   <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
                                                </label>
                                             </p>
                                          <?php endif; ?>

                                          <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>
                                          <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>
                                             <div class="create-account">
                                                <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                                                   <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                                                <?php endforeach; ?>
                                                <div class="clear"></div>
                                             </div>
                                          <?php endif; ?>

                                          <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
                                       </div>
                                    <?php endif; ?>

                              <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                           <?php endif; ?>
                        </div>
                     </div>
                  </div>

                  <div class="delivery">
                     <div class="title">
                        <span>2</span> <?php _e('Delivery', 'ventatheme'); ?>
                     </div>
                     <div class="form">
                        <div class="row">
                           <?php //'checkout/review-order.php'; ?>
                           <?php if ( $checkout->get_checkout_fields() ) : ?>
                              <?php //do_action( 'woocommerce_checkout_shipping' ); ?>
                           <?php endif; ?>

                           <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                              <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
                              <?php wc_cart_totals_shipping_html(); ?>
                              <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
                           <?php endif; ?>

<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>

                        </div>
                     </div>
                  </div>

                  <div class="payment">
                     <div class="title">
                        <span>3</span>  <?php _e('Payment', 'ventatheme'); ?>
                     </div>
                     <div class="form">

                           <?php //do_action( 'woocommerce_checkout_payment' ); ?>
                           <?php //'checkout/payment.php' ?>
                           <?php
                           if ( WC()->cart->needs_payment() ) {
                              $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
                              WC()->payment_gateways()->set_current_gateway( $available_gateways );
                           } else {
                              $available_gateways = array();
                           }

                           $checkout = WC()->checkout();
                           $available_gateways = $available_gateways;
                           $order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );?>
                           <?php
                           if ( ! wp_doing_ajax() ) {
                              do_action( 'woocommerce_review_order_before_payment' );
                           }
                           ?>
                           <div id="payment" class="woocommerce-checkout-payment">
                              <?php if ( WC()->cart->needs_payment() ) : ?>
                                 <ul class="wc_payment_methods payment_methods methods">
                                    <?php
                                    if ( ! empty( $available_gateways ) ) {
                                       foreach ( $available_gateways as $gateway ) {
                                          wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                                       }
                                    } else {
                                       echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
                                    }
                                    ?>
                                 </ul>
                              <?php endif; ?>
                              <div class="form-row place-order">
                                 <noscript>
                                    <?php
                                    /* translators: $1 and $2 opening and closing emphasis tags respectively */
                                    printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
                                    ?>
                                    <br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
                                 </noscript>

                                 <?php wc_get_template( 'checkout/terms.php' ); ?>

                                 <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

                                 <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

                                 <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

                                 <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
                              </div>
                           </div>
                           <?php
                           if ( ! wp_doing_ajax() ) {
                              do_action( 'woocommerce_review_order_after_payment' );
                           }?>

                     </div>
                  </div>

                  <div class="create_profile">
                     <div class="title">
                        <?php _e('Create an account?', 'ventatheme'); ?>
                     </div>
                     <div class="form">
                        <div class="row">
                           <div class="form-group col-12">
                              <?php do_action('woocommerce_checkout_login_form'); ?>
                              <?php //'checkout/form-login.php',
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>

               <div class="col-xl-4 col-md-6 data_bag checkout">
                  <div class="block_head">
                      <?php _e('Your order', 'ventatheme'); ?>
                  </div>

                  <div class="order_review">
                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
                        <!-- <div id="order_review" class="woocommerce-checkout-review-order"> -->
                           <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                           <?php //'checkout/review-order.php'; ?>
                        <!-- </div> -->
                        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                  </div>


                  <div class="confirm">
                     <?php //'checkout/payment.php'
                     ?>
                     <?php //wc_get_template( 'checkout/terms.php' );
                     ?>
                     <?php do_action('woocommerce_review_order_before_submit'); ?>
                     <?php $order_button_text = 'Pay'; ?>
                     <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt btn_style" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine
                     ?>
                     <?php do_action('woocommerce_review_order_after_submit'); ?>
                     <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>

                     <?php do_action( 'woocommerce_checkout_custom_checkbox' ); ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /content -->

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>