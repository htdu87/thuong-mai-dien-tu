<?php
/*
Plugin Name: Sản phẩm bán chạy
Plugin URI: http://giaiphapsocm.com/
Description: Hiển thị danh sách 10 sản phẩm được KH mua nhiều nhất.
Version: 1.0.0
Author: DU Huynh
Author URI: http://giaiphapsocm.com/
License: GPL2
*/

class Ban_Chay_Widget extends WP_Widget {
	
	public function __construct() {
        parent::__construct(
            'ban_chay_widget', // Base ID
            'Sản phẩm bán chạy', // Name
            array( 'description' => __( 'Hiển thị top 10 sản phẩm bán chạy', 'text_domain' ), ) // Args
        );
    }
 
    public function widget( $args, $instance ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		echo $before_title . (empty($title)?'Bán chạy':$title) . $after_title;
		//echo __( 'Hello, World!', 'text_domain' );
		
		if(is_plugin_active('woocommerce/woocommerce.php')) {
			global $wpdb;
			$records=$wpdb->get_results("SELECT a.product_id,b.post_name,b.post_title,SUM(product_qty) as total_sale,LAY_GIA_SP(a.product_id) as price, lAY_ANH_SP(a.product_id) as guid
								FROM wp_wc_order_product_lookup a
								LEFT JOIN wp_posts b on b.ID=a.product_id
								GROUP BY product_id
								ORDER BY total_sale DESC
								LIMIT 10");
			
			echo '<ul class="product_list_widget">';
			foreach($records as $prod) {
				$img=$prod->guid;
				$src=substr_replace($img, '-150x150', strrpos($img,'.'), 0);
				echo '<li><a href="'.get_site_url().'/sản phẩm/'.$prod->post_name.'/"><img src='.$src.' class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" />'.$prod->post_title.'</a><span class="woocommerce-Price-amount amount"><bdi>'.number_format($prod->price, 0, ',', '.').'<span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></li>';
			}
			echo '</ul>';
		} else {
			echo 'WooCommerce plugin chưa được cài đặt!';
		}
        echo $after_widget;
    }
 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Bán chạy', 'text_domain' );
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
		<?php
    }
 
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
}

add_action( 'widgets_init', 'wpdocs_register_widgets' );
 
function wpdocs_register_widgets() {
	register_widget( 'Ban_Chay_Widget' );
}