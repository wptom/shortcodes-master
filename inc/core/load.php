<?php
class Shortcodes_Master {

	/**
	 * Constructor
	 */
	function __construct() {
		add_action( 'plugins_loaded',             array( __CLASS__, 'init' ) );
		add_action( 'init',                       array( __CLASS__, 'register' ) );
		add_action( 'init',                       array( __CLASS__, 'update' ), 20 );
		register_activation_hook( SM_PLUGIN_FILE, array( __CLASS__, 'activation' ) );
		register_activation_hook( SM_PLUGIN_FILE, array( __CLASS__, 'deactivation' ) );
	}

	/**
	 * Plugin init
	 */
	public static function init() {
		// Make plugin available for translation
		load_plugin_textdomain( 'sm', false, dirname( plugin_basename( SM_PLUGIN_FILE ) ) . '/languages/' );
		// Setup admin class
		$admin = new Sunrise4( array(
				'file'       => SM_PLUGIN_FILE,
				'slug'       => 'sm',
				'prefix'     => 'sm_option_',
				'textdomain' => 'sm'
			) );
		// Top-level menu
		$admin->add_menu( array(
				'page_title'  => __( 'Settings', 'sm' ) . ' &lsaquo; ' . __( 'Shortcodes Master', 'sm' ),
				'menu_title'  => apply_filters( 'sm/menu/shortcodes', __( 'Shortcodes', 'sm' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'shortcodes-master',
				'icon_url'    => 'dashicons-admin-generic',
				'position'    => '80.10',
				'options'     => array(
					array(
						'type' => 'opentab',
						'name' => __( 'About', 'sm' )
					),
					array(
						'type'     => 'about',
						'callback' => array( 'Sm_Admin_Views', 'about' )
					),
					array(
						'type'    => 'closetab',
						'actions' => false
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Settings', 'sm' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'custom-formatting',
						'name'    => __( 'Custom formatting', 'sm' ),
						'desc'    => __( 'Disable this option if you have some problems with other plugins or content formatting', 'sm' ),
						'default' => 'on',
						'label'   => __( 'Enabled', 'sm' )
					),
					array(
						'type'    => 'checkbox',
						'id'      => 'skip',
						'name'    => __( 'Skip default values', 'sm' ),
						'desc'    => __( 'Enable this option and the generator will insert a shortcode without default attribute values that you have not changed. As a result, the generated code will be shorter.', 'sm' ),
						'default' => 'on',
						'label'   => __( 'Enabled', 'sm' )
					),
					array(
						'type'    => 'text',
						'id'      => 'prefix',
						'name'    => __( 'Shortcodes prefix', 'sm' ),
						'desc'    => sprintf( __( 'This prefix will be added to all shortcodes by this plugin. For example, type here %s and you\'ll get shortcodes like %s and %s. Please keep in mind: this option does not affect your already inserted shortcodes and if you\'ll change this value your old shortcodes will be broken', 'sm' ), '<code>sm_</code>', '<code>[sm_button]</code>', '<code>[sm_column]</code>' ),
						'default' => 'sm_'
					),
					array(
						'type'    => 'hidden',
						'id'      => 'skin',
						'name'    => __( 'Skin', 'sm' ),
						'desc'    => __( 'Choose global skin for shortcodes', 'sm' ),
						'default' => 'default'
					),
					array(
						'type' => 'closetab'
					),
					array(
						'type' => 'opentab',
						'name' => __( 'Custom CSS', 'sm' )
					),
					array(
						'type'     => 'custom_css',
						'id'       => 'custom-css',
						'default'  => '',
						'callback' => array( 'Sm_Admin_Views', 'custom_css' )
					),
					array(
						'type' => 'closetab'
					)
				)
			) );
		// Settings submenu
		/*$admin->add_submenu( array(
				'parent_slug' => 'shortcodes-master',
				'page_title'  => __( 'Settings', 'sm' ) . ' &lsaquo; ' . __( 'Shortcodes Master', 'sm' ),
				'menu_title'  => apply_filters( 'sm/menu/settings', __( 'Settings', 'sm' ) ),
				'capability'  => 'manage_options',
				'slug'        => 'shortcodes-master',
				'options'     => array()
			) );*/
		// Examples submenu
		/*$admin->add_submenu( array(
				'parent_slug' => 'shortcodes-master',
				'page_title'  => __( 'Examples', 'sm' ) . ' &lsaquo; ' . __( 'Shortcodes Master', 'sm' ),
				'menu_title'  => apply_filters( 'sm/menu/examples', __( 'Examples', 'sm' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'shortcodes-master-examples',
				'options'     => array(
					array(
						'type' => 'examples',
						'callback' => array( 'Sm_Admin_Views', 'examples' )
					)
				)
			) );*/
		// Cheatsheet submenu
		/*$admin->add_submenu( array(
				'parent_slug' => 'shortcodes-master',
				'page_title'  => __( 'Cheatsheet', 'sm' ) . ' &lsaquo; ' . __( 'Shortcodes Master', 'sm' ),
				'menu_title'  => apply_filters( 'sm/menu/examples', __( 'Cheatsheet', 'sm' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'shortcodes-master-cheatsheet',
				'options'     => array(
					array(
						'type' => 'cheatsheet',
						'callback' => array( 'Sm_Admin_Views', 'cheatsheet' )
					)
				)
			) );*/
		// Add-ons submenu
		/*$admin->add_submenu( array(
				'parent_slug' => 'shortcodes-master',
				'page_title'  => __( 'Add-ons', 'sm' ) . ' &lsaquo; ' . __( 'Shortcodes Master', 'sm' ),
				'menu_title'  => apply_filters( 'sm/menu/addons', __( 'Add-ons', 'sm' ) ),
				'capability'  => 'edit_others_posts',
				'slug'        => 'shortcodes-master-addons',
				'options'     => array(
					array(
						'type' => 'addons',
						'callback' => array( 'Sm_Admin_Views', 'addons' )
					)
				)
			) );*/
		// Translate plugin meta
		__( 'Shortcodes Master', 'sm' );
		__( 'Lizatom.com', 'sm' );
		__( 'The core plugin for WordPress shortcodes', 'sm' );
		// Add plugin actions links
		add_filter( 'plugin_action_links_' . plugin_basename( SM_PLUGIN_FILE ), array( __CLASS__, 'actions_links' ), -10 );
		// Add plugin meta links
		add_filter( 'plugin_row_meta', array( __CLASS__, 'meta_links' ), 10, 2 );
		// Shortcodes Master is ready
		do_action( 'sm/init' );
	}

	/**
	 * Plugin activation
	 */
	public static function activation() {
		self::timestamp();
		self::skins_dir();
		update_option( 'sm_option_version', SM_PLUGIN_VERSION );
		do_action( 'sm/activation' );
	}

	/**
	 * Plugin deactivation
	 */
	public static function deactivation() {
		do_action( 'sm/deactivation' );
	}

	/**
	 * Plugin update hook
	 */
	public static function update() {
		$option = get_option( 'sm_option_version' );
		if ( $option !== SM_PLUGIN_VERSION ) {
			update_option( 'sm_option_version', SM_PLUGIN_VERSION );
			do_action( 'sm/update' );
		}
	}

	/**
	 * Register shortcodes
	 */
	public static function register() {
		// Prepare compatibility mode prefix
		$prefix = sm_cmpt();
		// Loop through shortcodes
		foreach ( ( array ) Sm_Data::shortcodes() as $id => $data ) {
			if ( isset( $data['function'] ) && is_callable( $data['function'] ) ) $func = $data['function'];
			elseif ( is_callable( array( 'Sm_Shortcodes', $id ) ) ) $func = array( 'Sm_Shortcodes', $id );
			elseif ( is_callable( array( 'Sm_Shortcodes', 'sm_' . $id ) ) ) $func = array( 'Sm_Shortcodes', 'sm_' . $id );
			else continue;
			// Register shortcode
			add_shortcode( $prefix . $id, $func );
		}
		// Register [media] manually // 3.x
		add_shortcode( $prefix . 'media', array( 'Sm_Shortcodes', 'media' ) );
	}

	/**
	 * Add timestamp
	 */
	public static function timestamp() {
		if ( !get_option( 'sm_installed' ) ) update_option( 'sm_installed', time() );
	}

	/**
	 * Create directory /wp-content/uploads/shortcodes-master-skins/ on activation
	 */
	public static function skins_dir() {
		$upload_dir = wp_upload_dir();
		$path = trailingslashit( path_join( $upload_dir['basedir'], 'shortcodes-master-skins' ) );
		if ( !file_exists( $path ) ) mkdir( $path, 0755 );
	}

	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=shortcodes-master' ) . '#tab-0">' . __( 'Settings', 'sm' ) . '</a>';
		return $links;
	}

	/**
	 * Add plugin meta links
	 */
	public static function meta_links( $links, $file ) {
		// Check plugin
		if ( $file === plugin_basename( SM_PLUGIN_FILE ) ) {
			unset( $links[2] );
			$links[] = '<a href="https://lizatom.com/wordpress-shortcodes-plugin/" target="_blank">' . __( 'Visit plugin site', 'sm' ) . '</a>';
			$links[] = '<a href="https://lizatom.com/wiki/shortcodes-master/" target="_blank">' . __( 'Help', 'sm' ) . '</a>';
		}
		return $links;
	}
}

/**
 * Register plugin function to perform checks that plugin is installed
 */
function shortcodes_master() {
	return true;
}

new Shortcodes_Master;
