// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.advanced_wp_columns', {
		init: function(ed, url){ 			
			var isEditMode = function(){
                if(jQuery(ed.selection.getNode()).parents('.csRow:first').length !== 0)
                {
                    return true;
                } else {
                    return false;
                }
            };
			
			ed.onClick.add(function(ed) {
				if(isEditMode() === true)
				{
					tinyMCE.activeEditor.controlManager.setActive('advanced_wp_columns', true);
				}else{   
					tinyMCE.activeEditor.controlManager.setActive('advanced_wp_columns', false);
				}
			});
		},
        createControl: function(n, cm) {
			console.log('createControl');
			switch (n) {
                case 'advanced_wp_columns':			
                    var c = cm.createButton('advanced_wp_columns', {
                        title: 'Advanced WP Columns',
                        onclick: function() {
                            tb_show('Advanced WP Columns', '../wp-content/plugins/advanced-wp-columns/assets/js/plugins/views/columns.html?TB_iframe=1&width=960');
                        }
                    });
					
                    // Return the new advanced wp columns instance
                    return c;
            }
            return null;
        }
    });
    tinymce.PluginManager.add('advanced_wp_columns', tinymce.plugins.advanced_wp_columns);
})();