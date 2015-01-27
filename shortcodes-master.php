<?php
/*
  Plugin Name: Shortcodes Master
  Plugin URI: https://lizatom.com/wordpress-shortcodes-plugin/
  Version: 0.9.0.2
  Author: Lizatom.com
  Author URI: https://lizatom.com/
  Description: The core plugin for WordPress shortcodes.
  Text Domain: sm
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'SM_PLUGIN_FILE', __FILE__ );
define( 'SM_PLUGIN_VERSION', '0.9.0.2' );
define( 'SM_ENABLE_CACHE', true );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
require_once 'inc/core/vote.php';
require_once 'inc/core/counters.php';
