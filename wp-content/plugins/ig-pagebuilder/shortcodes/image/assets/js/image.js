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

/**
 * Custom script for Image element
 */
(function ($) {

	"use strict";

	$.IG_ImageElement	= $.IG_ImageElement || {};

	$.IG_ImageElement 	= function () {
		// Build Image Size
    	$('#param-image_file').on('change', function () {
    		var selectValue = $(this).val();
    		if (selectValue) {
    			$('#modalOptions .image_loader').show();
    			$.post(
		            Ig_Ajax.ajaxurl,
		            {
		                action			: 'get_json_custom',
		                custom_type		: 'image_size',
		                image_url		: selectValue,
		                ig_nonce_check	: Ig_Ajax._nonce
		            },
		            function (data) {
		            	var response = JSON.parse(data);
		            	if ( response.sizes ) {
		            		var selectedValue 	= $('#param-image_image_size').val();
		            		var currentValue	= $('#param-image_size').val();
		            		var html_select 	= '<select id="select_image_image_size">';
		            		var current_select 	= '<select id="select_image_size">';
		            		var current_length	= 0;
		            		$.each(response.sizes, function (key, value) {
		            			var selected 			= '';
		            			var current_selected 	= '';

		            			if ( currentValue != '' ) {
			            			if ( currentValue == key.toLowerCase() ) {
			            				current_selected 	= 'selected="selected"';
			            				current_length		= value.total_size;
			            			}

			            			current_select 	+= '<option value="' + key.toLowerCase() + '" ' + current_selected + ' >' + key + ' – ' + value.width + ' &times; ' + value.height + '</option>';
		            			} else {
		            				current_select 	+= '<option value="' + key.toLowerCase() + '" ' + current_selected + ' >' + key + ' – ' + value.width + ' &times; ' + value.height + '</option>';
		            			}

		            			if ( currentValue != 'full' ) {
		            				if ( selectedValue == key.toLowerCase() ) {
			            				selected 			= 'selected="selected"';
			            			}

			            			if ( current_length != 0 && value.total_size > current_length )
			            				html_select 	+= '<option value="' + key.toLowerCase() + '" ' + selected + ' >' + key + ' – ' + value.width + ' &times; ' + value.height + '</option>';
		            			} else {
		            				html_select 	= '<select id="select_image_image_size"><option value="" >'+Ig_Translate.noneTxt+'</option>';
		            			}

		            		});
		            		html_select += '</select>';
		            		current_select += '</select>';
		            		$('#param-image_size_wrapper').html(current_select);
		            		$('#param-image_image_size_wrapper').html(html_select);
		            		$('#select_image_image_size').on('change', function () {
		                		$('#param-image_image_size').val($(this).val());
		                	});
		            		$('#select_image_size').on('change', function () {
		                		$('#param-image_size').val($(this).val());
		                		$('#param-image_file').trigger('change');
		                	});
		                	$('#select_image_image_size').trigger('change');
		            	}
	            		$('#modalOptions .image_loader').hide();
		            }
		        );
    		} else {
    			$('#param-image_size_wrapper').html('<select id="select_image_size"><option value="" >'+Ig_Translate.noneTxt+'</option></select>');
        		$('#param-image_image_size_wrapper').html('<select id="select_image_image_size"><option value="" >'+Ig_Translate.noneTxt+'</option></select>');
    		}
    	});

    	$('#param-image_file').trigger('change');
	}

	$.IG_ImageElement.setImageSize	= function (json_obj) {
		$('#param-image_size').val(json_obj);
	}

	$(document).ready(function () {
		$.IG_ImageElement();
	});

})(jQuery)