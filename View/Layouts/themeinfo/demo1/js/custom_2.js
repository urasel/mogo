
// Preloader -section
    //-------------------------------------------------------
  // Preloader 
	jQuery(window).on('load', function() {
		jQuery("#status").fadeOut();
		jQuery("#preloader").delay(350).fadeOut("slow");
	});
	
	//--------------------up scroll js-----------------------------
	// ===== Scroll to Top ==== 
				$(window).scroll(function() {
					if ($(this).scrollTop() >= 100) {       
						$('#return-to-top').fadeIn(200);   
					} else {
						$('#return-to-top').fadeOut(200);  
					}
				});
				$('#return-to-top').click(function() {     
					$('body,html').animate({
						scrollTop : 0                
					}, 500);
				});
				
			
			// Menu js for Position fixed
				$(window).scroll(function(){
					var window_top = $(window).scrollTop() + 1; 
					if (window_top > 30) {
						$('.menu_wrapper').addClass('menu_fixed animated fadeIn');
					} else {
						$('.menu_wrapper').removeClass('menu_fixed animated fadeIn');
					}
				});
			
			  
		//----------------------- SHOW HIDE LOGIN FORM JS -----------------------//
	
	
	$('#search_button').on("click", function(e) {
		$('#search_open').slideToggle();
		e.stopPropagation(); 
	});

	$(document).on("click", function(e){
		if(!(e.target.closest('#search_open'))){	
			$("#search_open").slideUp();   		
		}
   });
   
   // Main Slider Animation
  
  (function( $ ) {

	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#carousel-example-generic'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  

	
})(jQuery);


   //----------------------- RS SLIDER JS -----------------------//
 
						
				// Magnific popup-video
	$('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
		
		
		// Wow js
		$(window).on("load", function() {
				var wow = new WOW({
					boxClass: 'wow',
					animateClass: 'animated',
					offset: 0,
					mobile: true,
					live: true
				});
				wow.init();
			});
	
		//*-----------------------owl caouresel Team---------------------------*//	
		$(document).ready(function() {
              $('.team_slider_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                                autoplay:false,
									smartSpeed: 1200,
                responsiveClass: true,
                                navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 1,
                    nav: true
                  },
                  1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                    margin: 30
                  }
                }
              })
            });
			
			//-------------------------------------------------------
			//*-----------------------owl caouresel Team---------------------------*//	
		$(document).ready(function() {
              $('.event_slideR_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                                autoplay:false,
									smartSpeed: 1200,
                responsiveClass: true,
                                navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 1,
                    nav: true
                  },
                  1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                    margin: 30
                  }
                }
              })
            });
			
				//-------------------------------------------------------
			//*-----------------------owl caouresel Team---------------------------*//	
		$(document).ready(function() {
              $('.testmonial_slider_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                                autoplay:false,
									smartSpeed: 1200,
                responsiveClass: true,
                                navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 1,
                    nav: true
                  },
                  1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                    margin: 30
                  }
                }
              })
            });
			
			//---------------------partner slider---------------//
			$(document).ready(function() {
              $('.partner_slider_img .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                                autoplay:true,
									smartSpeed: 1200,
                responsiveClass: true,
                                navText : ['<i class="fa fa-long-arrow-left" aria-hidden="true"></i>','<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'],
                responsive: {
                  0: {
                    items: 2,
                    nav: true
                  },
                  600: {
                    items: 4,
                    nav: true
                  },
                  1000: {
                    items: 6,
                    nav: true,
                    loop: true,
                    margin: 10
                  }
                }
              })
            });
			
    // counter-section
    //-------------------------------------------------------
    $('.counter_section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).off('inview');
        }
    });
	
	  /*--- Responsive Menu Start ----*/

$("#toggle").on("click", function(){
  var w = $('#sidebar').width();
  var pos = $('#sidebar').offset().left;
 
  if(pos == 0){
  $("#sidebar").animate({"left": -w}, "slow");
  }
  else
  {
  $("#sidebar").animate({"left": "0"}, "slow");
  }
  
});

$("#toggle_close").on("click", function(){
  var w = $('#sidebar').width();
  var pos = $('#sidebar').offset().left;
 
  if(pos == 0){
  $("#sidebar").animate({"left": -w}, "slow");
  }
  else
  {
  $("#sidebar").animate({"left": "0"}, "slow");
  }
  
});

(function($){
$(document).ready(function(){

$('#cssmenu li.active').addClass('open').children('ul').show();
	$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});

});
})(jQuery);




/*--- Responsive Menu End ----*/	
			

			// Shuffle
// -------------------------------------------------------------

$(window).load(function() {
    /** this is come when complete page is fully loaded, including all frames, objects and images **/

    if ($('#gridWrapper').length > 0) {
     
        /* initialize shuffle plugin */
        var $grid = $('#gridWrapper');

        $grid.shuffle({
            itemSelector: '.portfolio-wrapper' // the selector for the items in the grid
        });

        /* reshuffle when user clicks a filter item */
        $('#filter a').on('click', function (e) {
            e.preventDefault();

            // set active class
            $('#filter a').removeClass('active');
            $(this).addClass('active');

            // get group name from clicked item
            var groupName = $(this).attr('data-group');

            // reshuffle grid
            $grid.shuffle('shuffle', groupName );
        });
    }
});


	$('.zoom_popup').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1]
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title') + '<small></small>';
				}
			}
		});
		
		
			$('.et_footer_text').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1]
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title') + '<small></small>';
				}
			}
		});