/* =Public js
----------------------------------------------- */
(function( $ ) {

    // Tabs
    var tabs = $( '.tabs' );
    if ( tabs.length > 0 ) {
        var tabNav = tabs.find( '.tabs-nav li' ),
            tabPanes = $( '.tab' );
        tabNav.first().addClass( 'tab-active' );
        tabPanes.hide().first().show().addClass( 'tab-active' );
        tabNav.on('click', function() {
            $this = $(this);
            var tab = $this.data( 'tab' );
            tabNav.removeClass( 'tab-active' );
            $this.addClass( 'tab-active' );
            tabPanes.removeClass( 'tab-active' ).hide();
            $( '#' + tab ).addClass( 'tab-active' ).show();
        });
    }

    // Accordian
    var accordion = $( '.accordion' );
    if ( accordion.length > 0 ) {
        accordion.on( 'click', '.accordion-title a', function(e) {
            e.preventDefault();
            $( this ).parents( '.accordion' ).find( '.accordion-content' ).slideToggle();
        });
    }

    // Inline login
    var login = $( '.login-style-inline' );
    if ( login.length > 0 ) {
        login.find( '.input' ).focusin( function() {
            $(this).parent( 'p' ).find( 'label' ).addClass( 'is-hidden' );
        });
        login.find( '.input' ).focusout( function() {
            if ( $(this).val() === '' )
                $(this).parent( 'p' ).find( 'label' ).removeClass( 'is-hidden' );
        });
    }

})( jQuery );
