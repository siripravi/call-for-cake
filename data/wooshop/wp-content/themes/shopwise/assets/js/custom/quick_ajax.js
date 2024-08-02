jQuery(document).ready(function($) {
	"use strict";

    $('a.button.detail-bnt').on('click', function(event){
		event.preventDefault(); 
        var data = {
            action: 'quick_view',
			beforeSend: function() {
				$('body').append('<div class="loader-overlay"></div><div class="loader-image"></div>');
			},
			'id': $(this).attr('href'),
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
            $.magnificPopup.open({
                type: 'inline',
                items: {
                    src: response
                }
            })
			
			$('.carousel_slider').each( function() {
				var $carousel = $(this);
				$carousel.owlCarousel({
					dots : $carousel.data("dots"),
					loop : $carousel.data("loop"),
					items: $carousel.data("items"),
					margin: $carousel.data("margin"),
					mouseDrag: $carousel.data("mouse-drag"),
					touchDrag: $carousel.data("touch-drag"),
					autoHeight: $carousel.data("autoheight"),
					center: $carousel.data("center"),
					nav: $carousel.data("nav"),
					rewind: $carousel.data("rewind"),
					navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
					autoplay : $carousel.data("autoplay"),
					animateIn : $carousel.data("animate-in"),
					animateOut: $carousel.data("animate-out"),
					autoplayTimeout : $carousel.data("autoplay-timeout"),
					smartSpeed: $carousel.data("smart-speed"),
					responsive: $carousel.data("responsive")
				});	
			});
			$('.slick_slider').each( function() {
				var $slick_carousel = $(this);
				$slick_carousel.slick({
					arrows: $slick_carousel.data("arrows"),
					dots: $slick_carousel.data("dots"),
					infinite: $slick_carousel.data("infinite"),
					centerMode: $slick_carousel.data("center-mode"),
					vertical: $slick_carousel.data("vertical"),
					fade: $slick_carousel.data("fade"),
					cssEase: $slick_carousel.data("css-ease"),
					autoplay: $slick_carousel.data("autoplay"),
					verticalSwiping: $slick_carousel.data("vertical-swiping"),
					autoplaySpeed: $slick_carousel.data("autoplay-speed"),
					speed: $slick_carousel.data("speed"),
					pauseOnHover: $slick_carousel.data("pause-on-hover"),
					draggable: $slick_carousel.data("draggable"),
					slidesToShow: $slick_carousel.data("slides-to-show"),
					slidesToScroll: $slick_carousel.data("slides-to-scroll"),
					asNavFor: $slick_carousel.data("as-nav-for"),
					focusOnSelect: $slick_carousel.data("focus-on-select"),
					responsive: $slick_carousel.data("responsive")
				});	
			});
		
		
			var image = $('#product_img');
			//var zoomConfig = {};
			var zoomActive = false;
			
			zoomActive = !zoomActive;
			if(zoomActive) {
				if ($(image).length > 0){
					$(image).elevateZoom({
						cursor: "crosshair",
						easing : true, 
						gallery:'pr_item_gallery',
						zoomType: "inner",
						galleryActiveClass: "active"
					}); 
				}
			}
			else {
				$.removeData(image, 'elevateZoom');//remove zoom instance from image
				$('.zoomContainer:last-child').remove();// remove zoom container from DOM
			}
			
			$.magnificPopup.defaults.callbacks = {
			open: function() {
			  $('body').addClass('zoom_image');
			},
			close: function() {
			  // Wait until overflow:hidden has been removed from the html tag
			  setTimeout(function() {
				$('body').removeClass('zoom_image');
				$('body').removeClass('zoom_gallery_image');
				$('.zoomContainer').slice(1).remove();
				}, 100);
			  }
			};
			
			// Set up gallery on click
			var galleryZoom = $('#pr_item_gallery');
			galleryZoom.magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery:{
					enabled: true
				},
				callbacks: {
					elementParse: function(item) {
						item.src = item.el.attr('data-zoom-image');
					}
				}
			});
			
			// Zoom image when click on icon
			$('.product_img_zoom').on('click', function(){
				var atual = $('#pr_item_gallery a').attr('data-zoom-image');
				$('body').addClass('zoom_gallery_image');
				$('#pr_item_gallery .item').each(function(){
					if( atual == $(this).find('.product_gallery_item').attr('data-zoom-image') ) {
						return galleryZoom.magnificPopup('open', $(this).index());
					}
				});
			});
			
			var container = $( '.quantity' );
			container.each( function() {
			  var self = $( this );
			  var buttons = $( this ).find( 'input' );
			  
			  $("form.cart.grouped_form .input-text.qty").attr("value", "0");

			  buttons.each( function() {
				$(this).on( 'click', function(event) {
				  var qty_input = self.find( '.input-text.qty' );
				  if ( $(qty_input).prop('disabled') ) return;
				  var qty_step = parseFloat($(qty_input).attr('step'));
				  var qty_min = parseFloat($(qty_input).attr('min'));
				  var qty_max = parseFloat($(qty_input).attr('max'));


				  if ( $(this).hasClass('minus') ){
					var vl = parseFloat($(qty_input).val());
					vl = ( (vl - qty_step) < qty_min ) ? qty_min : (vl - qty_step);
					$(qty_input).val(vl);
				  } else if ( $(this).hasClass('plus') ) {
					var vl = parseFloat($(qty_input).val());
					vl = ( (vl + qty_step) > qty_max ) ? qty_max : (vl + qty_step);
					$(qty_input).val(vl);
				  }

				  qty_input.trigger( 'change' );
				});
			  });
			});
			
			

			$( document.body ).trigger( 'shopwiseSinglePageInit' );
			
			$('.input-text.qty').closest('.ajax_quick_view').find( '.input-text.qty' ).val($('.input-text.qty').closest('.ajax_quick_view').find( '.input-text.qty' ).attr('min'));
			
			$(".loader-image").remove();
			$(".loader-overlay").remove();
        });
    });
});