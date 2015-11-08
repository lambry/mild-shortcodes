/* =Public js
----------------------------------------------- */
(function( $ ) {

    // Tabs
    var tabs = $( '.shorts-tabs' );
    if ( tabs.length > 0 ) {

        var tabNav = tabs.find( '.shorts-tab-nav li' ),
            tabPanes = $( '.shorts-tab-pane' );

        tabNav.first().addClass( 'shorts-tab-active' );
        tabPanes.hide().first().show().addClass( 'shorts-tab-active' );

        tabNav.on( 'click', function() {
            tabNav.removeClass( 'shorts-tab-active' );
            $(this).addClass( 'shorts-tab-active' );
            tabPanes.removeClass( 'shorts-tab-active' ).hide();
            $( '#' + $(this).data( 'tab' ) ).addClass( 'shorts-tab-active' ).show();
        });

    }

    // Accordion
    var accordion = $( '.shorts-accordion' );
    if ( accordion.length > 0 ) {

        accordion.on( 'click', '.shorts-accordion-title a', function(e) {
            e.preventDefault();
            $( this ).parents( '.shorts-accordion' ).find( '.shorts-accordion-content' ).slideToggle();
        });

    }

    // Inline login
    var login = $( '.shorts-login-inline' );
    if ( login.length > 0 ) {

        login.find( '.input' ).focusin( function() {
            $(this).parent( 'p' ).find( 'label' ).addClass( 'shorts-is-hidden' );
        });
        login.find( '.input' ).focusout( function() {
            if ( $(this).val() === '' ) {
                $(this).parent( 'p' ).find( 'label' ).removeClass( 'shorts-is-hidden' );
            }
        });

    }

})( jQuery );
