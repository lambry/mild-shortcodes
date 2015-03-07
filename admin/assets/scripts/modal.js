/**
 * Handles the shortcode modal functions.
 */

( function( $ ) {

	var Shortcodes = {
		init: function() {
			this.cache();
			this.events();
			this.$links.addClass( 'is-visible' );
		},
		cache: function() {
			this.$home = $( '.home' );
			this.$section = $( '.shortcode' );
			this.$link = $( '.shortcode-link' );
			this.$links = $( '.shortcode-links' );
			this.$clone = $( '.clone' );
		},
		events: function() {
			this.$home.on( 'click', this.showLinks );
			this.$link.on( 'click', this.showSection );
			this.$clone.on( 'click', this.cloneFields );
			this.$section.on( 'submit', this.createShortcode );
		},
		showLinks: function() {
			Shortcodes.$section.removeClass( 'is-visible' );
			setTimeout(function() {
				Shortcodes.$section.hide();
				Shortcodes.$links.fadeIn( 100, function() {
					Shortcodes.$links.addClass( 'is-visible' );
				});
			}, 300);
		},
		showSection: function() {
			Shortcodes.$links.removeClass( 'is-visible' );
			var shortcode = $(this).data( 'shortcode' );
			setTimeout(function() {
				Shortcodes.$links.hide();
				$( 'form#' + shortcode ).fadeIn( 100, function() {
					$( 'form#' + shortcode ).addClass( 'is-visible' );
				});
			}, 300);
		},
		cloneFields: function() {
			$this = $(this);
			var fields = $this.parents( '.shortcode' ).find( '.fields:first-of-type' );
			fields.each(function( index, el ) {
				$(this).clone().insertBefore( $this );
			});
		},
		createShortcode: function( e ) {
			e.preventDefault();
			$this = $(this);
			// Set vars
			var ed = window.parent.tinyMCE,
				edActive = ed.activeEditor,
				code = $this.data( 'code' ),
				wrap = $this.data( 'wrap' ),
				child = $this.data( 'child'),
				shortcode = '';

			// Wrap content
			if ( wrap === 1 && child ) {
				shortcode += '[' + code + ']<br>';
			}
			// Create shortcode
			if ( child ) {
				shortcode += Shortcodes.createCodes( $this, code, child );
			} else {
				shortcode += Shortcodes.createAttributes( $this, code );
			}
			// Wrap content
			if ( wrap === 1 ) {
				shortcode += ' ' + edActive.selection.getContent() + ' [/' + code + ']';
			}
			// Insert shortcode
	        if ( ed ) {
				ed.execCommand( 'mceInsertContent', false, shortcode );
	            edActive.windowManager.close();
			}
		},
		createCodes: function( $this, code, child ) {
			var codes = '';
			// Create codes
			$this.find( '.fields' ).each( function( index, el ) {
				codes += Shortcodes.createAttributes( $(this), child );
				codes += ' [/' + child + ']<br>';
			});
			// Return shortcode
			return codes;
		},
		createAttributes: function( $this, code ) {
			var attr = '';
			// Get attributes
			$this.find( '.input, .check:checked' ).each( function( index, el ) {
				var val = $(el).val();
				if ( val ) {
					attr += ' ' + el.name + '="' + val + '"';
				}
			});
			// Return shortcode
			return '[' + code + attr + ']';
		}
	};

	Shortcodes.init();

} )( jQuery );
