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

// Check if this is an Ajax request for specific form section
if ( empty( $section_id ) || ! isset( $_GET['ajax'] ) || ! $_GET['ajax'] ) :

if ( isset( $this->action ) ) : ?>
<form action="<?php echo esc_url( $this->action ); ?>" class="<?php esc_attr_e( empty( $alignment ) ? 'ig-form' : "ig-form form-{$alignment}" ); ?>" id="<?php esc_attr_e( $this->id ); ?>" name="<?php esc_attr_e( $this->id ); ?>" method="POST">
	<?php wp_nonce_field( $this->id ); ?>
<?php else : ?>
<div class="<?php esc_attr_e( empty( $alignment ) ? 'ig-form' : "ig-form form-{$alignment}" ); ?>" id="<?php esc_attr_e( $this->id ); ?>">
<?php endif; ?>
	<?php foreach ( $this->messages as $class => $message) : ?>
	<div class="alert alert-block<?php if ( 'alert' != $class ) esc_attr_e( " alert-{$class}" ); ?>">
		<a class="jsn-close-message close" title="<?php _e( 'Close', $this->text_domain ); ?>" href="javascript:void(0);" onclick="jQuery(this).parent().remove();">×</a>
		<?php _e( $message, $this->text_domain ); ?>
	</div>
	<?php endforeach; ?>
	<div class="ig-form-sections <?php if ( ( $numSection = count( $this->fields ) ) > 1 ) echo 'ig-form-sections-tabs'; ?>">
		<?php if ( $numSection > 1 ) : ?>
		<ul>
			<?php foreach ( $this->fields as $sid => $section ) : ?>
			<li><a href="#ig-form-section-<?php esc_attr_e( $sid ); ?>"><?php _e( isset( $section['title'] ) ? $section['title'] : $sid, $this->text_domain ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
<?php
endif;

foreach ( $this->fields as $sid => $section ) :

// Load section template
if ( ! isset( $_GET['ajax'] ) || ! $_GET['ajax'] || empty($section_id) || $section_id == $sid ) {
	include IG_Loader::get_path( 'form/tmpl/section.php' );
}

endforeach;

// Check if this is an Ajax request for specific form section
if ( empty( $section_id ) || ! isset( $_GET['ajax'] ) || ! $_GET['ajax'] ) :
?>
	</div>
<?php if ( ! isset( $this->action ) ) : ?>
</div>
<?php else : ?>
	<?php if ( isset( $this->buttons ) ) : ?>
	<div class="form-actions">
		<?php foreach ( $this->buttons as $bid => $button ) : ?>
		<button class="<?php esc_attr_e( $button['class'] ); ?>" id="ig-form-action-<?php esc_attr_e( $bid ); ?>" type="<?php esc_attr_e( $button['type'] ); ?>">
			<?php _e( $button['label'], $this->text_domain ); ?>
		</button>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</form>
<?php endif; ?>
<?php
// Print Javascript initialization
$script = '
		// Init form
		new $.IG_Form(' . json_encode( array_merge( array( 'id' => esc_attr( $this->id ) ), array_combine( $js_init, array_map( 'is_string', $js_init ) ) ) ) . ');';

IG_Init_Assets::inline( 'js', $script, true );

endif;

// Exit immediately if this is an Ajax request
if ( isset( $_GET['ajax'] ) && $_GET['ajax'] ) {
	exit;
}
