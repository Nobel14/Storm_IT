<?php
/**
* Plugin Name: FSM Custom Featured Image Caption
* Description: Allows you to add a custom caption to the featured image of a post.
* Version: 1.17
* Author: Fesomia
* Author URI: http://wp.fesomia.cat

* Text Domain: fsm-custom-featured-image-caption
* Domain Path: /languages
*/


// Prevent direct access
if (!defined('ABSPATH')) {
    die('You cannot access this resource directly.');
}



/**
 * Load plugin textdomain.
 */
add_action( 'init', 'FSMCFIC_load_textdomain' );
function FSMCFIC_load_textdomain() {
  load_plugin_textdomain( 'fsm-custom-featured-image-caption', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

//Add options for the highlighted image box
function FSMCFIC_add_featured_image_caption( $content, $post_id ) {
	
	
	$field_id    = '_FSMCFIC_featured_image_caption';
	$field_value = esc_attr( get_post_meta( $post_id, $field_id, true ) );
	$field_text  = __( 'Featured image caption', 'fsm-custom-featured-image-caption' );
	$info_text  = __( 'If left empty, the default caption will be used', 'fsm-custom-featured-image-caption' );
	
	$field2_id = '_FSMCFIC_featured_image_nocaption';
	$field2_value = get_post_meta( $post_id, $field2_id, true );
	$field2_text  = __( "Don't show caption", 'fsm-custom-featured-image-caption' );
	
	$field3_id = '_FSMCFIC_featured_image_hide';
	$field3_value = get_post_meta( $post_id, $field3_id, true );
	$field3_text  = __( "Don't show featured image", 'fsm-custom-featured-image-caption' );


	$field_label = sprintf(
	    '
		<p><strong><label for="%1$s"> %3$s</label></strong><br/>
		<em>%4$s</em><br/></p>
		<textarea style="width:%5$s" name="%1$s" id="%1$s">%2$s</textarea>
		',
	    $field_id, $field_value, esc_html($field_text), esc_html($info_text), '100%'
	);
	
	$field2_label = sprintf(
		'<p><label><input type="checkbox" name="%1$s" id="%1$s" value="1" %2$s/> %3$s</label></p>',
		$field2_id, !empty($field2_value)?'checked':'' , $field2_text );
		
	$field3_label = sprintf(
		'<p><label><input type="checkbox" name="%1$s" id="%1$s" value="1" %2$s/> %3$s</label></p>',
		$field3_id, !empty($field3_value)?'checked':'' , $field3_text );
		

	return $content .= '<div id="FSMCFIC_box">'.$field_label.$field2_label.$field3_label.'</div>';
}
add_filter( 'admin_post_thumbnail_html', 'FSMCFIC_add_featured_image_caption', 10, 2 );


//Save text for the featured image (by post)
function FSMCFIC_save_featured_image_caption( $post_ID, $post, $update ) {

	if (isset($_REQUEST['_FSMCFIC_featured_image_caption']))
	{
		$field_id    = '_FSMCFIC_featured_image_caption';
		$field_value = $_REQUEST[ $field_id ];
		
		$field2_id = '_FSMCFIC_featured_image_nocaption';
		$field2_value = $_REQUEST[ $field2_id ];
		
		$field3_id = '_FSMCFIC_featured_image_hide';
		$field3_value = $_REQUEST[ $field3_id ];

		update_post_meta( $post_ID, $field_id, $field_value );
		update_post_meta( $post_ID, $field2_id, $field2_value );
		update_post_meta( $post_ID, $field3_id, $field3_value );
	}
}
add_action( 'save_post', 'FSMCFIC_save_featured_image_caption', 10, 3 );


//a custom version of get_the_post_thumbnail whitout filtering for internal use with the shortcode
function FSMCFIC_get_the_post_thumbnail( $post = null, $size = 'post-thumbnail', $attr = '' )
{
	$post = get_post( $post );
	$html = '';
	
	if ( ! $post ) {
		return '';
	}	
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$size = apply_filters( 'post_thumbnail_size', $size, $post->ID );
	
	if ( $post_thumbnail_id ) {
		$html = wp_get_attachment_image( $post_thumbnail_id, $size, false, $attr );
	}
	
	return $html;
	
		 
	
	
}

function FSMCFIC_get_featured_image_caption($post,$args=array())
{
	//default arguments
	$default_args = array(
		'tag'=>'div',
		'class'=>'',
		'style'=>'',
		'force_visibility'=>false,
		'allow_html'=>false,
		'post_id'=>false
		);
		
	$args = array_merge($default_args,$args);
	
	//process arguments
	$tag = (empty( $args['tag'] ) && $args['tag']!==false)?'div':$args['tag'];	// tag to use - default: div
	$class = empty( $args['class'] )?'':('class="'.esc_attr__($args['class']).'"');	//class
	$style = empty( $args['style'] )?'':$args['style'];	//style
	$post_id = empty( $args['post_id'] )?false:$args['post_id'];
	
	//remove carriage returns from style string
	if (!empty($style))
	{
		$cstyle = str_replace(array( "\n", "\t", "\r"), ' ', $style);
		$style = 'style="'.esc_attr__($cstyle).'"';
	}
	//allow html code in the caption text?
	$allow_html = $args['allow_html'];
	
	if (!$post_id)
	{
		$post_id = ( null === $post->ID ) ? get_the_ID() : $post->ID;
	}
	
	//if the editor has selected the hide caption option and it's not forced via arguments, end and return an empty string
	if ( get_post_meta ( $post_id, '_FSMCFIC_featured_image_nocaption', true ) && !$args['force_visibility'] ) return '';
	
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	
	$attachment = get_post ( $post_thumbnail_id );
	$caption=$attachment->post_excerpt;	//get default caption
	
	//get custom caption
	$caption_extra=get_post_meta( $post_id, '_FSMCFIC_featured_image_caption', true );
	if ( !empty($caption_extra) ) { $caption = $caption_extra; }
	
	//escape html code if necessary
	if (!$allow_html) { $caption = esc_html($caption); }
	
	//if after all caption is empty, return nothing
	if (empty($caption)) {return '';}
	
	//if tag is set to false, only return the caption text
	if (!$tag) { return $caption; }	
	
	return '<' . $tag . ' ' . $style . ' ' .$class. '>' . $caption . '</' . $tag . '>';
	
}


function FSMCFIC_add_caption( $html, $post_id = false ) {
	global $post;
	
	//if there is no content in the featured image html, return
	if (empty($html)) { return $html; }
	
	if (!$post_id)
	{
		$post_id = ( null === $post->ID ) ? get_the_ID() : $post->ID;
	}
	
	$hide_featured = get_post_meta ( $post_id, '_FSMCFIC_featured_image_hide', true );
	
	//If the editor does not want the image to appear, we return an empty string
	if ($hide_featured) { return ''; }
	
	//get the plugin general options
	$plugin_options=get_option( 'fsm_custom_featured_image_caption_options' );
	
	// caption's HTML
	$figcaption = "";
	$caption_class = 'wp-caption-text';
	$caption_style = '';
	
	//set the style of the caption based on plugin options
	switch ($plugin_options['CSS_options']) {
		case 'class':
			$caption_class = $plugin_options['custom_class'];
			break;
		
		case 'style':
			$caption_style = $plugin_options['custom_style'];
			$caption_class='';
			break;
	}
	
	$figcaption = FSMCFIC_get_featured_image_caption( $post, array ( 
		'tag' => 'figcaption',
		'class' => $caption_class,
		'style' => $caption_style,
		'allow_html' => isset($plugin_options['allow_html'])?$plugin_options['allow_html']:false,
		'force_visibility' => false,
		'post_id' => $post_id
		) );
		
		
	// Generates the html for the figure and caption
	$html = '<figure class="wp-caption featured">' . $html . $figcaption . '</figure>';

	return $html;
		
}
	
	
function FSMCFIC_post_featured_image_filter( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	global $post;
	

	
	$current_page_id = get_queried_object_id();
	
	$plugin_options=get_option( 'fsm_custom_featured_image_caption_options' );
	$show_in_lists = isset($plugin_options['show_in_lists'])?$plugin_options['show_in_lists']:false;

	if (!$post_id)
	{
		$post_id = ( null === $post->ID ) ? get_the_ID() : $post->ID;
	}
	$hide_featured = get_post_meta ( $post_id, '_FSMCFIC_featured_image_hide', true );
	
	
	
	//hide the image?
	if ($hide_featured) {return '';}
	
	//If it's a list, or a list inside a singular page (i.e. in a widget) and "show in lists" is not active, don't do anything else
	$is_list = !is_singular() || $current_page_id != $post_id;

	if ( $is_list && !$show_in_lists) { return $html; }
	
	//if ( !is_singular() || !is_main_query()) { return $html; }
	
	//if  the post already contains the shortcode don't show the featured image twice
	if (!$is_list && has_shortcode($post->post_content, 'FSM_featured_image')) {return ''; }
	
	
	return FSMCFIC_add_caption($html, $post_id);
	
	
}	
	
add_filter( 'post_thumbnail_html', 'FSMCFIC_post_featured_image_filter',20,5 );



function FSMCFIC_enqueue($hook) {
	if( 'post.php' == $hook || 'post-new.php' == $hook )
	{
		wp_enqueue_script( 'FSMCFIC_functions', plugin_dir_url(__FILE__) . 'js/edit_post.js', array('jquery') );
	}
}

add_action('admin_enqueue_scripts', 'FSMCFIC_enqueue');


//public functions to use in templates
	/** params are passed inside an array
	 * tag => string / bool. html tag to use (i.e. figure, div, p). If set to false it returns the caption without container (default: div)
	 * class => string. class or classes to use in the container, separated by spaces (default: none)
	 * style => string. css style to use in the container (default: none)
	 * allow_html => true/false. allow or escape html inside the caption text (default: false)
	 * show_in_lists => show the caption in lists (default: false)
	 * force_visibility => true/false. return the caption even if the editor has selected the hide caption option (default:false)
	 */
	 
	 
	 
//returns the caption
function get_FSM_featured_image_caption( $args = array() ) {
	
	global $post;
	return FSMCFIC_get_featured_image_caption($post,$args);		
	
}

//displays the caption
function the_FSM_featured_image_caption( $args = array() ) {
	
	global $post;
	echo FSMCFIC_get_featured_image_caption($post,$args);
	
} 

//old public functions with confusing naming maintained just for backwards compatibility. DO NOT USE
 if (!function_exists('get_featured_image_caption'))
 {
	function get_featured_image_caption( $args = array() ) {
		
		global $post;
		echo FSMCFIC_get_featured_image_caption($post,$args);		
		
	}
 }

 if (!function_exists('the_featured_image_caption'))
 {
	function the_featured_image_caption( $args = array() ) {
		
		global $post;
		return FSMCFIC_get_featured_image_caption($post,$args);
		
	}
 }


//simple shortcode to show the featured image inside the post
function FSMCFIC_shortcode($atts){	
	global $post;
	
	//if on a list, don't return anything in order to avoid conflicts with the same image appearing twice
	if ( !is_singular() ) { return ''; }
	
	$img_html = FSMCFIC_get_the_post_thumbnail($post,isset($atts['size'])?$atts['size']:null,isset($atts['attr'])?$atts['attr']:null);
	return FSMCFIC_add_caption($img_html);

}
add_shortcode( 'FSM_featured_image', 'FSMCFIC_shortcode' );


//options page
class FSMCustomFeaturedImageCaption {
	private $fsm_custom_featured_image_caption_options;
	private $FSMFIC_option_hooksuffix;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'fsm_custom_featured_image_caption_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'fsm_custom_featured_image_caption_page_init' ) );
	}

	public function fsm_custom_featured_image_caption_add_plugin_page() {
		$this->FSMFIC_option_hooksuffix = add_options_page(
			'FSM Custom Featured Image Caption', // page_title
			'FSM Custom Featured Image Caption', // menu_title
			'manage_options', // capability
			'fsm-custom-featured-image-caption', // menu_slug
			array( $this, 'fsm_custom_featured_image_caption_create_admin_page' ) // function
		);
		
		add_action ('admin_enqueue_scripts', array(&$this, 'enqueueScripts'));

	}
	
	public function enqueueScripts($hookSuffix)
	{

		
		if ($hookSuffix == $this->FSMFIC_option_hooksuffix) {
			wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . 'js/FSMFIC_options_page.js', array('jquery') );
		}
	}

	public function fsm_custom_featured_image_caption_create_admin_page() {
		$this->fsm_custom_featured_image_caption_options = get_option( 'fsm_custom_featured_image_caption_options' ); ?>

		<div class="wrap">
			<h2>
				<?php _e('FSM Custom Featured Image Caption','fsm-custom-featured-image-caption'); ?>
			</h2>
			</p>


			<form method="post" action="options.php">
				<?php
					settings_fields( 'fsm_custom_featured_image_caption_option_group' );
					do_settings_sections( 'fsm-custom-featured-image-caption-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function fsm_custom_featured_image_caption_page_init() {
		register_setting(
			'fsm_custom_featured_image_caption_option_group', // option_group
			'fsm_custom_featured_image_caption_options', // option_name
			array( $this, 'fsm_custom_featured_image_caption_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'fsm_custom_featured_image_caption_setting_section', // id
			__('Settings','fsm-custom-featured-image-caption'), // title
			array( $this, 'fsm_custom_featured_image_caption_section_info' ), // callback
			'fsm-custom-featured-image-caption-admin' // page
		);


		add_settings_field(
			'CSS_options', // id
			__('CSS for caption text','fsm-custom-featured-image-caption'), // title
			array( $this, 'CSS_options_callback' ), // callback
			'fsm-custom-featured-image-caption-admin', // page
			'fsm_custom_featured_image_caption_setting_section' // section
		);
		
		add_settings_field(
			'Additional options', // id
			__('Additional options','fsm-custom-featured-image-caption'), // title
			array( $this, 'Additional_options_callback' ), // callback
			'fsm-custom-featured-image-caption-admin', // page
			'fsm_custom_featured_image_caption_setting_section' // section
		);
		
	}

	public function fsm_custom_featured_image_caption_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['custom_class'] ) ) {
			$sanitary_values['custom_class'] = sanitize_text_field( $input['custom_class'] );
		}
		
		if ( isset( $input['custom_style'] ) ) {
			$sanitary_values['custom_style'] = sanitize_text_field( $input['custom_style'] );
		}

		if ( isset( $input['CSS_options'] ) ) {
			$sanitary_values['CSS_options'] = esc_textarea( $input['CSS_options'] );
		}
		
		if ( isset( $input['allow_html'] ) ) {
			$sanitary_values['allow_html'] = (int)$input['allow_html'];
		}
		
		if ( isset( $input['show_in_lists'] ) ) {
			$sanitary_values['show_in_lists'] = (int)$input['show_in_lists'];
		}

		return $sanitary_values;
	}

	public function fsm_custom_featured_image_caption_section_info() {
		
	}


	public function CSS_options_callback() {
		?>
		<fieldset>
			<p>
				<?php $checked = ( !isset( $this->fsm_custom_featured_image_caption_options['CSS_options'] ) || $this->fsm_custom_featured_image_caption_options['CSS_options'] === 'default' ) ? 'checked' : '' ; ?>
				<label for="CSS_options-0">		
					<input type="radio" name="fsm_custom_featured_image_caption_options[CSS_options]" id="CSS_options-0" value="default" <?php echo $checked; ?>>
					<?php _e('Default Class (wp-caption-text)', 'fsm-custom-featured-image-caption' ); ?>
				</label>
			</p>
			<p>
				<?php $checked = ( isset( $this->fsm_custom_featured_image_caption_options['CSS_options'] ) && $this->fsm_custom_featured_image_caption_options['CSS_options'] === 'class' ) ? 'checked' : '' ; ?>
				<label for="CSS_options-1">		
					<input type="radio" name="fsm_custom_featured_image_caption_options[CSS_options]" id="CSS_options-1" value="class" <?php echo $checked; ?>>
					<?php _e('Custom Class', 'fsm-custom-featured-image-caption' ); ?>
				</label> 
				
				<?php printf(
					'<input class="regular-text" type="text" name="fsm_custom_featured_image_caption_options[custom_class]" id="custom_class" value="%s" placeholder="customclass class2">',
					isset( $this->fsm_custom_featured_image_caption_options['custom_class'] ) ? esc_attr( $this->fsm_custom_featured_image_caption_options['custom_class']) : ''
				);
				?>
			</p>
			<p>
				<?php $checked = ( isset( $this->fsm_custom_featured_image_caption_options['CSS_options'] ) && $this->fsm_custom_featured_image_caption_options['CSS_options'] === 'style' ) ? 'checked' : '' ; ?>
				<label for="CSS_options-2">
					<input type="radio" name="fsm_custom_featured_image_caption_options[CSS_options]" id="CSS_options-2" value="style" <?php echo $checked; ?>>
					<?php _e('Custom Style', 'fsm-custom-featured-image-caption' ); ?>
				</label>
				<br/>			
				<?php
					printf(
					'<textarea class="large-text" style="max-width:500px;" rows="5" name="fsm_custom_featured_image_caption_options[custom_style]" id="custom_style" placeholder="font-size:30px; color:red;">%s</textarea>',
					isset( $this->fsm_custom_featured_image_caption_options['custom_style'] ) ? esc_attr( $this->fsm_custom_featured_image_caption_options['custom_style']) : ''
					);
				?>
			</p>
		</fieldset> <?php
	}
	
	public function Additional_options_callback() {
	?>
		<fieldset>
			<p>
				<?php
					printf(
						'<input type="checkbox" name="fsm_custom_featured_image_caption_options[allow_html]" id="allow_html" value="1" %s> <label for="allow_html">'.__('Allow HTML code rendering in the caption','fsm-custom-featured-image-caption').'</label>',
						( isset( $this->fsm_custom_featured_image_caption_options['allow_html'] ) && $this->fsm_custom_featured_image_caption_options['allow_html'] === 1 ) ? 'checked' : ''
					);
				?>
			</p>
			<p>
				<?php
					printf(
						'<input type="checkbox" name="fsm_custom_featured_image_caption_options[show_in_lists]" id="cfic_show_in_lists" value="1" %s> <label for="cfic_show_in_lists">'.__('Show image captions in lists','fsm-custom-featured-image-caption').'</label>',
						( isset( $this->fsm_custom_featured_image_caption_options['show_in_lists'] ) && $this->fsm_custom_featured_image_caption_options['show_in_lists'] === 1 ) ? 'checked' : ''
					);
				?>
			</p>
		</fieldset>
	<?php
			
	}

}
if ( is_admin() )
	$fsm_custom_featured_image_caption = new FSMCustomFeaturedImageCaption();










