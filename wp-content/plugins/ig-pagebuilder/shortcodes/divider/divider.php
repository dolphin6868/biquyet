<?php
/**
 * @version    $Id$
 * @package    IG PageBuilder
 * @author     InnoGears Team <support@innogears.com>
 * @copyright  Copyright (C) 2012 innogears.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.innogears.com
 * Technical Support:  Feedback - http://www.innogears.com
 */
if ( ! class_exists( 'IG_Divider' ) ) {

	class IG_Divider extends IG_Pb_Shortcode_Element {

		public function __construct() {
			parent::__construct();
		}

		public function element_config() {
			$this->config['shortcode'] = strtolower( __CLASS__ );
			$this->config['name']      = __( 'Divider', IGPBL );
			$this->config['cat']       = __( 'Extra', IGPBL );
			$this->config['icon']      = 'icon-paragraph-text';
		}

		public function element_items() {
			$this->items = array(
				'content' => array(
					array(
						'name'    => __( 'Element Title', IGPBL ),
						'id'      => 'el_title',
						'type'    => 'text_field',
						'class'   => 'jsn-input-xxlarge-fluid',
						'std'     => __( '', IGPBL ),
						'role'    => 'title',
						'tooltip' => __( 'Set title for current element for identifying easily', IGPBL )
					),
				),
				'styling' => array(
					array(
						'type' => 'preview',
					),
					array(
						'name' => __( 'Border', IGPBL ),
						'type' => array(
							array(
								'id'           => 'div_border_width',
								'type'         => 'text_append',
								'type_input'   => 'number',
								'class'        => 'input-mini',
								'std'          => '2',
								'append'       => 'px',
								'validate'     => 'number',
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'div_border_style',
								'type'         => 'select',
								'class'        => 'input-medium',
								'std'          => 'solid',
								'options'      => IG_Pb_Helper_Type::get_border_styles(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'div_border_color',
								'type'         => 'color_picker',
								'std'          => '#E0DEDE',
								'parent_class' => 'combo-item',
							),
						),
						'tooltip'         => __( 'Set border style', IGPBL ),
						'container_class' => 'combo-group',
					),
				)
			);
		}

		public function element_shortcode_full( $atts = null, $content = null ) {
			$arr_params = shortcode_atts( $this->config['params'], $atts );
			extract( $arr_params );
			$styles = array();
			if ( $div_border_width ) {
				$styles[] = 'border-bottom-width:' . intval( $div_border_width ) . 'px';
			}
			if ( $div_border_style ) {
				$styles[] = 'border-bottom-style:' . $div_border_style;
			}
			if ( $div_border_color ) {
				$styles[] = 'border-bottom-color:' . urldecode( $div_border_color );
			}
			if ( $div_margin_top ) {
				$styles[] = 'margin-top:' . intval( $div_margin_top ) . 'px';
			}
			if ( $div_margin_bottom ) {
				$styles[] = 'margin-bottom:' . intval( $div_margin_bottom ) . 'px';
			}
			if ( count( $styles ) > 0 ) {
				$html_element = '<div style="' . implode( ';', $styles ) . '"></div>';
			} else {
				$html_element = '';
			}
			return $this->element_wrapper( $html_element, $arr_params );
		}

	}

}