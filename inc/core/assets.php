<?php

/**
 * Class for managing plugin assets
 */
class Sm_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'wp_head',                     array( __CLASS__, 'register' ) );
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		add_action( 'sm/generator/preview/before', array( __CLASS__, 'register' ) );
		add_action( 'sm/examples/preview/before',  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'wp_footer',                   array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'sm/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'sm/examples/preview/after',   array( __CLASS__, 'prnt' ) );
		// Custom CSS
		add_action( 'wp_footer',                   array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'sm/generator/preview/after',  array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'sm/examples/preview/after',   array( __CLASS__, 'custom_css' ), 99 );
		// Custom TinyMCE CSS and JS
		// add_filter( 'mce_css',                     array( __CLASS__, 'mce_css' ) );
		// add_filter( 'mce_external_plugins',        array( __CLASS__, 'mce_js' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {
		// Chart.js
		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', SM_PLUGIN_FILE ), false, '0.2', true );
		// SimpleSlider
		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', SM_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', plugins_url( 'assets/css/simpleslider.css', SM_PLUGIN_FILE ), false, '1.0.0', 'all' );
		// Owl Carousel
		wp_register_script( 'owl-carousel', plugins_url( 'assets/js/owl-carousel.js', SM_PLUGIN_FILE ), array( 'jquery' ), '1.3.2', true );
		wp_register_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', SM_PLUGIN_FILE ), false, '1.3.2', 'all' );
		wp_register_style( 'owl-carousel-transitions', plugins_url( 'assets/css/owl-carousel-transitions.css', SM_PLUGIN_FILE ), false, '1.3.2', 'all' );
		// Font Awesome
		wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false, '4.1.0', 'all' );
		// Animate.css
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', SM_PLUGIN_FILE ), false, '3.1.1', 'all' );
		// InView
		wp_register_script( 'inview', plugins_url( 'assets/js/inview.js', SM_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// qTip
		wp_register_style( 'qtip', plugins_url( 'assets/css/qtip.css', SM_PLUGIN_FILE ), false, '2.1.1', 'all' );
		wp_register_script( 'qtip', plugins_url( 'assets/js/qtip.js', SM_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// jsRender
		wp_register_script( 'jsrender', plugins_url( 'assets/js/jsrender.js', SM_PLUGIN_FILE ), array( 'jquery' ), '1.0.0-beta', true );
		// Magnific Popup
		wp_register_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', SM_PLUGIN_FILE ), false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.js', SM_PLUGIN_FILE ), array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'sm_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'sm' ),
				'loading' => __( 'Loading...', 'sm' ),
				'prev'    => __( 'Previous (Left arrow key)', 'sm' ),
				'next'    => __( 'Next (Right arrow key)', 'sm' ),
				'counter' => sprintf( __( '%s of %s', 'sm' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'sm' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );
		// Ace
		wp_register_script( 'ace', plugins_url( 'assets/js/ace/ace.js', SM_PLUGIN_FILE ), false, '1.1.3', true );
		// Swiper
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper.js', SM_PLUGIN_FILE ), array( 'jquery' ), '2.6.1', true );
		// jPlayer
		wp_register_script( 'jplayer', plugins_url( 'assets/js/jplayer.js', SM_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// Options page
		wp_register_style( 'sm-options-page', plugins_url( 'assets/css/options-page.css', SM_PLUGIN_FILE ), false, SM_PLUGIN_VERSION, 'all' );
		wp_register_script( 'sm-options-page', plugins_url( 'assets/js/options-page.js', SM_PLUGIN_FILE ), array( 'magnific-popup', 'jquery-ui-sortable', 'ace', 'jsrender' ), SM_PLUGIN_VERSION, true );
		wp_localize_script( 'sm-options-page', 'sm_options_page', array(
				'upload_title'  => __( 'Choose files', 'sm' ),
				'upload_insert' => __( 'Add selected files', 'sm' ),
				'not_clickable' => __( 'This button is not clickable', 'sm' )
			) );		
		// Generator
		wp_register_style( 'sm-generator', plugins_url( 'assets/css/generator.css', SM_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup' ), SM_PLUGIN_VERSION, 'all' );
		wp_register_script( 'sm-generator', plugins_url( 'assets/js/generator.js', SM_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup', 'qtip' ), SM_PLUGIN_VERSION, true );
		wp_localize_script( 'sm-generator', 'sm_generator', array(
				'upload_title'         => __( 'Choose file', 'sm' ),
				'upload_insert'        => __( 'Insert', 'sm' ),
				'isp_media_title'      => __( 'Select images', 'sm' ),
				'isp_media_insert'     => __( 'Add selected images', 'sm' ),
				'presets_prompt_msg'   => __( 'Please enter a name for new preset', 'sm' ),
				'presets_prompt_value' => __( 'New preset', 'sm' ),
				'last_used'            => __( 'Last used settings', 'sm' )
			) );
		// Shortcodes stylesheets
		//wp_register_style( 'sm-content-shortcodes', self::skin_url( 'content-shortcodes.css' ), false, SM_PLUGIN_VERSION, 'all' );
		// Shortcodes scripts
		/*wp_register_script( 'sm-galleries-shortcodes', plugins_url( 'assets/js/galleries-shortcodes.js', SM_PLUGIN_FILE ), array( 'jquery', 'swiper' ), SM_PLUGIN_VERSION, true );
		wp_register_script( 'sm-players-shortcodes', plugins_url( 'assets/js/players-shortcodes.js', SM_PLUGIN_FILE ), array( 'jquery', 'jplayer' ), SM_PLUGIN_VERSION, true );
		wp_register_script( 'sm-other-shortcodes', plugins_url( 'assets/js/other-shortcodes.js', SM_PLUGIN_FILE ), array( 'jquery' ), SM_PLUGIN_VERSION, true );
		wp_localize_script( 'sm-other-shortcodes', 'sm_other_shortcodes', array( 'no_preview' => __( 'This shortcode doesn\'t work in live preview. Please insert it into editor and preview on the site.', 'sm' ) ) );*/
		// Hook to deregister assets or add custom
		do_action( 'sm/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'sm/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'sm/assets/print', $assets );
	}

	/**
	 * Print custom CSS
	 */
	public static function custom_css() {
		// Get custom CSS and apply filters to it
		$custom_css = apply_filters( 'sm/assets/custom_css', str_replace( '&#039;', '\'', html_entity_decode( (string) get_option( 'sm_option_custom-css' ) ) ) );
		// Print CSS if exists
		if ( $custom_css ) echo "\n\n<!-- Shortcodes Master custom CSS - begin -->\n<style type='text/css'>\n" . stripslashes( str_replace( array( '%theme_url%', '%home_url%', '%plugin_url%' ), array( trailingslashit( get_stylesheet_directory_uri() ), trailingslashit( get_option( 'home' ) ), trailingslashit( plugins_url( '', SM_PLUGIN_FILE ) ) ), $custom_css ) ) . "\n</style>\n<!-- Shortcodes Master custom CSS - end -->\n\n";
	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= plugins_url( 'assets/css/tinymce.css', SM_PLUGIN_FILE );
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['shortcodesultimate'] = plugins_url( 'assets/js/tinymce.js', SM_PLUGIN_FILE );
		return $plugins;
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}
	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'sm/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'sm/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = shortcodes_master();
		$skin = get_option( 'sm_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? plugins_url( 'assets/css/', SM_PLUGIN_FILE ) : $uploads . '/shortcodes-master-skins/' . $skin;
		return trailingslashit( apply_filters( 'sm/assets/skin', $url ) ) . $file;
	}
}

new Sm_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function sm_query_asset( $type, $handle ) {
	Sm_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function sm_skin_url( $file ) {
	return Sm_Assets::skin_url( $file );
}
