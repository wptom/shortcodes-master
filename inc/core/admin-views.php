<?php
class Sm_Admin_Views {
	function __construct() {}

	public static function about( $field, $config ) {
             ob_start(); ?>

           <div id="sm-about-screen">
               <div style="width: 79%; float: left;">
                   <h1><?php _e('Welcome to Shortcodes Master', 'sm'); ?><small>
                   <?php _e('Thank you for using the core plugin for WordPress shortcodes.', 'sm'); ?></small>
                   <small>
                   <?php _e(
               'Don\'t hesitate to contact us for new features, shortcodes, improvements and suggestions. Spread the word about the plugin and help our community grow.',
               'sm'); ?></small> </h1>
               </div>

               <div id="sm-logo" style="">
                   <div class="sm-logo-wrapper">
                       <div class="sm-logo-hammer">
                           <span class="dashicons dashicons-admin-generic"></span>
                       </div>

                       <div class="sm-logo-text">
                           Shortcodes Master

                           <br>
                           <small>ver.
                           <?php echo SM_PLUGIN_VERSION; ?></small>
                       </div>
                   </div>
               </div>
           <div class="clear"></div>

               <div>
                   <a href="https://lizatom.com/wordpress-shortcodes-plugin/" class="button" target="_blank">
                   <?php _e('Homepage', 'sm'); ?></a>
                   <a href="https://lizatom.com/wiki/shortcodes-master/" class="button" target="_blank">
                   <?php _e('Help', 'sm'); ?></a>
                   <a href="#addons" class="button">
                   <?php _e('Addons', 'sm'); ?></a>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="https://lizatom.com/wordpress-shortcodes-plugin/" data-text="Are you using #Shortcodes Master #wordpress #plugin for creating fancy web elements too?" data-size="large">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
               </div>

               <div class="sm-clearfix">
                   <div class="sm-about-column">
                       <h3><?php _e('How to use the plugin?', 'sm'); ?></h3>

                       <ol>
                           <li><?php
                               _e('Simply download one or more addons for Shortcodes Master and start creating new web elements.'); ?></li>                  

                           <li><?php _e(
               'Above the post editor you\'ll find button "Add Shortcodes". Clicking it will open pop-up window with list of shortcodes. Just choose a shortcode, choose values in the generator and click "Insert shortcode" button.',
               'sm'); ?></li>

                           <li><?php _e('That\'s it!', 'sm'); ?></li>
                       </ol>
                   </div>

                   <div class="sm-about-column last">
                       <h3><?php _e('Video showcase', 'sm'); ?></h3>
                       <a href="https://www.youtube.com/watch?v=zcOYk8eMNUY?autoplay=1&amp;showinfo=0&amp;rel=0&amp;theme=light#" target="_blank" class="sm-video"><img src="<?php echo plugins_url( 'assets/images/video-showcase.png', SM_PLUGIN_FILE ); ?>" /></a>
                   </div>
               </div>

               <div class="sm-clearfix">
                   <div>
                       <h3 id="addons"><?php _e('Addons', 'sm'); ?></h3>
                       <?php $addons = array (
                       	   array (	
                               'name' => 'Lizatom shortcodes',
                               'demo' => 'https://lizatom.com/demo/lizatom-shortcodes/',
                               'download_url' => 'https://lizatom.com/lizatom-wordpress-shortcodes-plugin/',
                               'slug' => 'shortcodes-master-lizatom'
                           ),
                           array (
                               'name' => 'Flat shortcodes',
                               'demo' => 'https://lizatom.com/demo/shortcodes-master/#flat-shortcodes/',
                               'download_url' => 'https://lizatom.com/wordpress-flat-design/',
                               'slug' => 'shortcodes-master-flat'
                           ),                           
                           array (
                               'name' => 'Animated service boxes',
                               'demo' => 'https://lizatom.com/demo/shortcodes-master/animated-service-boxes/#animated-service-boxes/',
                               'download_url' => 'https://lizatom.com/animated-service-box-shortcodes/',
                               'slug' => 'shortcodes-master-animated-service-boxes'
                           ),
                           array (
                               'name' => 'Coming soon: GMaps colorized',
                               'demo' => 'https://lizatom.com/colorized-google-maps/',
                               'download_url' => 'https://lizatom.com/',
                               'slug' => 'shortcodes-master-gmaps-colorized'
                           ),
                           array (
                               'name' => 'WC featured products carousel',
                               'demo' =>
                               'https://lizatom.com/woocommerce-shortcodes/#woocommerce-featured-products-carousel',
                               'download_url' => 'https://lizatom.com/wordpress-woocommerce-carousel',
                               'slug' => 'shortcodes-master-wcfpc'
                           ),
                           array (
                               'name' => 'WC featured products slider',
                               'demo' =>
                               'https://lizatom.com/woocommerce-shortcodes/#woocommerce-featured-products-slider',
                               'download_url' => 'https://lizatom.com/wordpress-woocommerce-slider',
                               'slug' => 'shortcodes-master-wcfps'
                           )
                       ); ?>

                       <div class="theme-browser rendered">
                           <div class="themes">
                               <?php foreach ($addons as $addon) {
                                   //check screenshot
                                   /*$screenshot = plugins_url('/' . $addon['slug']) . '/screenshot.png';
                                   $screenshot_headers = @get_headers($screenshot);

                                   if (($screenshot_headers[0] == 'HTTP/1.0 404 Not Found')
                                       || ($screenshot_headers[0] == 'HTTP/1.1 404 Not Found')) {
                                       $screenshot_exists = false;
                                   }
                                   else {
                                       $screenshot_exists = true;
                                   }

                                   if ($screenshot_exists == true) {
                                       $blank = '';
                                   }
                                   else {
                                       $blank = 'blank';
                                   }*/
                                   //check if plugin is downloaded
                                   /*$addon_file = plugins_url('/' . $addon['slug']) . '/' . $addon['slug'] . '.php';
                                   $addon_file_headers = @get_headers($addon_file);

                                   if (($addon_file_headers[0] == 'HTTP/1.0 404 Not Found')
                                       || ($addon_file_headers[0] == 'HTTP/1.1 404 Not Found')) {
                                       $addon_file_exists = false;
                                       $button_label = "Download";
                                       $button_url = $addon['download_url'];
                                       $disabled = "";
                                   }
                                   else {
                                       $addon_file_exists = true;

                                       //check if downloaded plugin is activated
                                       if (is_plugin_active($addon['slug'] . '/' . $addon['slug'] . '.php')) {
                                           $button_label = "Active";
                                           $disabled = "disabled";
                                           $button_url = $addon['download_url'];
                                       }
                                       else {
                                           $button_label = "Activate";
                                           $disabled = "";
                                           $button_url = 'plugins.php';
                                       }
                                   }

                                   if ($screenshot_exists == true) {
                                       $blank = '';
                                   }
                                   else {
                                       $blank = 'blank';
                                   }*/  ?>

                                   <!--<div class="theme">
                                       <div class="theme-screenshot <?php echo $blank; ?>">
                                           <?php echo '<img src="'
                                               . plugins_url('/shortcodes-master/assets/images/' . $addon['slug'])
                                                   . '.png" alt="" />'; ?>
                                       </div>
                                       <a href="<?php echo $addon['demo']; ?>" class="more-details"
                                           target="_blank">Addon Demo</a>

                                       <h3 class="theme-name" id="shortcodesmaster-theme-name"><?php
                                           echo $addon['name']; ?></h3>

                                       <div class="theme-actions">
                                           <a class="button button-primary customize load-customize hide-if-no-customize <?php echo $disabled; ?>"
                                               href="<?php echo $button_url; ?>">
                                           <?php echo $button_label; ?></a>
                                       </div>
                                   </div>-->
                                   
                                   <div class="theme">
                                       <div class="theme-screenshot <?php echo $blank; ?>">
                                           <?php echo '<img src="'
                                               . plugins_url('/shortcodes-master/assets/images/' . $addon['slug'])
                                                   . '.png" alt="" />'; ?>
                                       </div>
                                       <a href="<?php echo $addon['demo']; ?>" class="more-details"
                                           target="_blank">Addon Demo</a>

                                       <h3 class="theme-name" id="shortcodesmaster-theme-name"><?php
                                           echo $addon['name']; ?></h3>

                                       <div class="theme-actions">
                                           <a class="button button-primary customize load-customize hide-if-no-customize <?php echo $disabled; ?>"
                                               href="<?php echo $addon['download_url']; ?>">
                                           Download</a>
                                       </div>
                                   </div>
                               <?php }  ?>
                           </div>
                       </div>
   <?php 
		$output = ob_get_contents();
		ob_end_clean();
		sm_query_asset( 'css', array( 'magnific-popup', 'sm-options-page' ) );
		sm_query_asset( 'js', array( 'jquery', 'magnific-popup', 'sm-options-page' ) );
		return $output;
	}

