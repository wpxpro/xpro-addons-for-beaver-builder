(function($) {
	//"use strict";

	FLBuilderPostGrid = function(settings)
	{
		this.settings  = settings;
		this.nodeClass = '.fl-node-' + settings.id;

		this.wrapperClass = this.nodeClass + ' .xpro-grid';
		this.postClass    = this.wrapperClass + ' .xpro-item';

		if (this._hasPosts()) {
			this._initLayout();
			this._initInfiniteScroll();
		}
	};

	FLBuilderPostGrid.prototype = {

		settings        : {},
		nodeClass       : '',
		wrapperClass    : '',
		postClass       : '',
		gallery         : null,
		currPage		: 1,
		totalPages		: 1,

		_hasPosts: function()
		{
			return $( this.postClass ).length > 0;
		},

		_initLayout: function()
		{

			$( this.postClass ).css( 'visibility', 'visible' );

			FLBuilderLayout._scrollToElement( $( this.nodeClass + ' .tnit-paged-scroll-to' ) );
		},

		_initInfiniteScroll: function()
		{
			//alert('Before');
			var isScroll = 'scroll' === this.settings.pagination || 'load_more' === this.settings.pagination,
				pages	 = $( this.nodeClass + ' .tnit-pagination' ).find( 'li .page-numbers:not(.next)' );

			if ( pages.length > 1) {
				var total       = pages.last().text().replace( /\D/g, '' );
				this.totalPages = parseInt( total );
				//alert('Working 1...');
			}

			if ( isScroll && this.totalPages > 1 && 'undefined' === typeof FLBuilder ) {
				this._infiniteScroll();
				//alert('Working 2...');

				if ( 'load_more' === this.settings.pagination ) {
					this._infiniteScrollLoadMore();
				}
			}
		},

		_infiniteScroll: function(settings)
		{
			var path 		= $( this.nodeClass + ' .tnit-pagination a.next' ).attr( 'href' ),
				pagePattern = /(.*?(\/|\&|\?)paged-[0-9]{1,}(\/|=))([0-9]{1,})+(.*)/,
				wpPattern   = /^(.*?\/?page\/?)(?:\d+)(.*?$)/,
				pageMatched = null,
				scrollData	= {
					navSelector     : this.nodeClass + ' .tnit-pagination',
					nextSelector    : this.nodeClass + ' .tnit-pagination a.next',
					itemSelector    : this.postClass,
					prefill         : true,
					bufferPx        : 200,
					loading         : {
						msgText         : 'Loading',
						finishedMsg     : '',
						img             : this.settings.pluginUrl + 'assets/images/ajax-loader-grey.gif',
						speed           : 1
					}
			};

			// Define path since Infinitescroll incremented our custom pagination '/paged-2/2/' to '/paged-3/2/'.
			if ( pagePattern.test( path ) ) {
				scrollData.path = function( currPage ){
					pageMatched = path.match( pagePattern );
					path        = pageMatched[1] + currPage + pageMatched[5];
					return path;
				};
			} else if ( wpPattern.test( path ) ) {
				scrollData.path = path.match( wpPattern ).slice( 1 );
			}

			$( this.wrapperClass ).infinitescroll( scrollData, $.proxy( this._infiniteScrollComplete, this ) );

			setTimeout(
				function(){
					$( window ).trigger( 'resize' );
				},
				100
			);
		},

		_infiniteScrollComplete: function(elements)
		{
			var wrap = $( this.wrapperClass );

			elements = $( elements );

			if (this.settings.layout === 'grid') {
				wrap.imagesLoaded(
					$.proxy(
						function() {
							elements.css( 'visibility', 'visible' );
						},
						this
					)
				);
			}

			if ( 'load_more' === this.settings.pagination ) {
				$( '#infscr-loading' ).appendTo( this.wrapperClass );
			}

			this.currPage++;

			this._removeLoadMoreButton();
		},

		_infiniteScrollLoadMore: function()
		{
			var wrap = $( this.wrapperClass );

			$( window ).unbind( '.infscr' );

			$( this.nodeClass + ' .tnit-pagination-load-more .fl-button' ).on(
				'click',
				function(){
					wrap.infinitescroll( 'retrieve' );
					return false;
				}
			);
		},

		_removeLoadMoreButton: function()
		{
			if ( 'load_more' === this.settings.pagination && this.totalPages === this.currPage ) {
				$( this.nodeClass + ' .tnit-pagination-load-more' ).remove();
			}
		}
	};

})( jQuery );
