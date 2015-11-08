/**
 * Handles the shortcode generation.
 */

var Lambry = {};

(function( $ ) {

	Lambry.Shorts = {
		/*** Get things started ***/
		init: function( html ) {
			_this = Lambry.Shorts;
			// Setup display
			this.$wrap = $( '#shorts' );
			this.$wrap.find( '.loading' ).addClass( 'is-hidden' );
			this.$wrap.append( html );
			// Initialize libraries
			this.initSelect( this.$wrap.find( 'select' ) );
			this.$wrap.find( '.sortable' ).sortable( { placeholder : 'sort-gap' } );
			// Run functions
			this.cache();
			this.events();
			this.showLinks();
		},
		/*** Cache the needed elements ***/
		cache: function() {
			this.$home = this.$wrap.find( '.home' );
			this.$section = this.$wrap.find( '.shortcode' );
			this.$link = this.$wrap.find( '.shortcode-link' );
			this.$links = this.$wrap.find( '.shortcode-links' );
			this.$clone = this.$wrap.find( '.clone' );
		},
		/*** Cache the events ***/
		events: function() {
			this.$home.on( 'click', this.showLinks );
			this.$link.on( 'click', this.showSection );
			this.$clone.on( 'click', this.cloneFields );
			this.$section.on( 'submit', this.createShortcode );
		},
		/*** Show shortcode links ***/
		showLinks: function() {
			_this.$section.removeClass( 'is-visible' );
			setTimeout(function() {
				_this.$section.hide();
				_this.$links.fadeIn( 100, function() {
					_this.$links.addClass( 'is-visible' );
				});
			}, 300);
		},
		/*** Initilize select2 ***/
		initSelect: function( el ) {
			el.select2({
				width: '100%',
				templateResult: function( option ) {
					if ( $( option.element ).parent().hasClass( 'icon' ) ) {
		    			return $( '<span><i class="fa fa-' + option.id + '"></i> ' + option.text + '</span>' );
					} else {
						return option.text;
					}
				}
			});
		},
		/*** Show the shortcode section ***/
		showSection: function() {
			_this.$links.removeClass( 'is-visible' );
			var shortcode = $(this).data( 'shortcode' );
			setTimeout(function() {
				_this.$links.hide();
				_this.$wrap.find( '#' + shortcode ).fadeIn( 100, function() {
					_this.$wrap.find( '#' + shortcode ).addClass( 'is-visible' );
				});
			}, 300);
		},
		/*** Clone a set of fields ***/
		cloneFields: function() {
			$this = $(this);
			var parent = $this.parents( '.shortcode' ).find( '.field-wrap' ),
				clone = parent.find( '.fields:last-child' ).clone();
			// Alter and append the clone
			clone.find( 'input' ).val( '' );
			clone.find( '.select2' ).remove();
			clone.appendTo( parent );
			_this.initSelect( parent.find( 'select' ) );
		},
		/*** Create the entire shortcode ***/
		createShortcode: function( e ) {
			e.preventDefault();
			$this = _this.$wrap.find( 'form.is-visible' );
			// Set the needed variables
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
				shortcode += _this.createCodes( $this, code, child );
			} else {
				shortcode += _this.createAttributes( $this, code );
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
		/*** Create the main shortcode ***/
		createCodes: function( $this, code, child ) {
			var codes = '';
			$this.find( '.fields' ).each( function( index, el ) {
				codes += _this.createAttributes( $(this), child );
				codes += ' [/' + child + ']<br>';
			});
			return codes;
		},
		/*** Create the shortcode attributes ***/
		createAttributes: function( $this, code ) {
			var attr = '';
			$this.find( '.input, .check:checked' ).each( function( index, el ) {
				var val = $(el).val();
				if ( val ) {
					attr += ' ' + el.name + '="' + val + '"';
				}
			});
			return '[' + code + attr + ']';
		}
	};

})( jQuery );