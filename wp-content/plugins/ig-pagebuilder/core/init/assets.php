<?php
/**
 * @version    $Id$
 * @package    IG_Library
 * @author     InnoGears Team <support@innogears.com>
 * @copyright  Copyright (C) 2012 InnoGears.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.innogears.com
 */

if ( ! class_exists( 'IG_Init_Assets' ) ) :

/**
 * Assets initialization.
 *
 * @package  IG_Library
 * @since    1.0.0
 */
class IG_Init_Assets {
	/**
	 * Assets to be registered.
	 *
	 * @var  array
	 */
	protected static $assets = array(
		/**
		 * Third party assets.
		 */
		'ig-bootstrap-css' => array(
			'src' => 'assets/3rd-party/bootstrap/css/bootstrap.min.css',
			'ver' => '2.3.2',
			'site' => 'admin',
		),

		'ig-bootstrap-responsive-css' => array(
			'src' => 'assets/3rd-party/bootstrap/css/bootstrap-responsive.min.css',
			'deps' => array( 'ig-bootstrap-css' ),
			'ver' => '2.3.2',
			'site' => 'admin',
		),

		'ig-bootstrap-js' => array(
			'src' => 'assets/3rd-party/bootstrap/js/bootstrap.min.js',
			'deps' => array( 'jquery' ),
			'ver' => '2.3.2',
			'site' => 'admin',
		),

		'ig-icomoon-css' => array(
			'src' => 'assets/3rd-party/font-icomoon/css/icomoon.css',
		),

		'ig-jquery-ui-css' => array(
			'src' => 'assets/3rd-party/jquery-ui/css/ui-bootstrap/jquery-ui-1.9.0.custom.css',
			'ver' => '1.9.0',
		),

		'ig-jsn-css' => array(
			'src' => 'assets/3rd-party/jsn/css/jsn-gui.css',
			'deps' => array( 'ig-bootstrap-css', 'ig-icomoon-css' ),
		),

		'ig-addons-css' => array(
			'src' => 'assets/innogears/css/addons.css',
			'deps' => array( 'ig-jquery-ui-css', 'ig-jsn-css' ),
		),

		'ig-addons-js' => array(
			'src' => 'assets/innogears/js/addons.js',
			'deps' => array( 'jquery', 'jquery-ui-dialog' ),
		),
	);

	/**
	 * Registered assets.
	 *
	 * @var  array
	 */
	protected static $registered = array();

	/**
	 * Loaded assets.
	 *
	 * @var  array
	 */
	protected static $loads = array();

	/**
	 * Registered inline scripts/styles.
	 *
	 * @var  array
	 */
	protected static $inline = array( 'css' => array(), 'js' => array() );

	/**
	 * Registered script localization.
	 *
	 * @var  array
	 */
	protected static $localize = array();

	/**
	 * Triggered hooks.
	 *
	 * @var  array
	 */
	protected static $triggered_hooks = array();

	/**
	 * Load required asset.
	 *
	 * @param   string  $handle  Asset handle, e.g. bootstrap-css, bootstrap-js, jquery-fancybox-css, jquery-fancybox-js, etc.
	 * @param   string  $src     Relative path from IT Plugin Framework directory to asset file.
	 * @param   array   $deps    Array of dependencies.
	 * @param   string  $ver     Asset version.
	 *
	 * @return  void
	 */
	public static function load( $handle, $src = null, $deps = array(), $ver = null ) {
		// Check if we have an array of handle
		if ( is_array( $handle ) ) {
			foreach ( $handle AS $key ) {
				self::load( $key );
			}

			return;
		}

		// Store new asset details for register later
		if ( ! isset( self::$assets[ $handle ] ) && ! empty( $src ) ) {
			self::$assets[ $handle ] = array(
				'src'  => $src,
				'deps' => $deps,
				'ver'  => $ver,
			);
		}

		// Check if this is an Ajax request?
		if ( isset( $_GET['ajax'] ) && $_GET['ajax'] ) {
			// Detect asset type
			$type = ( substr( $handle, -4 ) == '-css' ) ? 'style' : 'script';

			// Print HTML tag for loading this asset immediately
			$src = self::$assets[ $handle ]['src'];
			$ver = self::$assets[ $handle ]['ver'];

			if ( 'style' == $type ) {
				echo '<link rel="stylesheet" id="' . $handle . '" href="' . $src . '?ver=' . $ver . '" type="text/css" media="all" />';
			} else {
				echo '<script type="text/javascript" src="' . $src . '?ver=' . $ver . '"></script>';
			}
		} else {
			// Check if required hook is triggered?
			if ( in_array( 'enqueue_scripts', self::$triggered_hooks ) ) {
				self::enqueue_asset( $handle );
			} else {
				self::$loads[] = $handle;
			}
		}
	}

