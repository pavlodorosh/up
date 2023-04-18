<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">

    <title><?php is_home() ? bloginfo('name') : wp_title(''); ?></title>

    <?php $target = get_template_directory_uri(); ?>

    <link rel="icon" href="<?php echo $target; ?>/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo $target; ?>/favicon.png" type="image/x-icon" />

    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">


</head>
<body <?php body_class() ?>>

<?php global $woocommerce; ?>
<?php wp_body_open(); ?>



            <?php $locations = get_nav_menu_locations(); ?>
            <?php $menumenu = wp_get_menu_array($locations['primary_menu']); ?>
            <?php if($menumenu) { ?>
               <div class="link_group">
                  <?php foreach ($menumenu as $menu) : ?>
                     <a href="<?php echo $menu['href']; ?>">
                        <?php echo $menu['title']; ?>
                     </a>
                  <?php endforeach; ?>
               </div>
            <?php } ?>


            <div class="logo">
               <a href="<?php echo esc_url(home_url('/')); ?>">
                  <img class="img-fluid" src="<?php echo $target; ?>/img/logo.png" alt="<?php the_title(); ?>">
               </a>
            </div>


         <form role="search" method="get" class="woocommerce-product-search " action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_html__( 'Я шукаю ...', 'ltm' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <input type="hidden" name="post_type" value="product" />
            <button type="submit" value="<?php echo esc_html__( 'Знайти', 'ltm' ); ?>"><?php echo esc_html__( 'Знайти', 'ltm' ); ?></button>
         </form>



            <div class="wishlist">
               <a href="<?php echo get_permalink(9905); ?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M20.42 4.58C19.9183 4.07658 19.3222 3.67714 18.6658 3.40459C18.0094 3.13204 17.3057 2.99174 16.595 2.99174C15.8842 2.99174 15.1805 3.13204 14.5241 3.40459C13.8678 3.67714 13.2716 4.07658 12.77 4.58L12 5.36L11.23 4.58C10.7283 4.07658 10.1322 3.67714 9.47578 3.40459C8.81941 3.13204 8.11568 2.99174 7.40496 2.99174C6.69425 2.99174 5.99052 3.13204 5.33414 3.40459C4.67776 3.67714 4.08164 4.07658 3.57996 4.58C1.45996 6.7 1.32996 10.28 3.99996 13L12 21L20 13C22.67 10.28 22.54 6.7 20.42 4.58Z" stroke="black" stroke-width="2" stroke-linecap="round"/>
               </svg>
               <span class="wishlist-counter">0</span>
               </a>
            </div>



         <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 13V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V13M4 9H20V21H4V9Z" stroke="black" stroke-width="2"/>
            </svg>
            <div class="count">
               <?php echo $woocommerce->cart->cart_contents_count; ?>
            </div>
         </a>
