(function($){
	"use strict";

	var layout_style_global = '';

	FLBuilder.registerModuleHelper(
		'tnit-blog-posts',
		{

			init: function()
		{
				var form        = $( '.fl-builder-settings' ),
				layout_style 	= form.find( 'select[name=layout_style]' ),
				post_type 		= form.find( 'select[name=post_type]' ),
				order_by 		= form.find( 'select[name=order_by]' ),
				post_bg_color 	= form.find( 'input[name=post_bg_color]' ),
				show_author 	= form.find( 'select[name=show_author]' ),
				show_date 		= form.find( 'select[name=show_date]' ),
				show_categories = form.find( 'select[name=show_categories]' );

				layout_style_global = layout_style.val();

				// Init validation events.
				this._toggleTaxFilter();
				this._selectionOrder();
				this._changePlaceholder();
				this._toggleSettingFields();

				// Validation events.
				post_type.on( 'change', $.proxy( this._toggleTaxFilter, this ) );
				order_by.on( 'change', $.proxy( this._selectionOrder, this ) );
				layout_style.on( 'change', $.proxy( this._changePlaceholder, this ) );
				post_bg_color.on( 'change', $.proxy( this._changePlaceholder, this ) );
				layout_style.on( 'change', $.proxy( this._changeValue, this ) );
				layout_style.on( 'change', $.proxy( this._toggleSettingFields, this ) );
				show_author.on( 'change', $.proxy( this._toggleSettingFields, this ) );
				show_date.on( 'change', $.proxy( this._toggleSettingFields, this ) );
				show_categories.on( 'change', $.proxy( this._toggleSettingFields, this ) );
			},

			_toggleTaxFilter: function() {
				var form  = $( '.fl-builder-settings' ),
				post_type = form.find( 'select[name=post_type]' ).val();

				form.find( '.fl-loop-builder-filter' ).hide();
				form.find( '.fl-loop-builder-' + post_type + '-filter' ).show();
			},

			_selectionOrder: function() {
				var form = $( '.fl-builder-settings' ),
				order_by = form.find( 'select[name=order_by]' ).val();

				if ( 'post__in' === order_by ) {
					form.find( '#fl-field-order' ).hide();
				} else {
					form.find( '#fl-field-order' ).show();
				}
			},

			_changePlaceholder: function() {
				var form      = $( '.fl-builder-settings' ),
				layout_style  = form.find( 'select[name=layout_style]' ).val(),
				post_bg_color = form.find( 'input[name=post_bg_color]' ).val();

				if ( '1' === layout_style ) {

					if ( '' !== post_bg_color ) {
						form.find( '#fl-field-content_padding input[name=content_padding_top]' ).attr( 'placeholder','30' );
						form.find( '#fl-field-content_padding input[name=content_padding_right]' ).attr( 'placeholder','30' );
						form.find( '#fl-field-content_padding input[name=content_padding_bottom]' ).attr( 'placeholder','30' );
						form.find( '#fl-field-content_padding input[name=content_padding_left]' ).attr( 'placeholder','30' );
					} else {
						form.find( '#fl-field-content_padding input[name=content_padding_top]' ).attr( 'placeholder','0' );
						form.find( '#fl-field-content_padding input[name=content_padding_right]' ).attr( 'placeholder','0' );
						form.find( '#fl-field-content_padding input[name=content_padding_bottom]' ).attr( 'placeholder','0' );
						form.find( '#fl-field-content_padding input[name=content_padding_left]' ).attr( 'placeholder','0' );
					}
				} else if ( '2' === layout_style ) {

					form.find( '#fl-field-title_margin_top input[name=title_margin_top]' ).attr( 'placeholder','0' );
				} else if ( '3' === layout_style ) {

					form.find( '#fl-field-title_margin_top input[name=title_margin_top]' ).attr( 'placeholder','10' );
					form.find( '#fl-field-content_padding input[name=content_padding_top]' ).attr( 'placeholder','20' );
					form.find( '#fl-field-content_padding input[name=content_padding_right]' ).attr( 'placeholder','20' );
					form.find( '#fl-field-content_padding input[name=content_padding_bottom]' ).attr( 'placeholder','20' );
					form.find( '#fl-field-content_padding input[name=content_padding_left]' ).attr( 'placeholder','20' );
				} else if ( '4' === layout_style ) {

					form.find( '#fl-field-cat_margin_bottom input[name=cat_margin_bottom]' ).attr( 'placeholder','20' );
					form.find( '#fl-field-cat_padding input[name=cat_padding_top]' ).attr( 'placeholder','6' );
					form.find( '#fl-field-cat_padding input[name=cat_padding_right]' ).attr( 'placeholder','10' );
					form.find( '#fl-field-cat_padding input[name=cat_padding_bottom]' ).attr( 'placeholder','6' );
					form.find( '#fl-field-cat_padding input[name=cat_padding_left]' ).attr( 'placeholder','10' );
					form.find( '#fl-field-title_margin_top input[name=title_margin_top]' ).attr( 'placeholder','0' );
					form.find( '#fl-field-post_padding input[name=post_padding_right]' ).attr( 'placeholder','30' );
					form.find( '#fl-field-post_padding input[name=post_padding_left]' ).attr( 'placeholder','30' );
				}
			},

			_changeValue: function() {
				var form           = $( '.fl-builder-settings' ),
				layout_style       = form.find( 'select[name=layout_style]' ).val(),
				more_link_settings = form.find( 'input[name=more_link_settings]' ).val();

				var jsonObj = JSON.parse( more_link_settings );

				layout_style_global = layout_style;

				form.find( "select[name=show_comments] option[value='0']" ).attr( "selected", true );
				form.find( "select[name=show_comments] option[value='1']" ).attr( "selected", false );

				if ( '3' === layout_style_global || '4' === layout_style_global ) {

					form.find( "select[name=show_comments] option[value='1']" ).attr( "selected", true );
					form.find( "select[name=show_comments] option[value='0']" ).attr( "selected", false );

					jsonObj.link_type = 'text';

					var jsonString = JSON.stringify( jsonObj );
					form.find( 'input[name=more_link_settings]' ).val( jsonString );

				}
			},

			_toggleSettingFields: function() {
				var form        = $( '.fl-builder-settings' ),
				layout_style    = form.find( 'select[name=layout_style]' ).val(),
				show_author 	= form.find( 'select[name=show_author]' ).val(),
				show_date 		= form.find( 'select[name=show_date]' ).val(),
				show_categories = form.find( 'select[name=show_categories]' ).val();

				if ( '3' === layout_style || '4' === layout_style ) {

					if ( show_author === true ) {
						form.find( '#fl-builder-settings-section-author' ).show();
					} else {
						form.find( '#fl-builder-settings-section-author' ).hide();
					}

					if ( show_categories === true ) {
						form.find( '#fl-builder-settings-section-categories' ).show();
					} else {
						form.find( '#fl-builder-settings-section-categories' ).hide();
					}

					if ( '3' === layout_style ) {
						if ( show_date === true ) {
							form.find( '#fl-builder-settings-section-separator' ).show();
						} else {
							form.find( '#fl-builder-settings-section-separator' ).hide();
						}
					} else if ( '4' === layout_style ) {
						if ( show_date === true ) {
							form.find( '#fl-builder-settings-section-meta_date' ).show();
						} else {
							form.find( '#fl-builder-settings-section-meta_date' ).hide();
						}
					}
				}
			},

		}
	);

	FLBuilder.registerModuleHelper(
		'tnit_more_link_form',
		{

			init: function()
		{
				var form = $( '.fl-form-field-settings' );

				form.find( "select[name=link_type] option[value='text']" ).attr( "selected", false );
				form.find( "select[name=link_type] option[value='button']" ).attr( "selected", true );

				if ( '3' === layout_style_global || '4' === layout_style_global ) {

					form.find( 'select[name=link_type]' ).val( 'text' );
					form.find( "select[name=link_type] option[value='text']" ).attr( "selected", true );
					form.find( "select[name=link_type] option[value='button']" ).attr( "selected", false );
				}
			},

		}
	);

})( jQuery );
