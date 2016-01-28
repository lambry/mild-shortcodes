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
            var _this = $(this);
            tabNav.removeClass( 'shorts-tab-active' );
            _this.addClass( 'shorts-tab-active' );
            tabPanes.removeClass( 'shorts-tab-active' ).hide();
            $( '#' + _this.data( 'tab' ) ).addClass( 'shorts-tab-active' ).show();
        });

    }

    // Accordion
    var accordion = $( '.shorts-accordion' );
    if ( accordion.length > 0 ) {

        accordion.on( 'click', '.shorts-accordion-title a', function(e) {
            e.preventDefault();
            var _this = $(this);
            _this.find( '.shorts-accordion-toggle' ).toggleClass( 'fa-plus fa-minus' );
            _this.parents( '.shorts-accordion' ).find( '.shorts-accordion-content' ).slideToggle();
        });

    }

    // Popup
    var popup = $( '.shorts-popup' );
    if ( popup.length > 0 ) {

        popup.magnificPopup( {
            delegate: '.shorts-popup-title a',
            type: 'inline'
        } );

        $.each( popup, function() {
            var _this = $(this),
                id = _this.data( 'id' ) || 'false';
            if ( document.cookie.indexOf( 'shorts-' + id ) !== -1 ) {
                _this.removeClass( 'onload-on' );
            }
            if ( _this.hasClass( 'onload-on' ) ) {
                _this.find( '.shorts-popup-title a' ).trigger( 'click' );
                if ( _this.hasClass( 'once-on' ) ) {
                    document.cookie = 'shorts-' + id + '=true;';
                }
            }
        });

    }

    // Inline login
    var login = $( '.shorts-login-inline' );
    if ( login.length > 0 ) {

        login.find( '.input' ).focusin( function() {
            $(this).parent( 'p' ).find( 'label' ).addClass( 'shorts-is-hidden' );
        });
        login.find( '.input' ).focusout( function() {
            var _this = $(this);
            if ( _this.val() === '' ) {
                _this.parent( 'p' ).find( 'label' ).removeClass( 'shorts-is-hidden' );
            }
        });

    }

})( jQuery );