	/**
	 * Register inline scripts / styles.
	 *
	 * @param   string   $type       Either 'css' or 'js'.
	 * @param   string   $text       Inline script/style, do not wrap inside <script> / <style> tags.
	 * @param   boolean  $print_out  Print out immediately instead of schedule till proper hook is triggered.
	 *
	 * @return  void
	 */
	public static function inline( $type, $text, $print_out = false ) {
		if ( isset( self::$inline[$type] ) ) {
			// Print out immediately if proper hook for printing out inline scripts / styles is already triggered
			if ( 'css' == $type && in_array( 'head', self::$triggered_hooks ) ) {
				$print_out = true;
			} elseif ( 'js' == $type && in_array( 'footer', self::$triggered_hooks ) ) {
				$print_out = true;
			}

			// Trim CR / LF character
			$text = trim( $text, "\r\n" );

			if ( $print_out ) {
				self::print_inline( $type, $text );
			} else {
				self::$inline[ $type ][] = $text;
			}
		}
	}

	/**
	 * Register script localization.
	 *
	 * @param   string  $handle  Asset handle, e.g. bootstrap-css, bootstrap-js, jquery-fancybox-css, jquery-fancybox-js, etc.
	 * @param   string  $name    Variable name.
	 * @param   string  $value   Variable value.
	 *
	 * @return  void
	 */
	public static function localize( $handle, $name, $value ) {
		// Check if we have an array of handle
		if ( is_array( $handle ) ) {
			foreach ( $handle AS $key => $defines ) {
				if ( is_array( $defines ) && isset( $defines['name'] ) && isset( $defines['value'] ) ) {
					self::localize( $key, $defines['name'], $defines['value'] );
				}
			}

			return;
		}

		// Store script localization
		self::$localize[ $handle ][] = array( $name, $value );
	}

	/**
	 * Do 'admin_enqueue_scripts' / 'wp_enqueue_scripts' action.
	 *
	 * @return  void
	 */
	public static function enqueue_scripts() {
		// Register assets
		self::register();

		foreach ( self::$loads AS $handle ) {
			self::enqueue_asset( $handle );
		}

		// Indicate that the hook is triggered
		self::$triggered_hooks[] = 'enqueue_scripts';
	}

	/**
	 * Do 'admin_head' / 'wp_head' action.
	 *
	 * @return  void
	 */
	public static function head() {
		self::print_inline( 'css' );

		// Indicate that the hook is triggered
		self::$triggered_hooks[] = 'head';
	}

	/**
	 * Do 'admin_footer' / 'wp_footer' action.
	 *
	 * @return  void
	 */
	public static function footer() {
		self::print_inline( 'js' );

		// Indicate that the hook is triggered
		self::$triggered_hooks[] = 'footer';

		// Apply filter to prepare script localization
		self::$localize = apply_filters( 'ig_localize_assets', self::$localize );

		// Localize scripts
		if ( is_array( self::$localize ) ) {
			foreach ( self::$localize as $handle => $localization ) {
				if ( count( $localization ) ) {
					foreach ( $localization as $localize ) {
						// Prepare arguments
						array_unshift( $localize, preg_replace( '/-(css|js)$/', '', $handle ) );

						// Let WordPress localize this script
						call_user_func_array( 'wp_localize_script', $localize );
					}
				}
			}
		}
	}

	/**
	 * Enqueue asset.
	 *
	 * @param   string  $handle  Asset handle.
	 *
	 * @return  void
	 */
	protected static function enqueue_asset( $handle ) {
		if ( isset( self::$assets[ $handle ] ) && isset( self::$assets[ $handle ]['site'] ) ) {
			if ( 'admin' == self::$assets[ $handle ]['site'] && ! defined( 'WP_ADMIN' ) ) {
				return;
			}

			if ( 'front' == self::$assets[ $handle ]['site'] && defined( 'WP_ADMIN' ) ) {
				return;
			}
		}

		// Register assets if not already registered
		if ( ! in_array( $handle, self::$registered ) ) {
			self::register();
		}

		// Detect asset type
		$type = ( substr( $handle, -4 ) == '-css' ) ? 'style' : 'script';

		// Enqueue asset
		if ( 'script' == $type && isset( self::$assets[ $handle ] ) && in_array( $handle, self::$registered ) ) {
			// Build arguments to load script in footer so it can be localized at any time
			$args[] = preg_replace( '/-(css|js)$/', '', $handle );
			$args[] = self::$assets[ $handle ]['src'];
			$args[] = isset( self::$assets[ $handle ]['deps'] ) ? self::$assets[$handle]['deps'] : array();
			$args[] = isset( self::$assets[ $handle ]['ver']  ) ? self::$assets[$handle]['ver']  : false;
			$args[] = true;

			call_user_func_array( 'wp_enqueue_script', $args );
		} else {
			call_user_func( "wp_enqueue_{$type}", preg_replace( '/-(css|js)$/', '', $handle ) );
		}
	}

