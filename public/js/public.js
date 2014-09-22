/* =Public js
----------------------------------------------- */
(function( $ ) {

    // Accordian
    var accordion = $( '.accordion' );
    if ( accordion.length > 0 ) {
        accordion.on( 'click', '.accordion-title a', function(e) {
            e.preventDefault();
            var hash = $( this ).attr( 'href' );
            $( this ).parents( '.accordion' ).find( '.accordion-content' ).slideToggle();
            if( history.pushState ) {
                history.pushState( null, null, hash );
            }
            else {
                location.hash = hash;
            }
        });
        var urlHash = window.location.hash;
        if ( urlHash ) {
            $( urlHash ).find( 'a' ).trigger( 'click' );
        }
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
