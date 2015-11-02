/* =Public js
----------------------------------------------- */
(function( $ ) {

    // Tabs
    var tabs = $( '.ls-tabs' );
    if ( tabs.length > 0 ) {

        var tabNav = tabs.find( '.ls-tab-nav li' ),
            tabPanes = $( '.ls-tab-pane' );

        tabNav.first().addClass( 'ls-tab-active' );
        tabPanes.hide().first().show().addClass( 'ls-tab-active' );

        tabNav.on( 'click', function() {
            tabNav.removeClass( 'ls-tab-active' );
            $(this).addClass( 'ls-tab-active' );
            tabPanes.removeClass( 'ls-tab-active' ).hide();
            $( '#' + $(this).data( 'tab' ) ).addClass( 'ls-tab-active' ).show();
        });

    }

    // Accordion
    var accordion = $( '.ls-accordion' );
    if ( accordion.length > 0 ) {

        accordion.on( 'click', '.ls-accordion-title a', function(e) {
            e.preventDefault();
            $( this ).parents( '.ls-accordion' ).find( '.ls-accordion-content' ).slideToggle();
        });

    }

    // Inline login
    var login = $( '.ls-login-inline' );
    if ( login.length > 0 ) {

        login.find( '.input' ).focusin( function() {
            $(this).parent( 'p' ).find( 'label' ).addClass( 'ls-is-hidden' );
        });
        login.find( '.input' ).focusout( function() {
            if ( $(this).val() === '' ) {
                $(this).parent( 'p' ).find( 'label' ).removeClass( 'ls-is-hidden' );
            }
        });

    }

})( jQuery );
