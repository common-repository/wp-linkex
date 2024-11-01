<?php
/*
 * Plugin Name: WP-LinkEX
 * Version: 1.0
 * Plugin URI: http://juanjoefe.wordpress.com/wp-linkex/
 * Description: Widget to show Linkex links.
 * Author: Juanjo Fernández
 * Author URI: http://juanjoefe.wordpress.com/
 */
class WP_LinkEX extends WP_Widget {
	function WP_LinkEX() {
		$widget_ops = array('classname' => 'wp_linkex', 'description' => __('Show LinkEX links', 'wp-linkex') );
		$control_ops = array('width' => 320);
		$this->WP_Widget('wplinkex', __('WP-LinkEX', 'wp-linkex'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
		$id = empty($instance['id']) ? '1001' : $instance['id'];
		$show = isset($instance['show']) ? $instance['show'] : true;
		$file_path = ABSPATH . 'linkex/data/output/' . $id;
		echo $before_widget;
		if (!empty($title)) { 
			echo $before_title . $title . $after_title;
		}
		if(is_file($file_path)) {
			echo '<ul>';
			include($file_path);
			echo '</ul>';
			if($show) {
				echo '<a href="'.get_bloginfo('url').'/linkex/" title="'.__('Link Exchange', 'wp-linkex').'" target="_self">'.__('Link Exchange', 'wp-linkex').'</a>';
			}
		} else {
			echo '<p class="error">';
			printf(__('Error: Could not find file <strong>%s</strong>', 'wp-linkex'), $file_path);
			echo '</p>';
		}
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = strip_tags($new_instance['id']);
		$instance['show'] = $new_instance['show'] ? 1 : 0;
		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args((array)$instance, array('title' => '', 'id' => 1001, 'show' => true));
		$title = strip_tags($instance['title']);
		$id = strip_tags($instance['id']);
		$show = $instance['show'] ? 'checked="checked"' : '';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wp-linkex'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>
        <p><label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Category ID:', 'wp-linkex'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></ br>
        <small><?php _e('WP-LinkEX will search your category file in:', 'wp-linkex'); ?><br />[WP ROOT]/linkex/data/output/<strong>[CATEGORY ID]</strong></small></p>
        <p><input class="checkbox" type="checkbox" <?php echo $show; ?> id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>" /> <label for="<?php echo $this->get_field_id('show'); ?>"><?php _e('Show "Link Exchange"', 'wp-linkex'); ?></label>
		</p>
 <?php
	}
}

function wp_linkex_init() {
	if ( !is_blog_installed() )
		return;
	
	load_plugin_textdomain('wp-linkex', '/wp-content/plugins/wp-linkex/languages');
	register_widget('WP_Linkex');
}

add_action('widgets_init', 'wp_linkex_init', 1);
?>
