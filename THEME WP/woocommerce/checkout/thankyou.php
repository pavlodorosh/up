<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

		<!-- content -->
		<div class="content complected_page">
			<div class="container">
				<div class="row">
					<div class="image">
					<svg width="100" height="99" viewBox="0 0 100 99" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M97.5 49.5C97.5 75.4338 76.2573 96.5 50 96.5C23.7427 96.5 2.5 75.4338 2.5 49.5C2.5 23.5662 23.7427 2.5 50 2.5C76.2573 2.5 97.5 23.5662 97.5 49.5Z" stroke="#00B2FF" stroke-width="5"/>
					<path d="M81.8776 24.1011L40.6388 68.6266L18.3587 50.4665C16.9478 49.3201 14.8903 49.5615 13.7733 51.0095C12.6564 52.4574 12.8915 54.5691 14.3024 55.7154L38.934 75.776C39.5218 76.2587 40.2567 76.5 40.9621 76.5C41.8145 76.5 42.6963 76.138 43.3136 75.4442L86.6099 28.6864C87.8444 27.3591 87.7856 25.2173 86.4923 23.9503C85.1696 22.7134 83.1121 22.7738 81.8776 24.1011Z" fill="#00B2FF"/>
					</svg>

					</div>
					<div class="title">
						<h1>
						<?php _e('Thanks for the order!', 'ventatheme'); ?>
						</h1>
					</div>
					<div class="sub_title">
						<?php _e('We will contact you shortly', 'ventatheme'); ?>
					</div>
					<div class="link">
						<a href="/">
							<?php _e('Go to the home page', 'ventatheme'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /content -->

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
