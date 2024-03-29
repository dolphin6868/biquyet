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
if ( ! class_exists( 'IG_Heading' ) ) {

	class IG_Heading extends IG_Pb_Shortcode_Element {

		public function __construct() {
			parent::__construct();
		}

		/**
		 * DEFINE configuration information of shortcode
		 */
		public function element_config() {
			$this->config['shortcode'] = strtolower( __CLASS__ );
			$this->config['name']      = __( 'Heading', IGPBL );
			$this->config['cat']       = __( 'Typography', IGPBL );
			$this->config['icon']      = 'icon-paragraph-text';
		}

		/**
		 * DEFINE setting options of shortcode
		 */
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
					array(
						'name'    => __( 'Tag', IGPBL ),
						'id'      => 'tag',
						'type'    => 'select',
						'std'     => 'h1',
						'options' => array( 'h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3', 'h4' => 'H4', 'h5' => 'H5', 'h6' => 'H6' ),
						'tooltip' => __( 'Support tags: H1, H2, H3, H4, H5, H6', IGPBL )
					),
					array(
						'name'    => __( 'Text', IGPBL ),
						'id'      => 'text',
						'type'    => 'text_field',
						'role'    => 'content',
						'class'   => 'jsn-input-xxlarge-fluid',
						'std'     => __( 'Your heading text', IGPBL ),
						'tooltip' => __( 'Insert your heading text', IGPBL )
					),
				),
				'styling' => array(
					array(
						'type' => 'preview',
					),
					array(
						'name'    => __( 'Alignment', IGPBL ),
						'id'      => 'text_align',
						'type'    => 'select',
						'std'     => IG_Pb_Helper_Type::get_first_option( IG_Pb_Helper_Type::get_text_align() ),
						'options' => IG_Pb_Helper_Type::get_text_align(),
						'tooltip' => __( 'Setting position: right, left, center, inherit parent style', IGPBL )
					),
					array(
						'name'       => __( 'Font', IGPBL ),
						'id'         => 'font',
						'type'       => 'select',
						'std'        => 'inherit',
						'options'    => array( 'inherit' => __( 'Inherit', IGPBL ), 'custom' => __( 'Custom', IGPBL ) ),
						'has_depend' => '1',
						'class'      => 'input-medium',
						'tooltip'    => __( 'Select font type', IGPBL )
					),
					array(
						'name' => __( 'Font Face', IGPBL ),
						'id'   => 'font_family',
						'type' => array(
							array(
								'id'           => 'font_face_type',
								'type'         => 'jsn_select_font_type',
								'class'        => 'input-medium',
								'std'          => 'standard fonts',
								'options'      => IG_Pb_Helper_Type::get_fonts(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'font_face_value',
								'type'         => 'jsn_select_font_value',
								'class'        => 'input-medium',
								'std'          => 'Verdana',
								'options'      => '',
								'parent_class' => 'combo-item',
							),
						),
						'dependency'      => array( 'font', '=', 'custom' ),
						'container_class' => 'combo-group',
                        'tooltip'         => __( 'Select font', IGPBL ),
					),
					array(
						'name' => __( 'Font Attributes', IGPBL ),
						'type' => array(
							array(
								'id'           => 'font_size_value_',
								'type'         => 'text_append',
								'type_input'   => 'number',
								'class'        => 'input-mini',
								'std'          => '',
								'append'       => 'px',
								'validate'     => 'number',
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'font_style',
								'type'         => 'select',
								'class'        => 'input-medium',
								'std'          => 'bold',
								'options'      => IG_Pb_Helper_Type::get_font_styles(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'color',
								'type'         => 'color_picker',
								'std'          => '#000000',
								'parent_class' => 'combo-item',
							),
						),
						'dependency'      => array( 'font', '=', 'custom' ),
						'container_class' => 'combo-group',
                        'tooltip'         => __( 'Set font style', IGPBL ),
					),
					array(
						'name' => __( 'Bottom Border', IGPBL ),
						'type' => array(
							array(
								'id'           => 'border_bottom_width_value_',
								'type'         => 'text_append',
								'type_input'   => 'number',
								'class'        => 'input-mini',
								'std'          => '',
								'append'       => 'px',
								'validate'     => 'number',
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'border_bottom_style',
								'type'         => 'select',
								'class'        => 'input-medium',
								'std'          => 'solid',
								'options'      => IG_Pb_Helper_Type::get_border_styles(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'border_bottom_color',
								'type'         => 'color_picker',
								'std'          => '',
								'parent_class' => 'combo-item',
							),
						),
						'container_class' => 'combo-group',
                        'tooltip'         => __( 'Set bottom border style', IGPBL ),
					),
					array(
						'name' => __( 'Bottom Padding', IGPBL ),
						'type' => array(
							array(
								'id'         => 'padding_bottom_value_',
								'type'       => 'text_append',
								'type_input' => 'number',
								'class'      => 'input-mini',
								'std'        => '',
								'append'     => 'px',
								'validate'   => 'number',
							),
						),
						'tooltip' => __( 'Set bottom padding style', IGPBL )
					),
				)
			);
		}

		/**
		 * DEFINE shortcode content
		 *
		 * @param type $atts
		 * @param type $content
		 */
		public function element_shortcode_full( $atts = null, $content = null ) {
			$script = '';
			if ( ! empty( $atts ) AND is_array( $atts ) ) {
				if ( ! isset( $atts['border_bottom_width_value_'] ) ) {
					$atts['border_bottom_width_value_'] = '';
					$atts['border_bottom_style']        = '';
					$atts['border_bottom_color']        = '';
				}
				if ( ! isset( $atts['padding_bottom_value_'] ) ) {
					$atts['padding_bottom_value_']      = '';
				}
				if ( ! isset( $attrs['font_size_value_'] ) ) {
					$attrs['font_size_value_']          = '';
				}
			}
			// reload shortcode params: because we get Heading Text from "text" param
			IG_Pb_Helper_Shortcode::generate_shortcode_params( $this->items, NULL, $atts );

			$arr_params = ( shortcode_atts( $this->config['params'], $atts ) );

			$style = array();
			$exclude_params = array( 'tag', 'text', 'preview' );
			$stylesheet = $font_style = '';

			// Override custom style
			if ( ! empty( $arr_params ) AND is_array( $arr_params ) ) {
				if ( $arr_params['font'] == 'inherit' || $arr_params['font'] == 'Inherit' ) {
					unset( $arr_params['font'] );
					unset( $arr_params['font_face_type'] );
					unset( $arr_params['font_face_value'] );
					unset( $arr_params['font_size_value_'] );
					unset( $arr_params['font_style'] );
					unset( $arr_params['color'] );
				}
				if ( isset( $arr_params['font'] ) && $arr_params['font'] == 'custom' ) {
					unset( $arr_params['font'] );
					if ( isset( $arr_params['font_style'] ) && strtolower( $arr_params['font_style'] ) == 'bold' ) {
						$arr_params['font_weight'] = '700';
						unset( $arr_params['font_style'] );
					}
					if ( isset( $arr_params['font_style'] ) && strtolower( $arr_params['font_style'] ) == 'normal' ) {
						$arr_params['font_weight'] = 'normal';
						unset( $arr_params['font_style'] );
					}
				}
				if ( isset( $arr_params['font_size_value_'] ) && $arr_params['font_size_value_'] == '' ) {
					unset( $arr_params['font_size_value_'] );
				}

				if ( $arr_params['border_bottom_width_value_'] == '' ) {
					unset( $arr_params['border_bottom_width_value_'] );
					unset( $arr_params['border_bottom_style'] );
					unset( $arr_params['border_bottom_color'] );
				}
				if ( $arr_params['padding_bottom_value_'] == '' ) {
					unset( $arr_params['padding_bottom_value_'] );
				}
				if ( $arr_params['text_align'] == 'inherit' || $arr_params['text_align'] == 'Inherit' ) {
					unset( $arr_params['text_align'] );
				}
			}

			foreach ( $arr_params as $key => $value ) {
				if ( $value != '' ) {
					if ( $key == 'font_face_type' ) {
						if ( $value == __( 'Standard fonts', IGPBL ) || $value == 'standard fonts' ) {
							$font_style = 'font-family:' . $arr_params['font_face_value'];
						} else if ( $value == __( 'Google fonts', IGPBL ) || $value == 'google fonts' ) {
							$script = IG_Pb_Helper_Functions::add_google_font_link_tag( $arr_params['font_face_value'] );
							$font_style = 'font-family:' . $arr_params['font_face_value'];
						}
					} else if ( $key != 'font_face_value' ) {
						$key = IG_Pb_Helper_Functions::remove_tag( $key );
						if ( ! in_array( $key, $exclude_params ) ) {
							switch ( $key ) {
								case 'border_bottom_width_value_':
									$style[$key] = 'border-bottom-width:' . $value . 'px';
									break;
								case 'text_align':
									$style[$key] = 'text-align:' . $value;
									break;
								case 'font_size_value_':
									$style[$key] = 'font-size:' . $value . 'px';
									break;
								case 'font_style':
									$style[$key] = 'font-style:' . $value;
									break;
								case 'border_bottom_style':
									$style[$key] = 'border-bottom-style:' . $value;
									break;
								case 'border_bottom_color':
									$style[$key] = 'border-bottom-color:' . $value;
									break;
								case 'padding_bottom_value_':
									$style[$key] = 'padding-bottom:' . $value . 'px';
									break;
								case 'font_weight':
									$style[$key] = 'font-weight:' . $value;
									break;
								case 'color':
									$style[$key] = 'color:' . $value;
									break;
							}
						}
					}
				}
			}
			$style = implode( ';', $style );
			$style .= ';' . $font_style;
			$style = ( $style == ';' ) ? '' : $style;
			$true_element = "<{$arr_params['tag']} style='{$style}'>" . IG_Pb_Helper_Shortcode::remove_autop( $content ) . "</{$arr_params['tag']}>";
			$true_element .= '';

			return $this->element_wrapper( $script . $stylesheet . $true_element, $arr_params );
		}

	}

}
