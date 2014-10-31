/**
 * Adds shortcodes button to editor.
 */

( function( $ ) {

    tinymce.create('tinymce.plugins.shortcodes', {
        
        /**
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {

            // Add shortcodes button
            ed.addButton('m_shortcodes', {
                title : 'Insert shortcodes',
                onclick : function() {
                    ed.windowManager.open({
                        title: 'Shortcode Generator',
                        url: url + '/editor.php',
                        width: 600,
                        height: 475,
                        inline: true
                    });
                }
            });

        },

        /**
         * Returns information about the plugin as a name/value array.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Mild Shortcodes',
                version : '0.1.0'
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('mce_editor_shortcodes', tinymce.plugins.shortcodes);

} )( jQuery );