	public static function custom_css( $field, $config ) {
		ob_start();
?>
<div id="sm-custom-css-screen">
	<div class="sm-custom-css-originals">
		<p><strong><?php _e( 'You can overview the original styles to overwrite it', $config['textdomain'] ); ?></strong></p>
		<!--<div class="sunrise-inline-menu">
			<a href="<?php echo sm_skin_url( 'content-shortcodes.css' ); ?>">content-shortcodes.css</a>
			<a href="<?php echo sm_skin_url( 'box-shortcodes.css' ); ?>">box-shortcodes.css</a>
			<a href="<?php echo sm_skin_url( 'media-shortcodes.css' ); ?>">media-shortcodes.css</a>
			<a href="<?php echo sm_skin_url( 'galleries-shortcodes.css' ); ?>">galleries-shortcodes.css</a>
			<a href="<?php echo sm_skin_url( 'players-shortcodes.css' ); ?>">players-shortcodes.css</a>
			<a href="<?php echo sm_skin_url( 'other-shortcodes.css' ); ?>">other-shortcodes.css</a>
		</div>-->
		<?php do_action( 'sm/admin/css/originals/after' ); ?>
	</div>
	<div class="sm-custom-css-vars">
		<p><strong><?php _e( 'You can use next variables in your custom CSS', $config['textdomain'] ); ?></strong></p>
		<code>%home_url%</code> - <?php _e( 'home url', $config['textdomain'] ); ?><br/>
		<code>%theme_url%</code> - <?php _e( 'theme url', $config['textdomain'] ); ?><br/>
		<code>%plugin_url%</code> - <?php _e( 'plugin url', $config['textdomain'] ); ?>
	</div>
	<div id="sm-custom-css-editor">
		<div id="sunrise-field-<?php echo $field['id']; ?>-editor"></div>
		<textarea name="sunrise[<?php echo $field['id']; ?>]" id="sunrise-field-<?php echo $field['id']; ?>" class="regular-text" rows="10"><?php echo stripslashes( get_option( $config['prefix'] . $field['id'] ) ); ?></textarea>
	</div>
</div>
			<?php
		$output = ob_get_contents();
		ob_end_clean();
		sm_query_asset( 'css', array( 'magnific-popup', 'sm-options-page' ) );
		sm_query_asset( 'js', array( 'jquery', 'magnific-popup', 'ace', 'sm-options-page' ) );
		return $output;
	}

