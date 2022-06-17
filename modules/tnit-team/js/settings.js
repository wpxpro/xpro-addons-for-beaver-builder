(function($){

	FLBuilder.registerModuleHelper(
		'tnit-team',
		{

			init: function()
		{
				var form   = $( '.fl-builder-settings' ),
				team_style = form.find( 'select[name=team_style]' );

				// Init validation events.
				this._toggleBorderOptions();

				team_style.on( 'change', $.proxy( this._toggleBorderOptions, this ) );
			},

			_toggleBorderOptions: function() {
				var form   = $( '.fl-builder-settings' ),
				team_style = form.find( 'select[name=team_style]' ).val();

				if ('5' === team_style) {
					form.find( '#fl-field-team_style' ).show();
					form.find( '#fl-field-icon_border_hover_color' ).show();
				}
			},
		}
	);

})( jQuery );
