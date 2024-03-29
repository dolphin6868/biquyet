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
class IG_Pb_Helper_Html_Color_Picker extends IG_Pb_Helper_Html {
	/**
	 * Color picker
	 * @param type $element
	 * @return string
	 */
	static function render( $element ) {
		$element  = parent::get_extra_info( $element );
		$label    = parent::get_label( $element );
		$bg_color = ( $element['std'] ) ? $element['std'] : '#000';
		$_hidden  = ( isset( $element['hide_value'] ) && $element['hide_value'] == false ) ? 'type="text"' : 'type="hidden"';
		$output   = '<input ' . $_hidden . " size='10' id='{$element['id']}' class='input-mini' disabled='disabled' name='{$element['id']}' value='{$element['std']}'  DATA_INFO />";
		$output  .= "<div id='color-picker-{$element['id']}' class='color-selector'><div style='background-color: {$bg_color}'></div></div>";

		//$output = "<input class='{$element['class']} ig_color_picker' id='{$element['id']}' name='{$element['id']}' type='text' value='{$element['std']}'  DATA_INFO />
		//<div class='cw-color-picker ig_color_picker_cw' rel='{$element['id']}'></div>";

		add_filter( 'ig_pb_assets_enqueue_modal', array( __CLASS__, 'this_assets_enqueue_modal' ) );

		return parent::final_element( $element, $output, $label );
	}

	// enqueue custom assets
	static function this_assets_enqueue_modal( $scripts ){
		$scripts = array_merge( $scripts, array( 'ig-pb-colorpicker-js', 'ig-pb-colorpicker-css', ) );

		return $scripts;
	}
}