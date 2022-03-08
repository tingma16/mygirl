<?php
/**
 * Functions which enhance the theme by hooking into woocommerce
 *
 * @package my_girl_shop
 * 
 * 
 */

/**
  * Allow block editor for single products
  */
  function mgs_use_block_editor_for_post_type($use_block_editor, $post_type ) {
    if ( 'product' ===$post_type ){
        $use_block_editor = true;
    }
    return $use_block_editor;
}
 add_filter( 'use_block_editor_for_post_type', 'mgs_use_block_editor_for_post_type', 10, 2 );

  /**
  * Remove dedault woocmmerce styles
  */
//  add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * re-add product title
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * move the excerpt
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 4 );

/**
 * Add sample text above add to card
 */
function mgs_add_sample_text(){
    echo '<p style="color:#ff5252"><b>Popular! </p>';
}
add_action( 'woocommerce_before_add_to_cart_form', 'mgs_add_sample_text', 4 );

