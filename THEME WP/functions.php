<?php
update_option('siteurl', 'https://ltm.in.ua/');
update_option('home', 'https://ltm.in.ua/');

/**
* загружаемые скрипты и стили
*/
function load_style_script(){
    $target = get_template_directory_uri();
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css' , array(), time());

	wp_enqueue_style('stylemain', get_template_directory_uri() . '/style.css' , array(), time());
}

/**
* загружаем скрипты и стили
*/
add_action('wp_enqueue_scripts', 'load_style_script');


function wp_get_menu_array($current_menu) {

    $array_menus = wp_get_nav_menu_items($current_menu);
    $menu = array();

    foreach ($array_menus as $array_menu) {
        if (empty($array_menu->menu_item_parent)){
            $curent_id = $array_menu->ID;
            $menu[$curent_id] = array(
                'id'         =>   $curent_id,
                'title'      =>   $array_menu->title,
                'href'        =>  $array_menu->url,
                'children'    =>   array(),
                'class'       =>  $array_menu->classes
            );
        }

        if (isset($curent_id) && $curent_id == $array_menu->menu_item_parent) {
            $submenu_id = $array_menu->ID;
            $menu[$curent_id]['children'][$array_menu->ID] = array(
                'id'         =>   $submenu_id,
                'title'      =>   $array_menu->title,
                'href'        =>  $array_menu->url,
                'children'    =>   array(),
                'object'      =>  $array_menu->object_id,
                'parent'      =>  $array_menu->post_parent,
            );
        }

        if (isset($submenu_id) && $submenu_id == $array_menu->menu_item_parent) {
            $sub_submenu_id = $array_menu->ID;
            $menu[$curent_id]['children'][$submenu_id]['children'][$array_menu->ID] = array(
                'id'         =>   $array_menu->ID,
                'title'      =>   $array_menu->title,
                'href'        =>  $array_menu->url,
                'children'    =>   array(),
                'object'      =>  $array_menu->object_id,
                'parent'      =>  $array_menu->post_parent,
            );
        }

        if (isset($sub_submenu_id) && $sub_submenu_id == $array_menu->menu_item_parent) {
            $menu[$curent_id]['children'][$submenu_id]['children'][$sub_submenu_id]['children'][$array_menu->ID] = array(
                'id'         =>   $array_menu->ID,
                'title'      =>   $array_menu->title,
                'href'        =>  $array_menu->url,
                'object'      =>  $array_menu->object_id,
                'parent'      =>  $array_menu->post_parent,
            );
        }
    }

    return $menu;
}

function go_setup()
{
    // This theme uses wp_nav_menu() in four location.
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('primary_menu', 'ltml'),
            'footer' => esc_html__('footer', 'ltml'),
        ));
}
add_action('after_setup_theme', 'go_setup');

//options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

//acf
add_filter( 'acf/save_post', 'acf_clear_object_cache' );
function acf_clear_object_cache( $post_id ) {
    if ( empty( $_POST['acf'] ) ) {
        return;
    }
    // clear post related cache
    clean_post_cache( $post_id );
    // clear ACF cache
    if ( is_array( $_POST['acf'] ) ) {
        foreach ( $_POST['acf'] as $field_name => $value ) {
            $cache_slug = "load_value/post_id={$post_id}/name={$field_name}";
            wp_cache_delete( $cache_slug, 'acf' );
        }
    }
}



add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle)
{
    if(!is_admin()){
        if ('jquery-core' == $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer src', $tag);
    }else{
        return $tag;
    }
}


add_theme_support( 'woocommerce' );

function my_empty_cart() {
  global $woocommerce;
    if (isset( $_GET['empty-cart'] ) ) {
        wp_safe_redirect( get_permalink( woocommerce_get_page_id( 'product' ) ) );
    }
}
add_action( 'init', 'my_empty_cart' );


//cart header
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
function iconic_cart_count_fragments( $fragments ) {
    $fragments['div.count'] = '<div class="count">' . WC()->cart->get_cart_contents_count() . '</div>' ;

    return $fragments;
}




add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );






add_action( 'wp_ajax_load_more_products', 'my_load_more_products' );
add_action( 'wp_ajax_nopriv_load_more_products', 'my_load_more_products' );
function my_load_more_products() {
    $page = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'paged' => $page,
    );
    $products = new WP_Query( $args );
    if ( $products->have_posts() ) {
        while ( $products->have_posts() ) {
            $products->the_post();
            get_template_part( 'woocommerce/single-product-item', '',  array( 'product' => get_the_ID(), 'class'=> '3') );
        }
        wp_reset_postdata();
    }
    wp_die();
}

// AJAX callback to load more products for WooCommerce search results
function woocommerce_search_load_more() {
    $search_query = $_POST['search_query'];
    $page = $_POST['page'];

    // Perform a new WP_Query with updated page number
    $args = array(
        's' => $search_query,
        'post_type' => 'product',
        'paged' => $page
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part( 'woocommerce/single-product-item', '',  array( 'product' => get_the_ID(), 'class'=> '4') );
        }
    }
    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_woocommerce_search_load_more', 'woocommerce_search_load_more');
add_action('wp_ajax_nopriv_woocommerce_search_load_more', 'woocommerce_search_load_more');


// Add to wish list AJAX action
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist');
add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist');

// Remove from wish list AJAX action
add_action('wp_ajax_nopriv_remove_from_wishlist', 'remove_from_wishlist');
add_action('wp_ajax_remove_from_wishlist', 'remove_from_wishlist');

// Update Wish List Counter
add_action('wp_ajax_nopriv_get_wishlist_count', 'get_wishlist_count');
add_action('wp_ajax_get_wishlist_count', 'get_wishlist_count');

// Function to add product to wish list
function add_to_wishlist() {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
    if ($product_id > 0) {
        $wishlist_items = isset($_COOKIE['wishlist_items']) ? json_decode(stripslashes($_COOKIE['wishlist_items']), true) : array();
        if (!in_array($product_id, $wishlist_items)) {
            $wishlist_items[] = $product_id;
        }
        setcookie('wishlist_items', json_encode($wishlist_items), time() + 3600, '/');
        wp_send_json_success();
    } else {
        wp_send_json_error('Invalid product ID');
    }
}

// Function to remove product from wish list
function remove_from_wishlist() {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
    if ($product_id > 0) {
        $wishlist_items = isset($_COOKIE['wishlist_items']) ? json_decode(stripslashes($_COOKIE['wishlist_items']), true) : array();
        if (($key = array_search($product_id, $wishlist_items)) !== false) {
            unset($wishlist_items[$key]);
        }
        setcookie('wishlist_items', json_encode($wishlist_items), time() + 3600, '/');
        wp_send_json_success();
    } else {
        wp_send_json_error('Invalid product ID');
    }
}

// Function to get wishlist count
function get_wishlist_count() {
    $wishlist_items = isset($_COOKIE['wishlist_items']) ? json_decode(stripslashes($_COOKIE['wishlist_items']), true) : array();
    wp_die(count($wishlist_items));
}
// Function get wishlist count from cookie
function get_wishlist_count_from_cookie() {
    $wishlist_items = isset($_COOKIE['wishlist_items']) ? json_decode(stripslashes($_COOKIE['wishlist_items']), true) : array();
    $count = count($wishlist_items);
    return $count;
}