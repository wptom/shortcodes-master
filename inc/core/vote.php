<?php

class Sm_Vote {

	function __construct() {
		add_action( 'load-plugins.php', array( __CLASS__, 'init' ) );
		add_action( 'wp_ajax_sm_vote',  array( __CLASS__, 'vote' ) );
	}

	public static function init() {
		Shortcodes_Master::timestamp();
		$vote = get_option( 'sm_vote' );
		$timeout = time() > ( get_option( 'sm_installed' ) + 60*60*24*3 );
		if ( in_array( $vote, array( 'yes', 'no', 'tweet' ) ) || !$timeout ) return;
		add_action( 'in_admin_footer', array( __CLASS__, 'message' ) );
		add_action( 'admin_head',      array( __CLASS__, 'register' ) );
		add_action( 'admin_footer',    array( __CLASS__, 'enqueue' ) );
	}

	public static function register() {
		wp_register_style( 'sm-vote', plugins_url( 'assets/css/vote.css', SM_PLUGIN_FILE ), false, SM_PLUGIN_VERSION, 'all' );
		wp_register_script( 'sm-vote', plugins_url( 'assets/js/vote.js', SM_PLUGIN_FILE ), array( 'jquery' ), SM_PLUGIN_VERSION, true );
	}

	public static function enqueue() {
		wp_enqueue_style( 'sm-vote' );
		wp_enqueue_script( 'sm-vote' );
	}

	public static function vote() {
		$vote = sanitize_key( $_GET['vote'] );
		if ( !is_user_logged_in() || !in_array( $vote, array( 'yes', 'no', 'later', 'tweet' ) ) ) die( 'error' );
		update_option( 'sm_vote', $vote );
		if ( $vote === 'later' ) update_option( 'sm_installed', time() );
		die( 'OK: ' . $vote );
	}

	public static function message() {
?>
		<div class="sm-vote" style="display:none">
			<div class="sm-vote-wrap">
				<div class="sm-vote-gravatar"><a href="https://lizatom.com/" target="_blank"><img src="<?php echo plugins_url( 'assets/images/lizatom-logo-50x50.png', SM_PLUGIN_FILE ); ?>" alt="<?php _e( 'Lizatom.com', 'sm' ); ?>" width="50" height="50"></a></div>
				<div class="sm-vote-message">
					<p><?php _e( 'If you find Shortcodes Master plugin and its add-ons useful, please let people know you are using it via Twitter. This will help our community grow much faster. <br><b>Thank you!</b>', 'sm' ); ?></p>
					<p>
						<!--<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=sm_vote&amp;vote=yes" class="sm-vote-action button button-small button-primary" data-action="http://wordpress.org/support/view/plugin-reviews/shortcodes-master?rate=5#postform"><?php _e( 'Rate plugin', 'sm' ); ?></a>-->
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=sm_vote&amp;vote=tweet" class="sm-vote-action button button-small"
data-action="http://twitter.com/share?url=http://bit.ly/1CcBxw4&amp;text=<?php echo urlencode( __( 'Shortcodes Master - the core plugin for WordPress shortcodes #lizatom #wordpress
#shortcodes. Grab it now!', 'sm' ) ); ?>"><?php _e( 'Tweet', 'sm' ); ?></a>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=sm_vote&amp;vote=no" class="sm-vote-action button button-small"><?php _e( 'No, thanks', 'sm' ); ?></a>
						<span><?php _e( 'or', 'sm' ); ?></span>
						<a href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=sm_vote&amp;vote=later" class="sm-vote-action button button-small"><?php _e( 'Remind me later', 'sm' ); ?></a>
					</p>
				</div>
				<div class="sm-vote-clear"></div>
			</div>
		</div>
		<?php
	}
}

new Sm_Vote;
