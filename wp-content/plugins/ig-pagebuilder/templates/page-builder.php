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
wp_nonce_field( 'ig_builder', IGNONCE . '_builder' );
?>
<!-- Buttons bar -->
<div class="jsn-form-bar">
	<div id="status-switcher" class="btn-group" data-toggle="buttons-radio">
		<button type="button" class="switchmode-button btn active" id="status-on" data-title="<?php _e( 'Active Page Builder', IGPBL ) ?>"><?php _e( 'On', IGPBL ) ?></button>
		<button type="button" class="switchmode-button btn" id="status-off" data-title="<?php _e( 'Deactivate Page Builder', IGPBL ) ?>"><?php _e( 'Off', IGPBL ) ?></button>
	</div>
	<div id="mode-switcher" class="btn-group" data-toggle="buttons-radio">
		<button type="button" class="switchmode-button btn active" id="switchmode-compact"><?php _e( 'Compact', IGPBL ) ?></button>
		<button type="button" class="switchmode-button btn" id="switchmode-full"><?php _e( 'Full', IGPBL ) ?></button>
	</div>

	<!-- Page Templates -->
    <div class="pull-right" id="top-btn-actions">
        <div class="pull-left" id="page-custom-css">
            <button class="btn" onclick="return false;"><?php _e( 'Add custom CSS', IGPBL ) ?></button>
        </div>
    	<div class="btn-group pull-left" id="page-template">
    		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			<?php _e( 'Page template', IGPBL ) ?>
			<span class="caret"></span>
			</a>
			<ul class="dropdown-menu pull-right">
		    	<li><a href="#" id="save-as-new"><?php _e( 'Save as new template', IGPBL ); ?></a></li>
		    	<li><a  id="apply-page" href="#"><?php _e( 'Load template', IGPBL ); ?></a></li>
		    </ul>			
	    </div>
    </div>
    <!-- Save as new template modal -->
    <div id="save-as-new-dialog" class="modal" >
    	<div class="modal-header ui-dialog-title">
		<h3><?php _e( 'Save as new template', IGPBL ); ?></h3>
		</div>
    	<div class="modal-body">
	    	<div >
				<label class="control-label" for="template-name"><?php _e( 'Template name:' );?></label>
				<div class="controls">
					<input type="text" id="template-name" class="input">	
				</div>
	    	</div>
    	</div>
    	<div class="modal-footer">
			<a href="#" class="btn btn-primary template-save"><?php _e( 'Save', IGPBL ); ?></a>
			<a href="#" class="btn template-cancel"><?php _e( 'Cancel', IGPBL ); ?></a>
		</div>
    </div>
    <!-- END Save as new template modal -->
</div>

<!-- IG PageBuilder elements -->
<div class="jsn-section-content jsn-style-light" id="form-design-content">
	<div id="ig-pbd-loading" class="text-center"><i class="jsn-icon32 jsn-icon-loading"></i></div>
	<div id="form-container" class="jsn-layout">
<?php
global $post;
$pagebuilder_content = get_post_meta( $post->ID, '_ig_page_builder_content', true );
if ( ! empty( $pagebuilder_content ) ) {
	$builder = new IG_Pb_Helper_Shortcode();
	echo balanceTags( $builder->do_shortcode_admin( $pagebuilder_content ) );
}
?>

		<a href="javascript:void(0);" id="jsn-add-container" class="jsn-add-more"><i class="icon-plus"></i><?php _e( 'Add Row', IGPBL ) ?></a>
		<input type="hidden" id="ig-select-media" value="" />
		<input type="hidden" id="ig-tinymce-change" value="0" />
	</div>
	<div id="deactivate-msg" class="jsn-section-empty hidden">
		<p class="jsn-bglabel">
			<span class="jsn-icon64 jsn-icon-remove"></span>
			<?php _e( 'PageBuilder for this page is currently off.', IGPBL ); ?>
		</p>
		<p class="jsn-bglabel">
			<a href="javascript:void(0)" class="btn btn-success" id="status-on-link"><?php _e( 'Turn PageBuilder on', IGPBL )?></a>
		</p>	
		
	</div>
</div>

<div id="branding">
	<div class="pull-left">
		<a href="http://www.innogears.com/wordpress-plugins/ig-pagebuilder-on-wporg.html"><?php _e( 'PageBuilder', IGPBL ); ?></a> <?php _e( 'by', IGPBL )?> <a href="http://www.innogears.com" target="_blank">InnoGears.com</a>
	</div>
	<div class="pull-right">
		<a href="http://www.innogears.com/wordpress-plugins/ig-pagebuilder-docs.html"><?php _e( 'Documentation', IGPBL ); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="http://www.innogears.com/wordpress-plugins/ig-pagebuilder-support.html" target="_blank"><?php _e( 'Support', IGPBL ); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="http://www.innogears.com/wordpress-plugins/ig-pagebuilder-review.html" target="_blank"><?php _e( 'Review', IGPBL ); ?></a>
	</div>
	<div class="clearbreak"></div>
</div>
<?php
include 'select-elements.php';
include 'layout/template.php';

global $post;
?>
<div id="ig-pb-css-value">
    <input type="hidden" name="ig_pb_post_id" value="<?php echo esc_attr( isset ( $post->ID ) ? $post->ID : '' ); ?>">
</div>

<!--[if IE]>
<style>
    #jsn-quicksearch-field{
        height: 28px;
    }
</style>
<![endif]-->