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
class IG_Pb_Helper_Html_Select extends IG_Pb_Helper_Html {
	/**
	 * select box
	 * @param type $element
	 * @return string
	 */
	static function render( $element ) {
		$selected_value = $element['std'];
		$options = $element['options'];
		$output = '';
		$label  = '';
		if ( is_array( $options ) && count( $options ) > 0 ) {
			$element  = parent::get_extra_info( $element );
			$label    = parent::get_label( $element );
			$multiple = ( isset( $element['multiple'] ) ) ? 'multiple="multiple"' : '';

			$output = "<select id='{$element['id']}' name='{$element['id']}' class='{$element['class']}' {$multiple} >";
			foreach ( $options as $key => $value ) {
				if ( is_array( $value ) ) {
					if ( ( $value['type'] == 'optiongroup' ) )
						$output .= '<optgroup label="' . $value['text'] . '">';
				} else {
					$option_value = $key;
					$selected     = ( $option_value == $selected_value ) ? 'selected' : '';
					$output      .= "<option value='$option_value' $selected>$value</option>";
				}
			}
			$output .= '</select>';
			if ( isset( $element['append_text'] ) ) {
				$output .= "<span class='add-on'>{$element['append_text']}</span>";
			}
			if ( isset( $element['multiple'] ) ) {
				$output .= "<input type='hidden' id='{$element['id']}_select_multi' value='{$element['std']}' />";
			}
		}

		add_filter( 'ig_pb_assets_enqueue_modal', array( __CLASS__, 'this_assets_enqueue_modal' ) );

		return parent::final_element( $element, $output, $label );
	}

	// enqueue custom assets
	static function this_assets_enqueue_modal( $scripts ){
		$scripts = array_merge( $scripts, array( 'ig-pb-jquery-select2-js', ) );

		return $scripts;
	}
}