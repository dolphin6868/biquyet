<?php

/**
 * @version	$Id$
 * @package	IG PageBuilder
 * @author	 InnoGears Team <support@innogears.com>
 * @copyright  Copyright (C) 2012 innogears.com. All Rights Reserved.
 * @license	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.innogears.com
 * Technical Support:  Feedback - http://www.innogears.com
 */
if ( ! class_exists( 'IG_Widget' ) ) {

	class IG_Widget extends IG_Pb_Shortcode_Element {

		public function __construct() {
			parent::__construct();
		}

		function element_config() {
			$this->config['shortcode'] = strtolower( __CLASS__ );
		}

		function element_items() {
			
		}

		function element_shortcode_full( $atts = null, $content = null ) {
			
		}

	}

}