<?php 
if ( !thb_wc_supported() ) {
	return;
}
/* Setup WooCommerce */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	add_action( 'init', 'thb_woocommerce_setup', 1 );
	function thb_woocommerce_setup() {
	  $catalog = array(
			'width' 	=> '620',	// px
			'height'	=> '730',	// px
			'crop'		=> 1 		// true
		);
	
		$single = array(
			'width' 	=> '1100',	// px
			'height'	=> '1240',	// px
			'crop'		=> 1 		// true
		);
	
		$thumbnail = array(
			'width' 	=> '180',	// px
			'height'	=> '180',	// px
			'crop'		=> 1 		// true
		);
	
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
}
/* Header Cart */
add_action( 'thb_quick_cart', 'thb_quick_cart' );
function thb_quick_cart() {
	if ('on' == ot_get_option('header_cart', 'on')) {
	?>
	<a class="quick_cart" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php _e('View your Shopping Cart','werkstatt'); ?>">
		<?php get_template_part('assets/svg/ecommerce_bag.svg'); ?>
		<span class="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
	</a>
	<?php
	}
}
/* Add To Cart */
add_filter( 'woocommerce_product_add_to_cart_text', 'thb_custom_cart_button_text' );
function thb_custom_cart_button_text($text) {
	return '<div class="thb_button_icon">'.thb_load_template_part('assets/svg/arrows_plus.svg').'</div> <span>' . $text . '</span>';
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'thb_add_to_cart_link', 10, 2 );
function thb_add_to_cart_link( $link, $product ){
		$class = implode( ' ', array_filter( array(
			'product_type_' . $product->get_type(),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
		) ) );
    $link = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
    	esc_url( $product->add_to_cart_url() ),
    	esc_attr( isset( $quantity ) ? $quantity : 1 ),
    	esc_attr( $product->get_id() ),
    	esc_attr( $product->get_sku() ),
    	esc_attr( isset( $class ) ? $class : 'button' ),
    	$product->add_to_cart_text()
    );
    return $link;
}
/* Ajax Cart Update */
function thb_woocomerce_ajax_cart_update($fragments) {
	ob_start();
	?>
		<span class="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
	<?php
	$fragments['.float_count'] = ob_get_clean();
	return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'thb_woocomerce_ajax_cart_update');

/* Shop Header */
// Remove orderby & breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'thb_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'thb_before_shop_loop_result_count', 'woocommerce_catalog_ordering', 30 );
add_action( 'thb_before_shop_loop_breadcrumb', 'woocommerce_breadcrumb', 30 );

// Change breadcrumb delimeter
function thb_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' - ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'thb_change_breadcrumb_delimiter' );

/* Post Listing */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 11);

//woocommerce_before_shop_loop_item
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 30);

add_action( 'woocommerce_before_shop_loop_item', function() {
	echo '<div class="product_holder">';
}, 5 );
//woocommerce_after_shop_loop_item
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action( 'woocommerce_after_shop_loop_item', function() {
	if ( ot_get_option('shop_product_listing', 'style1') === 'style1') { 
		echo '</div>';
	}
}, 20 );
//woocommerce_shop_loop_item_title
add_action( 'woocommerce_shop_loop_item_title', function() {
	echo '<div class="thb_title_holder">';
}, 5 );
//woocommerce_after_shop_loop_item_title
add_action( 'woocommerce_after_shop_loop_item_title', 'thb_product_badge', 19);
add_action( 'woocommerce_after_shop_loop_item_title', function() {
	echo '</div>';
}, 20 );

/* Style 2 */
add_action( 'woocommerce_shop_loop_item_title', function() {
		if ( ot_get_option('shop_product_listing', 'style1') === 'style2') { 
			echo '</div>';
		}
}, 0 );
add_action( 'woocommerce_shop_loop_item_title', function() {
	if ( ot_get_option('shop_product_listing', 'style1') === 'style2') { 
		woocommerce_template_loop_product_link_open();
	}
}, 9 );
add_action( 'woocommerce_shop_loop_item_title', function() {
	if ( ot_get_option('shop_product_listing', 'style1') === 'style2') { 
		woocommerce_template_loop_product_link_close();
	}
}, 11 );



