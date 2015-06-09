( function( $ ) {

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}

	/* Superfish the menu drops ---------------------*/
	function superfishSetup() {
		$('.menu').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: true,
			autoArrows:  true,
			dropShadows: false
		});
	}

	/* Flexslider ---------------------*/
	function flexSliderSetup() {
		if( ($).flexslider) {
			var slider = $('.flexslider');
			slider.fitVids().flexslider({
				slideshowSpeed		: slider.attr('data-speed'),
				animationDuration	: 600,
				animation			: slider.attr('data-transition'),
				video				: false,
				useCSS				: false,
				prevText			: '<i class="fa fa-angle-left"></i>',
				nextText			: '<i class="fa fa-angle-right"></i>',
				touch				: false,
				animationLoop		: true,
				smoothHeight		: true,
				controlsContainer	: ".slideshow",
				controlNav			: true,
				manualControls		: ".flex-control-nav li",
				
				start: function(slider) {
					slider.removeClass('loading');
					$( ".preloader" ).hide();
				}
			});
		}
	}
		
	/* Portfolio Filter ---------------------*/
	function isotopeSetup() {
		var mycontainer = $('#portfolio-list');
		mycontainer.isotope({
			itemSelector: '.portfolio-item'
		});
	
		// filter items when filter link is clicked
		$('#portfolio-filter a').click(function(){
			var selector = $(this).attr('data-filter');
			mycontainer.isotope({ filter: selector });
			return false;
		});
	}
	
	/* Size Featured Image To Content ---------------------*/
	function sizingSetup() {
		$(".featured-posts .feature-img").css({'height':($(".featured-posts .holder").height()+'px')});
	}
		
	function modifyPosts() {
		
		/* Insert Line Break Before More Links ---------------------*/
		$('<br />').insertBefore('.postarea .more-link');
		
		/* Hide Comments When No Comments Activated ---------------------*/
		$('.nocomments').parent().css('display', 'none');
		
		/* Animate Page Scroll ---------------------*/
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});
		
		/* Fit Vids ---------------------*/
		$('.feature-vid, .postarea').fitVids();
		
	}

	/* Auto adjust height of feature container divs  ---------------------*/	
	equalheight = function(container) {

		var currentTallest = 0,
		    currentRowStart = 0,
		    rowDivs = new Array(),
		    $el,
		    topPosition = 0;
		$(container).each(function() {
		
		    $el = $(this);
		    $($el).height('auto')
		    topPostion = $el.position().top;
		
		    if (currentRowStart != topPostion) {
		      for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
		        rowDivs[currentDiv].height(currentTallest);
		      }
		      
				rowDivs.length = 0; // empty the array
			    currentRowStart = topPostion;
			    currentTallest = $el.height();
			     rowDivs.push($el);
			} else {
		      rowDivs.push($el);
		      currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		    }
		    
		    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
		      rowDivs[currentDiv].height(currentTallest);
		    }
		  
		});
	}
	
	
	$( document )
	.ready( removeNoJsClass )
	.ready( superfishSetup )
	.ready( sizingSetup )
	.ready( modifyPosts )
	.on( 'post-load', modifyPosts );
	
	$( window )
	.load( flexSliderSetup )
	.load( isotopeSetup )
	.load( function() {equalheight('.featured-pages .holder .information') })
	.resize( sizingSetup )
	.resize( isotopeSetup )
	.resize( function() {equalheight('.featured-pages .holder .information') });
	
})( jQuery );