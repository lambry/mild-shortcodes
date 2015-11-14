/**
 * Handles the shortcode generation.
 */

(function( $ ) {

	Shorts = {
		/*** Get things started ***/
		Run: function() {
			this.cache();
			this.events();
			this.init();
		},
		/*** Cache elements ***/
		cache: function() {
			this.$wrap = $( '#shorts-generate' );
			this.$section = this.$wrap.find( '.shortcode' );
			this.$links = this.$wrap.find( '.shorts-links' );
		},
		/*** Cache events ***/
		events: function() {
			this.$wrap.on( 'click', '.shorts-home', this.showLinks );
			this.$wrap.on( 'click', '.shorts-link', this.showSection );
			this.$wrap.on( 'click', '.shorts-clone', this.cloneFields );
			this.$section.on( 'submit', this.createShortcode );
		},
		/*** Initialize libraries ***/
		init: function() {
			this.initMagnific();
			this.initSortable();
			this.initDroppable();
			this.initSelect( this.$wrap.find( '.shorts-select' ) );
		},
		/*** Initialize Magnific ***/
		initMagnific: function() {
			$( '.shorts-launch' ).magnificPopup( {
				closeBtnInside: true,
				mainClass: 'shorts-popup',
				items: {
					src: '#shorts-generate',
					type: 'inline',
				},
				callbacks: {
					beforeOpen: function() {  
						this.wrap.removeAttr( 'tabindex' );
					},
					open: function() {
						Shorts.showLinks();
					},
				}
			} );
		},
		/*** Initialize Sortable ***/
		initSortable: function() {
			this.$wrap.find( '.shorts-sortable' ).sortable( { 
				placeholder : 'shorts-gap',
				start: function( event, ui ) {
					$( ui.item ).parents( '.shortcode' ).find( '.shorts-remove' ).addClass( 'shorts-visible' );
				},
				stop: function( event, ui ) {
					$( ui.item ).parents( '.shortcode' ).find( '.shorts-remove' ).removeClass( 'shorts-visible' );
				}
			} );
		},
		/*** Initialize Droppable ***/
		initDroppable: function() {
			Shorts.$wrap.find( '.shorts-remove' ).droppable( {
				activeClass: 'shorts-remove-highlight',
				hoverClass: 'shorts-remove-hover',
				drop: function( event, ui ) {
					$( ui.draggable ).remove();
					$( event.target ).removeClass( 'shorts-visible' );
				}
			});
		},
		/*** Initilize select2 ***/
		initSelect: function( el ) {
			el.select2( {
				width: '100%',
				templateResult: function( option ) {
					if ( $( option.element ).parent().hasClass( 'icon' ) ) {
		    			return $( '<span><i class="fa fa-' + option.id + '"></i> ' + option.text + '</span>' );
					} else {
						return option.text;
					}
				}
			} );
		},
		/*** Show shortcode links ***/
		showLinks: function() {
			Shorts.$section.removeClass( 'shorts-visible' );
			setTimeout( function() {
				Shorts.$section.hide();
				Shorts.$links.fadeIn( 100, function() {
					Shorts.$links.addClass( 'shorts-visible' );
				} );
			}, 200);
		},
		/*** Show the shortcode section ***/
		showSection: function() {
			Shorts.$links.removeClass( 'shorts-visible' );
			var shortcode = $(this).data( 'shortcode' );
			setTimeout(function() {
				Shorts.$links.hide();
				Shorts.$wrap.find( '#' + shortcode ).fadeIn( 100, function() {
					Shorts.$wrap.find( '#' + shortcode ).addClass( 'shorts-visible' );
				} );
			}, 200);
		},
		/*** Clone a set of fields ***/
		cloneFields: function() {
			$this = $(this);
			var parent = $this.parents( '.shortcode' ).find( '.shorts-field-wrap' ),
				clone = parent.find( '.shorts-fields:last-child' ).clone();
			// Alter and append the clone
			clone.find( '.shorts-input' ).val( '' );
			clone.find( '.select2' ).remove();
			clone.appendTo( parent );
			Shorts.initSelect( parent.find( '.shorts-select' ) );
		},
		/*** Create the entire shortcode ***/
		createShortcode: function( e ) {
			e.preventDefault();
			$this = Shorts.$wrap.find( 'form.shorts-visible' );
			// Set the needed variables
			var editor = window.parent.tinyMCE,
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
				shortcode += Shorts.createCodes( $this, code, child );
			} else {
				shortcode += Shorts.createAttributes( $this, code );
			}
			// Wrap content
			if ( wrap === 1 ) {
				shortcode += ' ' + editor.activeEditor.selection.getContent() + ' [/' + code + ']';
			}
			// Insert shortcode
	        if ( editor ) {
				editor.execCommand( 'mceInsertContent', false, shortcode );
	            $.magnificPopup.close();
			}
		},
		/*** Create the main shortcode ***/
		createCodes: function( $this, code, child ) {
			var codes = '';
			$this.find( '.shorts-fields' ).each( function( index, el ) {
				codes += Shorts.createAttributes( $(this), child );
				codes += ' [/' + child + ']<br>';
			});
			return codes;
		},
		/*** Create the shortcode attributes ***/
		createAttributes: function( $this, code ) {
			var attr = '';
			$this.find( '.shorts-input, .shorts-select, .shorts-checkbox:checked' ).each( function( index, element ) {
				var val = $(element).val();
				if ( val ) {
					attr += ' ' + element.name + '="' + val + '"';
				}
			});
			return '[' + code + attr + ']';
		}
	};

	Shorts.Run();

})( jQuery );
