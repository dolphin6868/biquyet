<?php
/**
 * @version    $Id$
 * @package    IG PageBuilder
 * @author     InnoGears Team <support@www.innogears.com>
 * @copyright  Copyright (C) 2012 www.innogears.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.www.innogears.com
 * Technical Support:  Feedback - http://www.www.innogears.com
 */

?>
	<div class="wrap">

		<h2><?php esc_html_e( 'IG PageBuilder Settings', IGPBL ); ?></h2>

		<?php
		// Show message when save
		$saved = ( isset ( $_GET ) && $_GET['settings-updated'] == 'true' ) ? __( 'Settings saved.', IGPBL ) : __( 'Settings saved.', IGPBL );

		$msg = $type = '';
if ( isset ( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
	$msg  = __( 'Settings saved.', IGPBL );
	$type = 'updated';
} else {
	if ( $_GET['settings-updated'] != 'true' ) {
		$msg  = __( 'Settings is not saved.', IGPBL );
		$type = 'error';
	}
}

if ( isset ( $_GET['settings-updated'] ) ) {
			?>
			<div id="setting-error-settings_updated" class="<?php echo esc_attr( $type ); ?> settings-error">
				<p><strong><?php echo esc_html( $msg ); ?></strong></p>
			</div>
		<?php
		}


		$options = array( 'ig_pb_settings_cache', 'ig_pb_settings_boostrap_js', 'ig_pb_settings_boostrap_css' );
		// submit handle
if ( ! empty ( $_POST ) ) {
	foreach ( $options as $key ) {
				$value = ! empty( $_POST[$key] ) ? 'enable' : 'disable';
				update_option( $key, $value );
			}

			unset( $_POST );
			IG_Pb_Helper_Functions::alert_msg( array( 'success', __( 'Your settings are saved successfully', IGPBL ) ) );
		}
		// get saved options value
foreach ( $options as $key ) {
			$$key = get_option( $key, 'enable' );
		}
		// check/select saved options
function ig_pb_show_check( $value, $compare, $check ) {
			echo esc_attr( ( $value == $compare ) ? $check : '' );
		}

		?>

		<form method="POST" action="options.php">
			<?php
			$page = 'ig-pb-settings';
			settings_fields( $page );
			do_settings_sections( $page );
			submit_button();
			?>
		</form>
	</div>

<?php
// Load inline script initialization
$script = '
		new IG_Pb_Settings({
			ajaxurl: "' . admin_url( 'admin-ajax.php' ) . '",
			_nonce: "' . wp_create_nonce( IGNONCE ) . '",
			button: "ig-pb-clear-cache",
			button: "ig-pb-clear-cache",
			loading: $("#ig-pb-clear-cache").next(".layout-loading"),
			message: $("#ig-pb-clear-cache").parent().find(".layout-message"),
		});
        $(".ig-pb-tipsy-el").tipsy({
            title: function() {
                return this.getAttribute("data-title");
            },
            gravity: "w",
            fade: true
        });
        ';
IG_Init_Assets::inline( 'js', $script );

$style = '
		.jsn-bootstrap { margin-top: 30px; }
        .jsn-bootstrap .checkbox { background:#fff; }
        #ig-pb-clear-cache, .layout-message { margin-left: 6px; }
        ';
IG_Init_Assets::inline( 'css', $style );