<?php
/**
 * Functions which enhance the theme by hooking into woocommerce
 *
 * @package my_girl_shop
 * 
 * 
 */

add_filter( 'use_block_editor_for_post_type', 'cwd_use_block_editor_for_post_type', 10, 2 );