	public static function examples( $field, $config ) {
		$output = array();
		$examples = Sm_Data::examples();
		$preview = '<div style="display:none"><div id="sm-examples-window"><div id="sm-examples-preview"></div></div></div>';
		$open = ( isset( $_GET['example'] ) ) ? sanitize_text_field( $_GET['example'] ) : '';
		$open = '<input id="sm_open_example" type="hidden" name="sm_open_example" value="' . $open . '" />';
		foreach ( $examples as $group ) {
			$items = array();
			if ( isset( $group['items'] ) ) foreach ( $group['items'] as $item ) {
					$code = ( isset( $item['code'] ) ) ? $item['code'] : plugins_url( 'inc/examples/' . $item['id'] . '.example', SM_PLUGIN_FILE );
					$id = ( isset( $item['id'] ) ) ? $item['id'] : '';
					$items[] = '<div class="sm-examples-item" data-code="' . $code . '" data-id="' . $id . '" data-mfp-src="#sm-examples-window"><i class="fa fa-' . $item['icon'] . '"></i> ' . $item['name'] . '</div>';
				}
			$output[] = '<div class="sm-examples-group sm-clearfix"><h2 class="sm-examples-group-title">' . $group['title'] . '</h2>' . implode( '', $items ) . '</div>';
		}
		sm_query_asset( 'css', array( 'magnific-popup', 'font-awesome', 'sm-options-page' ) );
		sm_query_asset( 'js', array( 'jquery', 'magnific-popup', 'sm-options-page' ) );
		return '<div id="sm-examples-screen">' . implode( '', $output ) . '</div>' . $preview . $open;
	}

