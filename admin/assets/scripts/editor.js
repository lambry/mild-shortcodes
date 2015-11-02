/**
 * Adds shortcodes button to editor.
 */

( function( $ ) {

    tinymce.create('tinymce.plugins.lambry_shorts', {
        
        /**
         * @param {tinymce.Editor} ed Editor instance.
         * @param {string} url Absolute URL to the plugin.
         */
        init : function(ed, url) {

            // Add shortcodes button
            ed.addButton( 'lambry_shorts', {
                title : 'Insert Shortcode',
                onclick : function() {

                    ed.windowManager.open({
                        title: 'Shortcode Generator',
                        width: 600,
                        height: 475,
                        inline: true,
                        body: [{
                            type: 'container',
                            html: '<div id="lambry-shorts"><span class="ls-loading"></span></div>'
                        }],
                        buttons: [{
                            text: 'Insert Shortcode',
                            onclick: function( e ) {
                                Lambry.Shorts.createShortcode( e );
                            },
                        }]
                    });

                    var shortsHTML = $.post(ajaxurl, { action: 'lambry_shorts' }, function( html ) {
                        Lambry.Shorts.init( html );
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
                longname : 'Shorts',
                version : '0.2.0'
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'lambry_shorts', tinymce.plugins.lambry_shorts );

} )( jQuery );