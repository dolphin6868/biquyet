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
if ( ! class_exists( 'IG_Text' ) ) {

	class IG_Text extends IG_Pb_Shortcode_Element {

		public function __construct() {
			parent::__construct();
		}

		function element_config() {
			$this->config['shortcode'] = strtolower( __CLASS__ );
			$this->config['name']      = __( 'Text', IGPBL );
			$this->config['cat']       = __( 'Typography', IGPBL );
			$this->config['icon']      = 'icon-paragraph-text';

			$this->config['exception'] = array(
				'default_content' => __( 'Text', IGPBL ),
				'require_js'       => array( 'ig-colorpicker.js' ),
			);
		}

		/**
		 * setting option of element on modal box
		 */
		function element_items() {
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
						'name' => __( 'Text Content', IGPBL ),
						'desc' => __( 'Enter some content for this textblock', IGPBL ),
						'id'   => 'text',
						'type' => 'tiny_mce',
						'role' => 'content',
						'std'  => IG_Pb_Helper_Type::lorem_text(),
						'rows' => 15,
                        'tooltip' => __( 'Set content of element', IGPBL ),
					),
				),
				'styling' => array(
					array(
						'type' => 'preview',
					),
					array(
						'name'       => __( 'Enable Dropcap', IGPBL ),
						'id'         => 'enable_dropcap',
						'type'       => 'radio',
						'std'        => 'no',
						'options'    => array( 'yes' => __( 'Yes', IGPBL ), 'no' => __( 'No', IGPBL ) ),
						'tooltip'    => __( 'Enable Dropcap', IGPBL ),
						'has_depend' => '1',
					),
					array(
						'name' => __( 'Font Face', IGPBL ),
						'id'   => 'dropcap_font_family',
						'type' => array(
							array(
								'id'           => 'dropcap_font_face_type',
								'type'         => 'jsn_select_font_type',
								'class'        => 'input-medium',
								'std'          => 'standard fonts',
								'options'      => IG_Pb_Helper_Type::get_fonts(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'dropcap_font_face_value',
								'type'         => 'jsn_select_font_value',
								'class'        => 'input-medium',
								'std'          => 'Verdana',
								'options'      => '',
								'parent_class' => 'combo-item',
							),
						),
						'dependency'      => array( 'enable_dropcap', '=', 'yes' ),
						'tooltip'         => __( 'Set Font Face', IGPBL ),
						'container_class' => 'combo-group',
					),
					array(
						'name' => __( 'Font Attributes', IGPBL ),
						'type' => array(
							array(
								'id'           => 'dropcap_font_size',
								'type'         => 'text_append',
								'type_input'   => 'number',
								'class'        => 'input-mini',
								'std'          => '64',
								'append'       => 'px',
								'validate'     => 'number',
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'dropcap_font_style',
								'type'         => 'select',
								'class'        => 'input-medium',
								'std'          => 'bold',
								'options'      => IG_Pb_Helper_Type::get_font_styles(),
								'parent_class' => 'combo-item',
							),
							array(
								'id'           => 'dropcap_font_color',
								'type'         => 'color_picker',
								'std'          => '#000000',
								'parent_class' => 'combo-item',
							),
						),
						'dependency'      => array( 'enable_dropcap', '=', 'yes' ),
						'tooltip'         => __( 'Set Font Attribute', IGPBL ),
						'container_class' => 'combo-group',
					),
				)
			);
		}

		/**
		 * define shortcode structure of element
		 */
		function element_shortcode_full( $atts = null, $content = null ) {
			$arr_params = shortcode_atts( $this->config['params'], $atts );
			extract( $arr_params );
			$script = $html_element = '';
			if ( isset($enable_dropcap ) && $enable_dropcap == 'yes' ) {
				if ( $content ) {
					$styles = array();
					if ( $dropcap_font_face_type == 'google fonts' AND $dropcap_font_face_value != '' ) {
                        $script .= IG_Pb_Helper_Functions::add_google_font_link_tag( $dropcap_font_face_value );
						$styles[] = 'font-family:' . $dropcap_font_face_value;
					} elseif ( $dropcap_font_face_type == 'standard fonts' AND $dropcap_font_face_value ) {
						$styles[] = 'font-family:' . $dropcap_font_face_value;
					}

					if ( intval( $dropcap_font_size ) > 0 ) {
						$styles[] = 'font-size:' . intval( $dropcap_font_size ) . 'px';
						$styles[] = 'line-height:' . intval( $dropcap_font_size ) . 'px';
					}
					switch ( $dropcap_font_style ) {
						case 'bold':
							$styles[] = 'font-weight:700';
							break;
						case 'italic':
							$styles[] = 'font-style:italic';
							break;
						case 'normal':
							$styles[] = 'font-weight:normal';
							break;
					}

					if ( strpos( $dropcap_font_color, '#' ) !== false ) {
						$styles[] = 'color:' . $dropcap_font_color;
					}

					if ( count( $styles ) ) {
						$html_element .= '<style type="text/css">';
						$html_element .= 'div.ig_text p.dropcap:first-letter { float:left;';
						$html_element .= implode( ';', $styles );
						$html_element .= '}';
						$html_element .= '</style>';
					}

					$html_element .= "<p class='dropcap'>{$content}</p>";
				}
			} else {
				$html_element .= '<p>' . $content . '</p>';
			}
			$html  = '<div class="ig_text">';
			$html .= $script;
			$html .= $html_element;
			$html .= '</div>';

			return $this->element_wrapper( $html, $arr_params );
		}

	}

}