	public static function cheatsheet( $field, $config ) {
		// Prepare print button
		$print = '<div><a href="javascript:;" id="sm-cheatsheet-print" class="sm-cheatsheet-switch button button-primary button-large">' . __( 'Printable version', 'sm' ) . '</a><div id="sm-cheatsheet-print-head"><h1>' . __( 'Shortcodes Master', 'sm' ) . ': ' . __( 'Cheatsheet', 'sm' ) . '</h1><a href="javascript:;" class="sm-cheatsheet-switch">&larr; ' . __( 'Back to Dashboard', 'sm' ) . '</a></div></div>';
		// Prepare table array
		$table = array();
		// Table start
		$table[] = '<table><tr><th style="width:20%;">' . __( 'Shortcode', 'sm' ) . '</th><th style="width:50%">' . __( 'Attributes', 'sm' ) . '</th><th style="width:30%">' . __( 'Example code', 'sm' ) . '</th></tr>';
		// Loop through shortcodes
		foreach ( (array) Sm_Data::shortcodes() as $name => $shortcode ) {
			// Prepare vars
			$icon = ( isset( $shortcode['icon'] ) ) ? $shortcode['icon'] : 'puzzle-piece';
			$shortcode['name'] = ( isset( $shortcode['name'] ) ) ? $shortcode['name'] : $name;
			$attributes = array();
			$example = array();
			$icons = 'icon: music, icon: envelope &hellip; <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">' . __( 'full list', 'sm' ) . '</a>';
			// Loop through attributes
			if ( is_array( $shortcode['atts'] ) )
				foreach ( $shortcode['atts'] as $id => $data ) {
					// Prepare default value
					$default = ( isset( $data['default'] ) && $data['default'] !== '' ) ? '<p><em>' . __( 'Default value', 'sm' ) . ':</em> ' . $data['default'] . '</p>' : '';
					// Check type is set
					if ( empty( $data['type'] ) ) $data['type'] = 'text';
					// Switch attribute types
					switch ( $data['type'] ) {
						// Select
					case 'select':
						$value = implode( ', ', array_keys( $data['values'] ) );
						break;
						// Slider and number
					case 'slider':
					case 'number':
						$value = $data['min'] . '&hellip;' . $data['max'];
						break;
						// Bool
					case 'bool':
						$value = 'yes | no';
						break;
						// Icon
					case 'icon':
						$value = $icons;
						break;
						// Color
					case 'color':
						$value = __( '#RGB and rgba() colors' );
						break;
						// Default value
					default:
						$value = $data['default'];
						break;
					}
					// Check empty value
					if ( $value === '' ) $value = __( 'Any text value', 'sm' );
					// Extra CSS class
					if ( $id === 'class' ) $value = __( 'Any custom CSS classes', 'sm' );
					// Add attribute
					$attributes[] = '<div class="sm-shortcode-attribute"><strong>' . $data['name'] . ' <em>&ndash; ' . $id . '</em></strong><p><em>' . __( 'Possible values', 'sm' ) . ':</em> ' . $value . '</p>' . $default . '</div>';
					// Add attribute to the example code
					$example[] = $id . '="' . $data['default'] . '"';
				}
			// Prepare example code
			$example = '[%prefix_' . $name . ' ' . implode( ' ', $example ) . ']';
			// Prepare content value
			if ( empty( $shortcode['content'] ) ) $shortcode['content'] = '';
			// Add wrapping code
			if ( $shortcode['type'] === 'wrap' ) $example .= esc_textarea( $shortcode['content'] ) . '[/%prefix_' . $name . ']';
			// Change compatibility prefix
			$example = str_replace( array( '%prefix_', '__' ), sm_cmpt(), $example );
			// Shortcode
			$table[] = '<td>' . '<span class="sm-shortcode-icon">' . Sm_Tools::icon( $icon ) . '</span>' . $shortcode['name'] . '<br/><em class="sm-shortcode-desc">' . $shortcode['desc'] . '</em></td>';
			// Attributes
			$table[] = '<td>' . implode( '', $attributes ) . '</td>';
			// Example code
			$table[] = '<td><code contenteditable="true">' . $example . '</code></td></tr>';
		}
		// Table end
		$table[] = '</table>';
		// Query assets
		sm_query_asset( 'css', array( 'font-awesome', 'sm-cheatsheet' ) );
		sm_query_asset( 'js', array( 'jquery', 'sm-options-page' ) );
		// Return output
		return '<div id="sm-cheatsheet-screen">' . $print . implode( '', $table ) . '</div>';
	}