	/**
	 * Generate and print out inline scripts / styles.
	 *
	 * @param   string   $type     Either 'css' or 'js'.
	 * @param   string   $text     Text to be printed out.
	 * @param   boolean  $no_wrap  If set to TRUE, inline script will not be wrapped inside '$( document ).ready' function.
	 *
	 * @return  void
	 */
	protected static function print_inline( $type, $text = null, $no_wrap = false ) {
		// Generate then print inline styles / scripts
		$html = array();

		if ( ! empty( $text ) || count( self::$inline[$type] ) ) {
			if ( 'js' == $type ) {
				$html[] = '<script type="text/javascript">';
				$html[] = '(function($) {';

				$no_wrap || $html[] = "\t$(document).ready(function() {";
			} else {
				$html[] = '<style type="text/css">';
			}

			$html[] = ! empty( $text ) ? $text : implode( "\n\n", self::$inline[$type] );

			if ( 'js' == $type ) {
				$no_wrap || $html[] = "\t});";

				$html[] = '})(jQuery);';
				$html[] = '</script>';
			} else {
				$html[] = '</style>';
			}
		}

		echo '' . implode( "\n", $html ) . "\n";
	}

	/**
	 * Register assets with WordPress.
	 *
	 * @return  void
	 */
	protected static function register() {
		// Filter assets to be registered
		self::$assets = apply_filters( 'ig_register_assets', self::$assets );

		foreach ( self::$assets AS $key => $value ) {
			// If asset is registered, continue the loop
			if ( in_array( $key, self::$registered ) ) {
				continue;
			}

			// Store asset being registered
			self::$registered[] = $key;

			// Set default value for missing data
			isset( $value['deps'] ) || $value['deps'] = array();
			isset( $value['ver' ] ) || $value['ver' ] = null;

			// Detect asset type
			$type = substr( $key, -4 ) == '-css' ? 'style' : 'script';

			// Shorten asset and dependency keys
			$key = preg_replace( '/-(css|js)$/', '', $key );

			foreach ( $value['deps'] AS $k => $v ) {
				if ( array_key_exists( $v, self::$assets ) ) {
					$value['deps'][ $k ] = preg_replace( '/-(css|js)$/', '', $v );
				}
			}

			// Register asset
			call_user_func( "wp_register_{$type}", $key, $value['src'], $value['deps'], $value['ver'] );
		}
	}

	/**
	 * Prepare assets path.
	 *
	 * @param   array   $assets       Assets to filtered.
	 * @param   string  $plugin_name  Name of plugin's folder.
	 *
	 * @return  array
	 */
	public static function prepare( $assets = array(), $plugin_name = null ) {
		// Detect base assets path and URI
		if ( empty( $plugin_name ) ) {
			$plugin_name = basename( dirname( dirname( dirname( __FILE__ ) ) ) );
		}

		$base_path = WP_PLUGIN_DIR . "/{$plugin_name}";
		$base_url  = WP_PLUGIN_URL . "/{$plugin_name}";

		// Prepare assets path
		foreach ( $assets AS $key => $value ) {
			// Fine-tune asset location
			if ( ! preg_match( '#^(https?:)?/#', $value['src'] ) AND @is_file( $base_path . '/' . $value['src'] ) ) {
				// Update asset location
				$value['src'] = $base_url . '/' . $value['src'];

				$assets[ $key ] = $value;
			}
		}

		return $assets;
	}

	/**
	 * Hook into WordPress.
	 *
	 * @return  void
	 */
	public static function hook() {
		// Register actions to load assets
		static $registered;

		if ( ! isset( $registered ) ) {
			// Admin or frontend?
			$prefix = defined( 'WP_ADMIN' ) ? 'admin' : 'wp';
			$prefix = ( class_exists( 'IG_Pb_Helper_Functions' ) && IG_Pb_Helper_Functions::is_modal() ) ? 'pb_admin' : $prefix;
			// Register actions
			add_action( "{$prefix}_enqueue_scripts", array( __CLASS__, 'enqueue_scripts' ), 100 );
			add_action( "{$prefix}_head"           , array( __CLASS__, 'head'            ), 100 );
			add_action( "{$prefix}_footer"         , array( __CLASS__, 'footer'          ), 100 );

			// Add filter to filter assets to be registered
			add_filter( 'ig_register_assets', array( __CLASS__, 'prepare' ), 1000 );

			$registered = true;
		}
	}
}

endif;