/* Product Badges */
function thb_product_badge() {
 global $post, $product;
 	if (get_post_meta($post->ID, '_stock_status',true) == 'outofstock') {
		echo '<span class="badge out-of-stock">' . esc_html__( 'Out of Stock', 'werkstatt' ) . '</span>';
	} else if ( $product->is_on_sale() ) {
		if (ot_get_option('shop_sale_badge', 'text') == 'discount') {
			if ($product->product_type == 'variable') {
				$available_variations = $product->get_available_variations();								
				$maximumper = 0;
				for ($i = 0; $i < count($available_variations); ++$i) {
					$variation_id=$available_variations[$i]['variation_id'];
					$variable_product1= new WC_Product_Variation( $variation_id );
					$regular_price = $variable_product1 ->regular_price;
					$sales_price = $variable_product1 ->sale_price;
					$percentage = $sales_price ? round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100) : 0;
					if ($percentage > $maximumper) {
						$maximumper = $percentage;
					}
				}
				echo apply_filters('woocommerce_sale_flash', '<span class="badge onsale perc">&darr; '.$maximumper.'%</span>', $post, $product);
			} else if ($product->product_type == 'simple'){
				$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
				echo apply_filters('woocommerce_sale_flash', '<span class="badge onsale perc">&darr; '.$percentage.'%</span>', $post, $product);
			} else if ($product->product_type == 'external'){
				$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
				echo apply_filters('woocommerce_sale_flash', '<span class="badge onsale perc">&darr; '.$percentage.'%</span>', $post, $product);
			}
		} else {
			echo apply_filters('woocommerce_sale_flash', '<span class="badge onsale">'.esc_html__( 'Sale','werkstatt' ).'</span>', $post, $product);
		}
	}
}
add_action( 'thb_product_badge', 'thb_product_badge',3 );

// Change Thumbnail
function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
  global $post, $product;
  $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
	
	$featured = wp_get_attachment_url( get_post_thumbnail_id(), 'shop_catalog' );
	$attachment_ids = $product->get_gallery_image_ids();
	if ( $attachment_ids ) {
		$loop = 0;
		foreach ( $attachment_ids as $attachment_id ) {
			$image_link = wp_get_attachment_url( $attachment_id );
			if (!$image_link) continue;
			$loop++;
			$thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');
			if ($image_link !== $featured) {
				if ($loop == 1) break;
			}
		}
	}
	
	$style = $class = '';
	if (isset($thumbnail_second[0])) {            
		$style = 'background-image:url(' . $thumbnail_second[0] . ')';

		echo '<span class="product_thumbnail_hover" style="'.esc_attr($style).'"></span>';
	}
	
  if ( has_post_thumbnail() ) {
    $props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
    return get_the_post_thumbnail( $post->ID, $image_size, array(
      'title'   => $props['title'],
      'alt'    => $props['alt']
    ) );
  } elseif ( wc_placeholder_img_src() ) {
    return wc_placeholder_img( $image_size );
  }
}

/* Post Detail */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display');
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products');
add_action('thb_woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 10);
add_action('thb_woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price');
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

remove_action('woocommerce_before_single_product', 'wc_print_notices');
add_action('thb_before_shop_loop_breadcrumb', 'wc_print_notices', 0);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');

/* Cart Page - Move Cross Sells */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );

/* Checkout */
add_action('woocommerce_checkout_before_customer_details', function() {
	echo '<div class="row"><div class="small-12 large-8 xlarge-9 columns">';
}, 5);

add_action('woocommerce_checkout_after_customer_details', function() {
	echo '</div><div class="small-12 large-4 xlarge-3 columns">';
}, 30);

add_action('woocommerce_checkout_after_order_review', function() {
	echo '</div></div>';
}, 30);