	public static function addons( $field, $config ) {
		$output = array();
		$addons = array(
			array(),
		);
		$plugins = array();
		$output[] = '<h2>' . __( 'Shortcodes Master Add-ons', 'sm' ) . '</h2>';
		$output[] = '<div class="sm-addons-loop sm-clearfix">';
		foreach ( $addons as $addon ) {
			$output[] = '<div class="sm-addons-item" style="visibility:hidden" data-url="' . $addon['url'] . '"><img src="' . $addon['image'] . '" alt="' . $addon['image'] . '" /><div class="sm-addons-item-content"><h4>' . $addon['name'] . '</h4><p>' . $addon['desc'] . '</p><div class="sm-addons-item-button"><a href="' . $addon['url'] . '" class="button button-primary" target="_blank">' . __( 'Learn more', 'sm' ) . '</a></div></div></div>';
		}
		$output[] = '</div>';
		if ( count( $plugins ) ) {
			$output[] = '<h2>' . __( 'Other WordPress Plugins', 'sm' ) . '</h2>';
			$output[] = '<div class="sm-addons-loop sm-clearfix">';
			foreach ( $plugins as $plugin ) {
				$output[] = '<div class="sm-addons-item" style="visibility:hidden" data-url="' . $plugin['url'] . '"><img src="' . $plugin['image'] . '" alt="' . $plugin['image'] . '" /><div class="sm-addons-item-content"><h4>' . $plugin['name'] . '</h4><p>' . $plugin['desc'] . '</p>' . Sm_Shortcodes::button( array( 'url' => $plugin['url'], 'target' => 'blank', 'style' => 'flat', 'background' => '#FF7654', 'wide' => 'yes', 'radius' => '0' ), __( 'Learn more', 'sm' ) ) . '</div></div>';
			}
			$output[] = '</div>';
		}
		sm_query_asset( 'css', array( 'animate', 'sm-options-page' ) );
		sm_query_asset( 'js', array( 'jquery', 'sm-options-page' ) );
		return '<div id="sm-addons-screen">' . implode( '', $output ) . '</div>';
	}
}
