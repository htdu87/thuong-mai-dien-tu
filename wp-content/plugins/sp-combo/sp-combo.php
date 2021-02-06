<?php
	/*
	Plugin Name: Sản phẩm combo
	Plugin URI: http://giaiphapsocm.com/
	Description: Hiển thị sản phẩm theo bộ.
	Version: 1.0.0
	Author: DU Huynh
	Author URI: http://giaiphapsocm.com/
	License: GPL2
	*/
	class Sp_Combo {
		
		function __construct() {
			add_shortcode( 'sp_combo' , array(&$this, 'hello_func') );
		}
		
		function hello_func($atts = array(), $content = null) {
			//extract(shortcode_atts(array('name' => 'World'), $atts));
			return '<div><p>Hello short code!!!</p></div>';
		}
	}
	
	function mfpd_load() {
        global $mfpd;
        $mfpd = new Sp_Combo();
	}
	add_action('plugins_loaded', 'mfpd_load');
	
	/**
	 * Display the custom text field
	 * @since 1.0.0
	 */
	function cfwc_create_custom_field() {
	 $args = array(
	 'id' => '_combo',
	 'label' => __( 'Tên bộ sản phẩm', 'tbsp' ),
	 'class' => 'cfwc-custom-field',
	 'desc_tip' => true,
	 'description' => __( 'Nhập tên bộ sản phẩm.', 'tbsp' ),
	 );
	 woocommerce_wp_text_input( $args );
	}
	add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field' );

	/**
	 * Save the custom field
	 * @since 1.0.0
	 */
	function cfwc_save_custom_field( $post_id ) {
	 $product = wc_get_product( $post_id );
	 $title = isset( $_POST['_combo'] ) ? $_POST['_combo'] : '';
	 $product->update_meta_data( '_combo', sanitize_text_field( $title ) );
	 $product->save();
	}
	add_action( 'woocommerce_process_product_meta', 'cfwc_save_custom_field' );
