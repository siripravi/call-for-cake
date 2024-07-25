window.onpageshow = function(event) {
  if (event.persisted) {
    window.location.reload();
  }
};

(function ($, window) {
	'use strict';

	var $doc = $(document),
			win = $(window),
			body = $('body'),
			adminbar = $('#wpadminbar'),
			cc = $('.click-capture'),
			header = $('.header'),
			wrapper = $('#wrapper'),
      mobile_menu = $('#mobile-menu'),
			mobile_toggle = $('.mobile-toggle-holder'),
			thb_md = new MobileDetect(window.navigator.userAgent);

	var SITE = SITE || {};

  window.lazySizesConfig = window.lazySizesConfig || {};
  window.lazySizesConfig.expand = 100;
  window.lazySizesConfig.loadMode = 1;
  window.lazySizesConfig.loadHidden = false;

  gsap.defaults({
    ease: 'power1.out'
  });
	gsap.config({
		nullTargetWarn: false
	});
  function thb_toggleClass( selector, cls ) {
    $(selector).toggleClass( cls );
  }

	SITE = {
		thb_scrolls: {},
		h_offset: 0,
		init: function() {
			var self = this,
					obj;

			function initFunctions() {
				for (obj in self) {
					if ( self.hasOwnProperty(obj)) {
						var _method =  self[obj];
						if ( _method.selector !== undefined && _method.init !== undefined ) {
							if ( $(_method.selector).length > 0 ) {
								_method.init();
							}
						}
					}
				}
			}
      initFunctions();
		},
    newsletterPopup: {
			selector: '.newsletter-popup',
			init: function() {
				var base = this,
						container = $(base.selector);

				if ( Cookies.get('newsletter_popup') !== '1' ) {

          if ( themeajax.settings.newsletter === 'off' ) {
            return;
          }
          _.delay(function() {
            $.magnificPopup.open({
  						type:'inline',
  						items: {
  							src: '#newsletter-popup',
  							type: 'inline'
  						},
  						mainClass: 'mfp newsletter-popup mfp-zoom-in',
              tLoading: themeajax.l10n.lightbox_loading,
    					removalDelay: 400,
              fixedBgPos: true,
              fixedContentPos: true,
              closeBtnInside: true,
              closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
  						callbacks: {
  							close: function() {
  								Cookies.set('newsletter_popup', '1', { expires: parseInt(themeajax.settings.newsletter_length,10) });
  							}
  						}
  					});
          }, ( parseInt(themeajax.settings.newsletter_delay, 10) * 1000 ) );

				}
			}
		},
    cookieBar: {
			selector: '.thb-cookie-bar',
			init: function() {
				var base = this,
						container = $(base.selector),
						button = $('.button-accept', container);

				if (Cookies.get('thb-peakshops-cookiebar') !== 'hide') {
					gsap.to(container, { opacity: '1', y: '0%' });
				}
				button.on('click', function() {
				  Cookies.set('thb-peakshops-cookiebar', 'hide', { expires: 30 });
				  gsap.to(container, { duration: 0.5, opacity: '0', y: '100%' } );
					return false;
				});
			}
		},
    header: {
			selector: '.header',
			init: function() {
				var base = this,
            offset = 150;

				if (themeajax.settings.fixed_header_scroll === 'on' ) {
					$('.header.fixed').headroom({
						offset: offset
					});
				}
				win.on('scroll.fixed-header', function() { base.scroll(offset); } ).trigger('scroll.fixed-header');

			},
			scroll: function(offset) {
				var wOffset = win.scrollTop(),
						stick = 'fixed-enabled';

        if (wOffset > offset) {
					$('.header.fixed').addClass(stick);
				} else {
          $('.header.fixed').removeClass(stick);
        }
			}
		},
    fullMenu: {
			selector: '.thb-full-menu',
			init: function() {
				var base = this,
  					container = $(base.selector),
  					children = container.find('.menu-item-has-children:not(.menu-item-mega-parent)'),
  					mega_menu = container.find('.menu-item-has-children.menu-item-mega-parent');

        /* Sub-Menus */
				children.each(function() {
					var _this = $(this),
							menu = _this.find('>.sub-menu, .sub-menu.thb_mega_menu'),
							li = menu.find('>li>a'),
              tabs = _this.find('.thb_mega_menu li'),
							tl = gsap.timeline({
                paused: true,
                onStart: function() {
                  gsap.set(menu, { display: 'block' });
                },
                onReverseComplete: function() {
                  gsap.set(menu, { display: 'none' });
                }
              });

					if (menu.length) {
            tl.to(menu, { duration: 0.2, autoAlpha: 1 }, "start" );
          }

          if (li.length) {
            tl.to(li, { duration: 0.05, opacity: 1, stagger: 0.015 }, "start" );
          }



					_this.hoverIntent({
						sensitivity:3,
						interval:20,
						timeout:70,
						over: function() {
							_this.addClass('sfHover');
							tl.timeScale(1).restart();
						},
						out: function() {
							_this.removeClass('sfHover');
							tl.timeScale(1.5).reverse();
						}
					});
				});

        /* Mega Menus */
        mega_menu.each(function() {
					var _this = $(this),
							menu = _this.find('>.sub-menu'),
							li = menu.find('>li>a, .menu-item-mega-link>a'),
              tl = gsap.timeline({
                paused: true,
                onStart: function() {
                  gsap.set(menu, { display: 'flex' });
                },
                onReverseComplete: function() {
                  gsap.set(menu, { display: 'none' });
                }
              });

					tl
						.to( menu, { duration: 0.2, autoAlpha: 1 }, "start")
						.to( li, { duration: 0.05, opacity: 1, x: 0, stagger: 0.015 }, "start");

					_this.hoverIntent({
						sensitivity:3,
						interval:20,
						timeout:70,
						over:function() {
							_this.addClass('sfHover');
							tl.timeScale(1).restart();
						},
						out: function() {
							_this.removeClass('sfHover');
							tl.timeScale(1.5).reverse();
						}
					});
				});
				var resizeMegaMenu = _.debounce(function(){
          mega_menu.find('>.sub-menu').each(function() {
            var that = $(this),
                return_val;

            that.css('display', 'flex');
            if ( that.offset().left <= 0 ) {
              return_val = (-1 * that.offset().left) + 30;
            } else if ( (that.offset().left + that.outerWidth()) > $(window).outerWidth() ) {
              return_val =  -1 * Math.round( that.offset().left + that.outerWidth() - $(window).outerWidth() + 30);
            }

            that.hide();
            that.css({
              'marginLeft': return_val + 'px'
            });
          });
        }, 30);
        win.on('resize.resizeMegaMenu', resizeMegaMenu).trigger('resize.resizeMegaMenu');
			}
		},
    mobileMenu: {
			selector: '#mobile-menu',
			init: function() {
				var base = this,
						container = $(base.selector),
						behaviour = container.data('behaviour'),
						arrow = behaviour === 'thb-submenu' ? container.find('.thb-mobile-menu li.menu-item-has-children>a') : container.find('.thb-mobile-menu li.menu-item-has-children>a>span');

				arrow.on('click', function(e){
					var that = $(this),
							parent = that.parents('a').length ? that.parents('a') : that,
							menu = parent.next('.sub-menu');

					if (parent.hasClass('active')) {
						parent.removeClass('active');
						menu.slideUp('200');
					} else {
						parent.addClass('active');
						menu.slideDown('200');
					}
					e.stopPropagation();
					e.preventDefault();
				});
			}
		},
		hashLinks: {
			selector: 'a[href*="#"]',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on('click', function(e){
					var _this = $(this),
						url = _this.attr('href'),
						hash,
						pos;

          if ( _this.parents( '.woocommerce-tabs' ).length ) {
            return;
          }
					if ( _this.hasClass( 'comment-reply-link' ) || _this.attr('id') === 'cancel-comment-reply-link' ) {
						return;
					}
					if ( url ) {
						hash = url.indexOf("#") !== -1 ? url.substring(url.indexOf("#")+1) : '';
						pos = hash && $('#'+hash).length ? $('#'+hash).offset().top - ( $('#wpadminbar').outerHeight() || 0 ) : 0;
					}
          if ($('.fixed-header-on').length && themeajax.settings.fixed_header_scroll !== 'on' ) {
            var fixed_height = $('.header>.row').outerHeight() + ( parseInt(themeajax.settings.fixed_header_padding.top, 10) || 0) + ( parseInt(themeajax.settings.fixed_header_padding.bottom, 10) || 0 );
            if (fixed_height) {
              pos -= fixed_height;
            }
          }
					if ( hash && pos ) {
						pos = (hash === 'footer') ? "max" : pos;

						if (_this.parents('.thb-mobile-menu').length) {
							SITE.mobile_toggle.mobileTl.reverse();
						}
						if ( !$('#'+hash).hasClass('vc_tta-panel') ) {
							gsap.to(win, 1, { scrollTo: { y:pos, autoKill:false } });
						}
						e.preventDefault();
					}
				});
			}
		},
    custom_scroll: {
			selector: '.thb-custom-scroll',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
              y = _this.hasClass('thb-scroll-x') ? false : true,
              id = _this.attr('id'),
					    args = {
    						suppressScrollX: y,
                suppressScrollY: !y,
                minScrollbarLength: 15
    					};
					var ps = new PerfectScrollbar(_this[0], args);


					if ( id ) {
						SITE.thb_scrolls[id] = ps;
					}

				});

			}
		},
    shopSidebar: {
			selector: '.widget_layered_nav span.count, .widget_tag_cloud .tag-link-count',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function(){
					var count = $.trim($(this).html());
					count = count.substring(1, count.length-1);
					$(this).html(count);
				});
			}
		},
    shopFilterStyle3: {
			selector: '.thb-hidden-filters .widget',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var that = $(this),
							t = that.find('>.thb-widget-title');

					t.append($('<div class="thb-arrow"><i class="thb-icon-down-open-mini"></i></div>')).on('click', function() {

            if ( $(window).width() >= 1068) {
              return false;
            }
						t.toggleClass('active');
						t.next().animate({
							height: "toggle",
							opacity: "toggle"
						}, 300);
					});
				});
			}
		},
    shop_toggle: {
			selector: '#thb-shop-filters',
      init: function() {
				var base = this,
            container = $(base.selector),
            side_filters   = $('#side-filters'),
            hidden_filters = $('#thb-hidden-filters'),
            hidden_exists  = hidden_filters.length,
            tl = gsap.timeline({
              paused: true,
              reversed: true,
              onStart: function() {
                if ( ! hidden_exists ) {
                  wrapper.addClass('open-cc');
                }
              },
              onReverseComplete: function() {
                if ( ! hidden_exists ) {
                  wrapper.removeClass('open-cc');
                  gsap.set(side_filters, {clearProps: "transform"});
                }
              }
            }),
            parent_filter = hidden_exists ? hidden_filters : side_filters,
            items = $( '.widgets', parent_filter ),
						close = $( '.thb-close', parent_filter );

        if ( ! hidden_exists ) {
          tl
            .set( parent_filter, { display: 'block' }, "start" )
            .to( parent_filter, { duration: 0.3, x: '0' }, "start")
            .to( cc, { duration: 0.3, autoAlpha: 1 }, "start" )
            .to( close, { duration: 0.3, scale:1 }, "start+=0.2");

            if ( items.length ) {
              tl.from( items, { duration: 0.4, autoAlpha: 0, stagger: 0.1 }, "start+=0.2");
            }
        }

        container.on('click', function() {
          if ( ! hidden_exists ) {
  					if ( tl.reversed() ) { tl.timeScale(1).play(); } else { tl.timeScale(1.2).reverse(); }
          } else {
            parent_filter.slideToggle({
              start: function() {
                $(this).css('display','flex');
              }
            });
          }

					return false;
				});
        if ( ! hidden_exists ) {
  				$doc.keyup(function(e) {
  				  if (e.keyCode === 27) {
  				    if ( tl.progress() > 0) { tl.reverse(); }
  				  }
  				});
  				cc.add(close).on('click', function() {
  					if ( tl.progress() > 0) { tl.reverse(); }
  					return false;
  				});
        }
      }
    },
    mobile_toggle: {
			selector: '.mobile-toggle-holder',
      init: function() {
				var base = this,
            container = $(base.selector),
            tl = gsap.timeline({
              paused: true,
              reversed: true,
              onStart: function() {
                wrapper.addClass('open-cc');
              },
              onReverseComplete: function() {
                wrapper.removeClass('open-cc');
                gsap.set(mobile_menu, {clearProps: "transform"});
              }
            }),
            items = $('.thb-mobile-menu>li', mobile_menu),
						secondary_items = $('.thb-secondary-menu>li', mobile_menu),
						mobile_footer = $('.menu-footer>*', mobile_menu),
						icons = $('.thb-social-links-container>a', mobile_menu),
						close = $('.thb-mobile-close', mobile_menu),
            speed = themeajax.settings.mobile_menu_animation_speed,
            offset = "start+="+((speed/3) * 2);


        speed = speed === 0 ? 0.005 : speed;
        tl
          .to( mobile_menu, { duration: speed, x: '0' }, "start")
          .to( close, { duration: speed, scale:1 }, "start+=0.2")
          .to( cc, { duration: speed, autoAlpha: 1 }, "start" )
					.to( items, { duration: speed / 2, autoAlpha: 1, stagger: 0.05 }, offset)
          .from( secondary_items.add(mobile_footer).add(icons), { duration: speed / 2, autoAlpha: 0, stagger: 0.05 }, offset);


        container.on('click', function() {
					if ( tl.reversed() ) { tl.timeScale(1).play(); } else { tl.timeScale(1.5).reverse(); }
					return false;
				});

				$doc.keyup(function(e) {
				  if (e.keyCode === 27) {
				    if ( tl.progress() > 0) { tl.timeScale(1.5).reverse(); }
				  }
				});
				cc.add(close).on('click', function() {
					if ( tl.progress() > 0) { tl.timeScale(1.5).reverse(); }
					return false;
				});
      }
    },
    search: {
      selector: '.thb-search-holder',
      init: function() {
				var base = this,
					container = $(base.selector),
          search_window = $('.thb-search-popup'),
          close_btn = $('.thb-mobile-close', search_window),
          close = $('.thb-close-text', search_window),
          tl = gsap.timeline({paused: true});

          tl
            .to(search_window, 0.5, {autoAlpha: 1}, "start")
            .to(close_btn, 0.3, { scale: 1 }, "start+=0.2");

        container.on('click', function() {
          tl.play();
          return false;
        });
        close.add(close_btn).on('click', function() {
          if ( tl.progress() > 0 ) { tl.reverse(); }
          return false;
        });
        $doc.on('keyup',function(e) {
				  if (e.keyCode === 27) {
				    if ( tl.progress() > 0 ) { tl.reverse(); }
				  }
				});
      }
    },
    quickCart: {
			selector: '.thb-secondary-item.has-dropdown',
			init: function() {
				var base = this,
					container = $(base.selector);

        /* Sub-Menus */
				container.each(function() {
					var _this = $(this),
							menu = _this.find('.thb-secondary-dropdown'),
							tl = gsap.timeline({
                paused: true,
                onStart: function() {
                  gsap.set(menu, { display: 'block' });
                },
                onReverseComplete: function() {
                  gsap.set(menu, { display: 'none' });
                }
              });
          if ( !menu.length ) {
            return;
          }
					tl
						.to(menu, 0.25, { autoAlpha: 1 }, "start" );


					_this.hoverIntent(
						function() {
							_this.addClass('sfHover');
							tl.timeScale(1).restart();
						},
						function() {
							_this.removeClass('sfHover');
							tl.timeScale(1.5).reverse();
						}
					);
				});

				/* Cart Link */
				$( '.thb-item-text, .thb-item-icon-wrapper', '.thb-quick-cart' ).on('click', function() {
					window.location.href = themeajax.settings.cart_url;
					return false;
				});
      }
    },
    autoComplete: {
			selector: '.header .thb-header-inline-search',
			init: function() {
				var base = this,
						container = $(base.selector),
						field = $('.search-field', container);

        function escapeRegExChars(value) {
          return value.replace(/[|\\{}()[\]^$+*?.]/g, "\\$&");
        }
        container.each(function() {
          var _this = $(this),
              field = $('.search-field', _this);

          field.autocomplete({
  					minChars: 3,
  					appendTo: $('.thb-autocomplete-wrapper', _this),
  					containerClass: 'thb-results-container',
  					triggerSelectOnValidInput: false,
  					serviceUrl: themeajax.url + '?action=thb_ajax_search',
            tabDisabled: true,
            showNoSuggestionNotice: false,
            params: {
  						security: themeajax.nonce.autocomplete_ajax,
              product_cat: 0
  					},
            onSearchStart: function() {
  						$('.woocommerce-product-search', _this).addClass('thb-loading');

              var input = $(this),
                  instance = input.data('autocomplete');

              instance.options.params.product_cat = _this.find('.thb-category-select').val();
  					},
  					formatResult: function(suggestion, currentValue) {
              var pattern = '(' + escapeRegExChars(currentValue) + ')',
                  value = suggestion.value
                  .replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')
                  .replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/&lt;(\/?strong)&gt;/g, '<$1>');
  						return '<a href="'+suggestion.url+'">'+suggestion.thumbnail+'</figure><span class="product-title">'+value+'</span>'+suggestion.price+'</a>';
  					},
  					onSelect: function(suggestion) {
  						if (suggestion.id !== -1) {
  							window.location.href = suggestion.url;
  						}
  					},
  					onSearchComplete: function (query, suggestions) {
  						$('.woocommerce-product-search', _this).removeClass('thb-loading');

              if (suggestions.length) {
								var cat = _this.find('.thb-category-select').val(),
										url = themeajax.settings.site_url + '?s='+query + '&post_type=product';

								if ( cat ) {
									url += '&product_cat='+ cat;
								}
                $('.thb-results-container').append($('<div class="thb-search-btn"><a href="'+url+'" class="btn style2">'+themeajax.l10n.results_all+'</a></div>'));
              }
  					}
  				});
        });

			}
		},
    shopLoading: {
			selector: '.post-type-archive-product ul.products.thb-main-products, .tax-product_cat ul.products.thb-main-products, .tax-product_tag ul.products.thb-main-products',
			thb_loading: false,
			scrollInfinite: false,
			href: false,
			init: function() {
				var base = this,
						container = $(base.selector),
						type = themeajax.settings.shop_product_listing_pagination;

				if ($('.woocommerce-pagination').length && ( body.hasClass('post-type-archive-product') || body.hasClass('tax-product_cat') || body.hasClass('tax-product_tag') ) ) {
					if (type === 'style2') {
					 	base.loadButton(container);
					} else if (type === 'style3') {
					 	base.loadInfinite(container);
					}
				}
			},
			loadButton: function(container) {
				var base = this;

				$('.woocommerce-pagination').before('<div class="thb_load_more_container text-center"><a class="thb_load_more button">'+themeajax.l10n.loadmore+'</a></div>');

				if ($('.woocommerce-pagination a.next').length === 0) {
					$('.thb_load_more_container').addClass('is-hidden');
				}
				$('.woocommerce-pagination').hide();

				body.on('click', '.thb_load_more:not(.no-ajax)', function(e) {
					var _this = $(this);
					base.href = $('.woocommerce-pagination a.next').attr('href');


					if (base.thb_loading === false) {
						_this.html(themeajax.l10n.loading).addClass('loading');

						base.loadProducts(_this, container);
					}
					return false;
				});
			},
			loadInfinite: function(container) {
				var base = this;

				if ($('.woocommerce-pagination a.next').length === 0) {
					$('.thb_load_more_container').addClass('is-hidden');
				}
				$('.woocommerce-pagination').hide();

				base.scrollInfinite = _.debounce(function(){
					if ( (base.thb_loading === false ) && ( (win.scrollTop() + win.height() + 150) >= (container.offset().top + container.outerHeight()) ) ) {

						base.href = $('.woocommerce-pagination a.next').attr('href');
						base.loadProducts(false, container, true);
					}
				}, 30);

				win.on('scroll', base.scrollInfinite);
			},
			loadProducts: function(button, container, infinite) {
				var base = this;
				$.ajax( base.href, {
					method: 'GET',
					beforeSend: function() {
						base.thb_loading = true;

						if (infinite) {
							container.addClass('thb-loading');
							win.off('scroll', base.scrollInfinite);
						}
					},
					success: function(response) {
						var resp = $(response),
								products = resp.find('ul.products.thb-main-products li');

						$('.woocommerce-pagination').html(resp.find('.woocommerce-pagination').html());

						if (button) {
						 	if( !resp.find('.woocommerce-pagination .next').length ) {
						 		button.html(themeajax.l10n.nomore_products).removeClass('loading').addClass('no-ajax');
						 	} else {
						 		button.html(themeajax.l10n.loadmore).removeClass('loading');
						 	}
						} else if (infinite) {
							container.removeClass('thb-loading');
							if ( resp.find('.woocommerce-pagination .next').length ) {
								win.on('scroll', base.scrollInfinite);
							}
						}
						if (products.length) {
							products.addClass('will-animate').appendTo(container);
							gsap.set(products, { opacity: 0, y:30});
							gsap.to(products, { duration: 0.3, y: 0, opacity: 1, stagger: 0.15, onComplete: function() {
								if ( products.find('.thb-carousel').length ) {
									SITE.slick.init(products.find('.thb-carousel'));
								}
							} });
						}
						base.thb_loading = false;
					}
				});
			}
		},
		slick: {
			selector: '.thb-carousel',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector);

				container.each(function() {
					var _this = $(this),
						data_columns = _this.data('columns') ? _this.data('columns') : 3,
						thb_columns = data_columns.length > 2 ? parseInt( data_columns.substr(data_columns.length - 1) ) : data_columns,
						children = _this.find('.columns'),
						columns = data_columns.length > 2 ? (thb_columns === 5 ? 5 : ( 12 / thb_columns )) : data_columns,
						fade = (_this.data('fade') ? true : false),
						navigation = (_this.data('navigation') === true ? true : false),
						autoplay = (_this.data('autoplay') === true ? true : false),
						pagination = (_this.data('pagination') === true ? true : false),
						infinite = (_this.data('infinite') === false ? false : true),
						autoplay_speed = _this.data('autoplay-speed') ? _this.data('autoplay-speed') : 4000,
						disablepadding = (_this.data('disablepadding') ? _this.data('disablepadding') : false),
						vertical = (_this.data('vertical') === true ? true : false),
						asNavFor = _this.data('asnavfor'),
						adaptiveHeight = _this.data('adaptive') === true ? true : false,
						rtl = body.hasClass('rtl'),
						prev_text = '',
						next_text = '';

					var args = {
						dots: pagination,
						arrows: navigation,
						infinite: infinite,
						speed: 1000,
            rows: 0,
						fade: fade,
						slidesToShow: columns,
						adaptiveHeight: adaptiveHeight,
						slidesToScroll: 1,
						rtl: rtl,
            slide: ':not(.post-gallery):not(.btn):not(.badge):not(.thb-product-icon):not(.thb-carousel-image-link):not(.woocommerce-product-gallery__trigger)',
						autoplay: autoplay,
						autoplaySpeed: autoplay_speed,
            touchThreshold: themeajax.settings.touch_threshold,
						pauseOnHover: true,
						accessibility: false,
						focusOnSelect: false,
						prevArrow: '<button type="button" class="slick-nav slick-prev"><span></span></button>',
						nextArrow: '<button type="button" class="slick-nav slick-next"><span></span></button>',
						responsive: [
							{
								breakpoint: 1068,
								settings: {
									slidesToShow: columns,
								}
							},
							{
								breakpoint: 736,
								settings: {
									slidesToShow: 1,
								}
							}
						]
					};
          if (asNavFor && $(asNavFor).is(':visible')) {
						args.asNavFor = asNavFor;
					}
					if (_this.data('fade')) {
						args.fade = true;
					}
					if (_this.hasClass('product-images')) {
            args.infinite = false;
						args.speed = 500;
						// Zoom Support
						if ( typeof wc_single_product_params !== 'undefined' ) {
  						if (window.wc_single_product_params.zoom_enabled && $.fn.zoom) {
  							_this.on('afterChange', function(event, slick, currentSlide){
  								var zoomTarget = slick.$slides.eq(currentSlide),
  										galleryWidth = zoomTarget.width(),
  										zoomEnabled  = false,
  										image = zoomTarget.find( 'img' );

  								if ( image.data( 'large_image_width' ) > galleryWidth ) {
  									zoomEnabled = true;
  								}
  								if ( zoomEnabled ) {
  									var zoom_options = $.extend( {
  										touch: false
  									}, window.wc_single_product_params.zoom_options );

  									if ( 'ontouchstart' in window ) {
											zoom_options.touch = true;
  										zoom_options.on = 'click';
  									}

  									zoomTarget.trigger( 'zoom.destroy' );
  									zoomTarget.zoom( zoom_options );
  									zoomTarget.trigger( 'mouseenter.zoom' );
  								}

  							});
  						}
						}

					}
					if (_this.hasClass('product-thumbnails')) {
            args.infinite = false;
            args.focusOnSelect = true;
						args.speed = 500;
            if (_this.parents('.thb-product-detail').hasClass('thb-product-thumbnail-style2')) {
              args.variableWidth = true;
            }

            if (_this.parents('.thb-product-detail').hasClass('thb-product-thumbnail-style1')) {
              args.vertical = true;
              args.responsive[0].settings.vertical = true;
						  args.responsive[1].settings.vertical = false;
              args.responsive[1].settings.slidesToShow = 4;
            }
					}
					if (_this.hasClass('products')) {
						args.responsive[1].settings.slidesToShow = 2;

						if ( _this.parents('.thb-hotspots-products').length ) {
							args.responsive[1].settings.slidesToShow = 1;
						}
					}

					if (_this.hasClass('thb-testimonial-style1') || _this.hasClass('thb-testimonial-style9')) {
						args.customPaging = function(slider, i) {
							var portrait = $(slider.$slides[i]).find('.author_image').attr('src'),
									title = $(slider.$slides[i]).find('.title').text();

              if ( portrait === 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==' ) {
                portrait = $(slider.$slides[i]).find('.author_image').attr('data-src');
              }
							return '<a class="portrait_bullet" title="'+title+'" style="background-image:url('+portrait+');"></a>';
						};
					}
					if (_this.hasClass('thb-testimonial-style10') ) {
						args.customPaging = function(slider, i) {
							var title = $(slider.$slides[i]).find('cite').text(),
									title_svg = title + '<svg class="thb-marker" enable-background="new -0.125 1.75 85.875 44.125" stroke-linecap="round" preserveAspectRatio="none" version="1.1" viewBox="-.125 1.75 85.875 44.125" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m62.473 2.5s-38.244 1.134-54.688 14.626c-17.45 14.318 1.557 23.701 19.375 26.044 15.472 2.034 49.668 4.714 57.057-17.093 0 0 9.572-22.907-44.372-15.04" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"/></svg>';

							return '<a class="text_bullet" title="'+title+'">'+title_svg+'</a>';
						};
						_this.on('beforeChange', function(event, slick, currentSlide, nextSlide){
							var dots = _this.find('.slick-dots'),
									bullets = $('li', dots),
									tl = gsap.timeline();

							tl
								.to(bullets.eq(currentSlide).find('path'), { duration: 0.5, ease: "power3.inOut", drawSVG: "0%" }, 's')
								.to(bullets.eq(nextSlide).find('path'), { duration: 0.5, ease: "power3.inOut", drawSVG: "100%" }, 's-=0.1');
						});
						_this.on('init breakpoint', function(e, slick) {
							var dots = _this.find('.slick-dots'),
 								 bullets = $('li', dots);

							gsap.to(bullets.eq(0).find('path'), { duration: 0.5, ease: "power3.inOut", drawSVG: "100%" });
						});
					}
          _this.on('init breakpoint', function(e, slick) {
            if (window.lazySizes) {
							lazySizes.autoSizer.checkElems();
              lazySizes.loader.checkElems();
            }
						win.trigger('scroll.thb-animation');
					});
					_this.on('breakpoint', function(event, slick, breakpoint){
						slick.$slides.data('thb-animated', false);
						win.trigger('scroll.thb-animation');
					});

					_this.on('afterChange', function(event, slick, currentSlide){
						if (slick.$slides) {
					  	win.trigger('scroll.thb-animation');
						}
            if (window.lazySizes) {
							lazySizes.autoSizer.checkElems();
              lazySizes.loader.checkElems();
            }
					});
          _this.slick(args);
				});
			}
		},
    product_lightbox: {
			selector: '.woocommerce-product-gallery__trigger',
			init: function() {
				var base = this,
						container = $(base.selector),
						product_images = $('#product-images');

        container.on('click', function() {
					if ( product_images.hasClass('thb-carousel') ) {
						$('#product-images').find('.slick-current>a').trigger('click');
					} else {
						$('#product-images').find('.woocommerce-product-gallery__image:eq(0)>a').trigger('click');
					}
          return false;
        });
      }
    },
    product_wishlist: {
			selector: '.yith-wcwl-add-to-wishlist, #yith-wcwl-form',
			init: function() {
				var base = this,
						container = $(base.selector),
            wishlist = $('.thb-quick-wishlist');

        if ( ! wishlist.length ) {
          return;
        }

        function thb_check_wishlist_count() {
          $.ajax( themeajax.url, {
            data : {
              action: 'thb_update_wishlist_count',
            },
            success : function( data ) {
              if ( ! $('.thb-wishlist-count', wishlist).length) {
                $('.thb-item-icon-wrapper', wishlist).append('<span class="count thb-wishlist-count">'+data+'</span>');
              } else {
                $('.thb-wishlist-count', wishlist).html(data);
              }
            }
          });
        }

        body.on( 'added_to_wishlist removed_from_wishlist', thb_check_wishlist_count );

        $('.remove_from_wishlist').on('click', thb_check_wishlist_count );
      }
    },
    fixedMe: {
			selector: '.thb-sticky-separator',
			init: function(el) {
				var base = this,
						container = el ? el : $(base.selector),
						header_offset = header.outerHeight(),
						offset = adminbar.outerHeight() + header_offset;


				container.each(function() {
					var _this = $(this),
              parent = _this.parents();

					if ( _this.parents( '#thb-hidden-filters' ).length ) {
						_this.remove();
						return;
					}
          if (_this.hasClass('thb-sticky-separator') && !_this.data('fixed-enabled')) {
            var new_fixed = _this.nextAll().wrapAll('<div class="thb-fixed" />').parents('.thb-fixed:not(.thb-sticky-separator)');
            _this.remove();

            _this.data('fixed-enabled', true);
          }
				});

			}
		},
    searchFields: {
			selector: '.search-fields select',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on('change', function() {
					var url = $(this).val(); // get selected value

					if (url) { // require a URL
						window.location = url; // redirect
					}
					return false;
				});
			}
		},
    accordion: {
			selector: '.thb-accordion',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
							accordion = _this.hasClass('has-accordion'),
							index = parseInt(_this.data('index'), 10) || 0,
							sections = _this.find('.vc_tta-panel'),
              scrolling = _this.data('scroll'),
							active = sections.eq(index);

					if (accordion) {
            if (active) {
              active.addClass('active').find('.vc_tta-panel-body').show();
            }
					}
					_this.on('click', '.vc_tta-panel-heading a', function() {
						var that = $(this),
								parent = that.parents('.vc_tta-panel');

						$(this).parents('.vc_tta-panel').toggleClass('active');

						if (accordion) {
							sections.not(parent).removeClass('active');
							sections.not(parent).find('.vc_tta-panel-body').slideUp('400');
						}


						parent.find('.vc_tta-panel-body').slideToggle('400', function() {
              var _panel = $(this);
							if (accordion) {
								var offset = that.parents('.vc_tta-panel-heading').offset().top - ( $('#wpadminbar').outerHeight() || 0 );

                if (scrolling) {
                  if (themeajax.settings.fixed_header_scroll === 'off') {
                    offset = offset - $('.header').outerHeight();
                  }
  								gsap.to(win, { duration: 1, scrollTo: { y: offset, autoKill: false }, onComplete: function(){
                    if ( themeajax.settings.fixed_header_scroll === 'on') {
                      header.addClass( 'headroom--unpinned' );
                    }
                  } });
                }
							}
							_.delay(function() {
								win.trigger('scroll.thb-animation');
							}, 400);
						});

						return false;
					});

				});
			}
		},
		countdown: {
			selector: '.thb-countdown',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
							date = _this.data('date'),
					    offset = _this.attr('offset');

	        _this.downCount({
	          date: date,
	          offset: offset
	        });

				});
			}
		},
    tabs: {
			selector: '.thb-tabs',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
							accordion = _this.hasClass('has-accordion'),
              animation = _this.data('animation'),
							active_section = _this.data('active-section') ? _this.data('active-section') : 1,
							index = 0,
							sections = _this.find('.vc_tta-panel'),
              horizontal = _this.hasClass('thb-horizontal-tabs') && win.width() > 1067,
							active = sections.eq(index),
							menu = $('<ul class="thb-tab-menu" />').prependTo(_this);

					sections.each(function() {
						var tab_link = $(this).find('.vc_tta-panel-heading a');

            tab_link.wrap( '<li class="vc_tta-panel-heading" />' );

            $(this).find('li.vc_tta-panel-heading').appendTo(menu);

            $(this).find('.vc_tta-panel-heading').remove();
					});

					$('.vc_tta-panel-heading', menu).eq(0).find('a').addClass('active');
					sections.eq(0).addClass('visible');

					$(this).on('click', '.vc_tta-panel-heading a', function(e) {
						var that = $(this),
								index = that.parents('.vc_tta-panel-heading').index(),
								this_active = sections.eq(index);

						sections.not(this_active).hide();
            this_active.show();

            win.trigger('scroll.thb-animation');

            if (this_active.find('.thb-carousel')) {
               this_active.find('.thb-carousel').slick('setPosition');
            }

						_this.find('.vc_tta-panel-heading a').removeClass('active');

						that.addClass('active');

						return false;
					});
					if (active_section > 1 ) {
						_this.find('.vc_tta-panel-heading a').removeClass('active');
						_this.find('.vc_tta-panel-heading').eq(active_section-1).find('a').addClass('active');
						_this.find('.vc_tta-panel').removeClass('visible');
						_this.find('.vc_tta-panel').eq(active_section-1).addClass('visible');
					}
				});
			}
		},
    shareArticleDetail: {
			selector: '.social-button-holder, .thb-tweet-actions, .thb-post-bottom, .thb-share-product',
			init: function() {
				var base = this,
						container = $(base.selector),
						social = container.find('.social:not(.whatsapp):not(.social-email), .post-social-share:not(.whatsapp):not(.social-email)');

				social.on('click', function() {
					var left = (screen.width/2)-(640/2),
							top = (screen.height/2)-(440/2)-100;
					window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
					return false;
				});
			}
		},
    magnificInline: {
			selector: '.mfp-inline',
			init: function() {
				var base = this,
						container = $(base.selector);


				container.magnificPopup({
					type:'inline',
          tLoading: themeajax.l10n.lightbox_loading,
					mainClass: 'mfp-zoom-in',
          fixedBgPos: true,
          fixedContentPos: true,
					removalDelay: 400,
					closeBtnInside: true,
          closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
					callbacks: {
            close: function() {
              if (container.hasClass('newsletter-popup')) {
                Cookies.set('newsletter_popup', '1', { expires: parseInt(themeajax.settings.newsletter_length,10) });
              }
            }
					}
				});

			}
		},
		magnificGallery: {
			selector: '.mfp-gallery, .post-content .gallery, .post-content .wp-block-gallery',
			init: function(el) {
				var base = this,
						container = el ? el : $(base.selector),
            link_selector = 'a:not(.thb-pin-it)[href$=".png"],a:not(.thb-pin-it)[href$=".jpg"],a:not(.thb-pin-it)[href$=".jpeg"],a:not(.thb-pin-it)[href$=".gif"]';

				container.each(function() {
					if ( $(this).parents('.elementor-image-gallery').length ) {
						return;
					}
					$(this).magnificPopup({
						delegate: link_selector,
  					type: 'image',
            tLoading: themeajax.l10n.lightbox_loading,
  					mainClass: 'mfp-zoom-in',
  					removalDelay: 400,
  					fixedContentPos: false,
            closeBtnInside: false,
            closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
  					gallery: {
  						enabled: true,
  						arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% mfp-prevent-close">'+ themeajax.svg.prev_arrow +'</button>',
              tCounter: '<span class="mfp-counter">'+ themeajax.l10n.of +'</span>'
  					},
  					image: {
  						verticalFit: true,
  						titleSrc: function(item) {
  							return item.img.attr('alt');
  						}
  					},
  					callbacks: {
  						imageLoadComplete: function()  {
  							var _this = this;
  							_.delay( function() { _this.wrap.addClass('mfp-image-loaded'); }, 10);
  						},
  						beforeOpen: function() {
  					    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
  					  },
  					  open: function() {
  					  	$.magnificPopup.instance.next = function() {
  					  		var _this = this;
  								_this.wrap.removeClass('mfp-image-loaded');

  								setTimeout( function() { $.magnificPopup.proto.next.call(_this); }, 125);
  							};

  							$.magnificPopup.instance.prev = function() {
  								var _this = this;
  								this.wrap.removeClass('mfp-image-loaded');

  								setTimeout( function() { $.magnificPopup.proto.prev.call(_this); }, 125);
  							};
  					  }
  					}
  				});
        });

			}
		},
		magnificImage: {
			selector: '.mfp-image',
			init: function() {
				var base = this,
						container = $(base.selector),
            groups = [],
            groupNames = [],
            args = {
              type: 'image',
    					mainClass: 'mfp-zoom-in',
              tLoading: themeajax.l10n.lightbox_loading,
    					removalDelay: 400,
    					fixedContentPos: false,
              closeBtnInside: false,
              closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
    					callbacks: {
    						imageLoadComplete: function()  {
    							var _this = this;
    							_.delay( function() { _this.wrap.addClass('mfp-image-loaded'); }, 10);
    						},
    						beforeOpen: function() {
    							this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
    					  }
    					}
            },
            gallery_args = {
    					type: 'image',
              tLoading: themeajax.l10n.lightbox_loading,
    					mainClass: 'mfp-zoom-in',
    					removalDelay: 400,
    					fixedContentPos: false,
    					gallery: {
    						enabled: true,
    						arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir% mfp-prevent-close">'+ themeajax.svg.prev_arrow +'</button>',
                tCounter: '<span class="mfp-counter">'+ themeajax.l10n.of +'</span>'
    					},
    					image: {
    						verticalFit: true,
    						titleSrc: function(item) {
    							return item.img.attr('alt');
    						}
    					},
    					callbacks: {
    						imageLoadComplete: function()  {
    							var _this = this;
    							_.delay( function() { _this.wrap.addClass('mfp-image-loaded'); }, 10);
    						},
    						beforeOpen: function() {
    					    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
    					  },
    					  open: function() {
    					  	$.magnificPopup.instance.next = function() {
    					  		var _this = this;
    								_this.wrap.removeClass('mfp-image-loaded');

    								setTimeout( function() { $.magnificPopup.proto.next.call(_this); }, 125);
    							};

    							$.magnificPopup.instance.prev = function() {
    								var _this = this;
    								this.wrap.removeClass('mfp-image-loaded');

    								setTimeout( function() { $.magnificPopup.proto.prev.call(_this); }, 125);
    							};
    					  }
    					}
    				};

        container.each(function() {
          var _this = $(this),
              groupID = _this.data('thb-group');


          if (_this.parents('.blocks-gallery-item').length || _this.parents('.elementor-image-gallery').length) {
            return;
          }

          if (groupID && groupID !== '') {
            groupNames.push(groupID);
          } else {
            _this.magnificPopup(args);
          }
        });
        var uniq_groups = _.uniq(groupNames);
        $.each(uniq_groups, function(key, value) {
          groups.push($('.mfp-image[data-thb-group="'+value+'"]'));
        });
        if (uniq_groups.length) {
          $.each(groups,function(key, value) {
            var _gallery = value;
            _gallery.magnificPopup(gallery_args);
          });
        }

			}
		},
		magnificVideo: {
			selector: '.mfp-video',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.magnificPopup({
					type: 'iframe',
          tLoading: themeajax.l10n.lightbox_loading,
          closeBtnInside: false,
          closeMarkup: '<button title="%title%" class="mfp-close"><span>' + themeajax.svg.close_arrow + '</span></button>',
					mainClass: 'mfp-zoom-in',
					removalDelay: 400,
					fixedContentPos: true
				});

			}
		},
    retinaJS: {
			selector: 'img.retina_size:not(.retina_active)',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
          var _this = $(this);
					_this.attr('width', function() {
						var w = $(this).attr('width') / 2;
						return w;
					});
          if ( _this.attr('height') ) {
            _this.attr('height', function() {
  						var h = $(this).attr('height') / 2;
  						return h;
  					});
          }
          _this.addClass('retina_active');
				});
			}
		},
    postShortcodeLoadmore: {
			selector: '.thb-posts-loadmore',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each( function() {
					var _this = $(this),
              security = _this.data('security'),
					    load_more = $(_this.data('loadmore')),
					    thb_loading = false,
					    page = 2;

					load_more.on('click', function(){
						var loadmore = $(this),
								id = loadmore.data('posts-id'),
								text = loadmore.text(),
								pajax = ('thb_postsajax_'+ id),
								count = window[pajax].count,
								loop = window[pajax].loop,
								thb_style = window[pajax].thb_style,
								thb_columns = window[pajax].thb_columns,
								thb_date = window[pajax].thb_date,
								thb_cat = window[pajax].thb_cat,
								thb_excerpt = window[pajax].thb_excerpt;

						if(thb_loading === false) {
							loadmore.prop('title', themeajax.l10n.loading);
							loadmore.text(themeajax.l10n.loading).addClass('loading');
							thb_loading = true;
							$.ajax( themeajax.url, {
								method : 'POST',
								data : {
									action: 'thb_posts_ajax',
                  security: security,
									page: page++,
									loop: loop,
									thb_columns: thb_columns,
									thb_style: thb_style,
									thb_date: thb_date,
									thb_cat: thb_cat,
									thb_excerpt: thb_excerpt,
								},
								beforeSend: function() {
									thb_loading = true;
								},
								success : function(data) {
									var d = $.parseHTML($.trim(data)),
											l = d ? d.length : 0;

									if ( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
										loadmore.html(themeajax.l10n.nomore).removeClass('loading').off('click');
									} else {

										$(d).appendTo(_this).hide().imagesLoaded(function() {
											$(d).show();
											gsap.from($(d), { duration: 0.5, autoAlpha: 0, x: 0, y: 20, stagger: 0.15, onComplete: function() { thb_loading = false; } } );
										});

										if (l < count){
											loadmore.html(themeajax.l10n.nomore).removeClass('loading');
										} else {
											loadmore.html(text).removeClass('loading');
										}
									}
								}
							});
						}
						return false;
					});
				});
			}
		},
    paginationStyle2: {
			selector: '.pagination-style2',
			init: function() {
				var base = this,
						container = $(base.selector);

        container.each(function() {
          var _this = $(this),
              security = _this.data('security'),
              loadmore = $(_this.data('loadmore')),
							rand = _this.data('rand'),
							text = loadmore.text(),
							thb_endpoint = ('thb_postajax_'+rand),
							loop = window[thb_endpoint].loop,
							style = window[thb_endpoint].style,
							columns = window[thb_endpoint].columns,
							excerpts = window[thb_endpoint].excerpts,
							count = window[thb_endpoint].count,
              featured_index = window[thb_endpoint].featured_index,
              thb_i = window[thb_endpoint].thb_i,
              page = 2,
              thb_loading = false,
              action = 'thb_posts';

  				loadmore.on('click', function(){
  					var _loadmore = $(this),
  							text = _loadmore.text();

  					if (thb_loading === false) {
  						_loadmore.html(themeajax.l10n.loading).addClass('loading');

  						$.ajax( themeajax.url, {
  							method : 'POST',
  							data : {
                  action: action,
                  security: security,
                  count: count,
  								loop: loop,
  								columns: columns,
  								style: style,
  								excerpts: excerpts,
                  featured_index: featured_index,
                  thb_i: thb_i,
  								page: page ++
  							},
  							beforeSend: function() {
  								thb_loading = true;
  							},
  							success : function(data) {
  								var d = $.parseHTML($.trim(data)),
  										l = d ? d.length : 0;

  								if ( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
  									_loadmore.html(themeajax.l10n.nomore).removeClass('loading').off('click');
  								} else {

                    $(d).insertBefore(_loadmore.parents('.masonry_loader'));
                    gsap.fromTo($(d), { duration: 0.5, autoAlpha: 0, y: 20, stagger: 0.15 }, { autoAlpha: 1, y: 0 }, function() { thb_loading = false; });


                    win.trigger('resize.sticky-resize');
                    $(d).imagesLoaded(function() {
                      win.trigger('resize.sticky-resize');
                    });
                    if (_this.parents('.vc_tta-panel-body')) {
                      win.trigger('resize.tabs');
                    }
  									if (l < count){
  										_loadmore.html(themeajax.l10n.nomore).removeClass('loading');
  									} else {
  										_loadmore.html(text).removeClass('loading');
  									}
  								}
  							}
  						});
  					}
  					return false;
  				});
        });

			}
		},
		paginationStyle3: {
			selector: '.pagination-style3',
			init: function() {
				var base = this,
						container = $(base.selector);
        container.each(function() {
          var _this = $(this),
              security = _this.data('security'),
              loadmore = $(_this.data('loadmore')),
							rand = _this.data('rand'),
							text = loadmore.text(),
							thb_endpoint = ('thb_postajax_'+rand),
							loop = window[thb_endpoint].loop,
							style = window[thb_endpoint].style,
							columns = window[thb_endpoint].columns,
							excerpts = window[thb_endpoint].excerpts,
							count = window[thb_endpoint].count,
              featured_index = window[thb_endpoint].featured_index,
              thb_i = window[thb_endpoint].thb_i,
              page = 2,
              thb_loading = false,
              action = 'thb_posts',
              preloader = $('<div class="thb-preloader">'+themeajax.svg.preloader+'</div>');

          var scrollFunction = _.debounce(function(){
  					if ( (thb_loading === false ) && ( (win.scrollTop() + win.height() + 150) >= (container.offset().top + container.outerHeight()) ) ) {
  						$.ajax( themeajax.url, {
  							method : 'POST',
                data : {
                  action: action,
                  security: security,
                  count: count,
  								loop: loop,
  								columns: columns,
  								style: style,
  								excerpts: excerpts,
                  featured_index: featured_index,
                  thb_i: thb_i,
  								page: page ++
  							},
  							beforeSend: function() {
  								thb_loading = true;
                  preloader.appendTo(container);
  							},
  							success : function(data) {
                  var d = $.parseHTML($.trim(data)),
  										l = d ? d.length : 0;

  								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
  									win.off('scroll', scrollFunction);
  								} else {
                    _this.find('.thb-preloader').remove();
                    $(d).appendTo(_this);
                    gsap.fromTo($(d), { duration: 0.5, autoAlpha: 0, y: 20, stagger: 0.15 }, { autoAlpha: 1, y: 0 }, function() { thb_loading = false; });

                    win.trigger('resize.sticky-resize');
                    $(d).imagesLoaded(function() {
                      win.trigger('resize.sticky-resize');
                    });
  									if (l >= count) {
  										win.on('scroll', scrollFunction);
  									}
  								}
  							}
  						});
  					}
  				}, 30);

  				win.on('scroll', scrollFunction);
        });

			}
		},
    animation: {
			selector: '.animation, .thb-counter, .thb-iconbox, .thb-fadetype, .thb-slidetype, .thb-progressbar, .thb-autotype',
			init: function() {
				var base = this,
						container = $(base.selector);


				win.on('scroll.thb-animation', function(){
					base.control(container, true);
				}).trigger('scroll.thb-animation');
			},
			container: function(container) {
				var base = this,
						element = $(base.selector, container);

				base.control(element, false);
			},
			control: function(element, filter) {
				var t = 0,
						delay = 0.15,
						speed = 0.5,
						el = filter ? element.filter(':in-viewport') : element;

				el.each(function() {
					var _this = $(this),
							params = { autoAlpha: 1, x: 0, y: 0, z:0, rotationZ: '0deg', rotationX: '0deg', rotationY: '0deg', delay: t*delay };

					if ( _this.hasClass('thb-client') || _this.hasClass('thb-counter') || _this.hasClass('thb-iconlist-li')) {
						params.duration = 0.2;
						delay = 0.05;
					} else if ( _this.hasClass('thb-team-member') ) {
						params.duration = 0.4;
						delay = 0.1;
					} else {
					  params.duration = 0.5;
					  delay = 0.15;
					}

          if (_this.data('thb-animated') !== true ) {
            _this.data('thb-animated', true);
  					if (_this.hasClass('thb-iconbox')) {
  						SITE.iconbox.control(_this, t*delay);
  					} else if (_this.hasClass('thb-counter')) {
  						SITE.counter.control(_this, t*delay);
  					} else if (_this.hasClass('thb-autotype')) {
  						SITE.autoType.control(_this, t*delay);
  					} else if (_this.hasClass('thb-fadetype')) {
  						SITE.fadeType.control(_this, t*delay);
  					} else if (_this.hasClass('thb-slidetype')) {
  						SITE.slideType.control(_this, t*delay);
  					} else if (_this.hasClass('thb-progressbar')) {
  						SITE.progressBar.control(_this, t*delay);
  					} else {
  						if (_this.hasClass('scale')) {
  							params.scale = 1;
  						}
  						gsap.to(_this, params);
  					}
					  t++;
          }
				});
			}
		},
		autoType: {
			selector: '.thb-autotype',
			control: function(container, delay, skip) {
				if ( ( container.data('thb-in-viewport') === undefined ) || skip) {
					container.data('thb-in-viewport', true);

					var _this = container,
							entry = _this.find('.thb-autotype-entry'),
							strings = entry.data('strings'),
							speed = entry.data('speed') ? entry.data('speed') : 50,
							loop = entry.data('thb-loop') === 1 ? true : false,
							cursor = entry.data('thb-cursor') === 1 ? true : false;

					entry.typed({
						strings: strings,
						loop: loop,
						showCursor: cursor,
						cursorChar: '|',
						contentType: 'html',
						typeSpeed: speed,
						backDelay: 1000,
					});
				}
			}
		},
		fadeType: {
			selector: '.thb-fadetype',
			control: function(container, delay, skip) {
				if( ( container.data('thb-in-viewport') === undefined ) || skip) {
					container.data('thb-in-viewport', true);
					var split = new SplitText(
                $('.thb-fadetype-entry', container),
                {
                  type:"chars"
                }
              ),
							tl = gsap.timeline({
                onComplete: function() {
                  split.revert();
                }
              }),
              args = {};

          tl
						.set(container, { visibility:"visible"} );
          if (container.hasClass('thb-fadetype-style1')) {

            args = {
              duration: 0.25,
						  autoAlpha: 0,
						  y: 10,
						  rotationX: '-90deg',
						  delay: delay,
              stagger: 0.05
						};
            tl.from( split.chars, args);
          } else if (container.hasClass('thb-fadetype-style2')) {
            for (var t = split.chars.length, n = 0; n < t; n++) {
             var i = split.chars[n],
                 r = 0.5 * Math.random();
             tl
              .from(i, { duration: 2, opacity: 0, ease: Linear.easeNone }, r)
              .from(i, { duration: 2, yPercent: -50, ease: Expo.easeOut }, r);
            }
          }
				}
			}
		},
		progressBar: {
			selector: '.thb-progressbar',
			control: function(container, delay, skip) {
				if( ( container.data('thb-in-viewport') === undefined ) || skip) {
					var progress = container.find('.thb-progress'),
							value = progress.data('progress');

					var tl = gsap.timeline();

					tl
						.to(container, { duration: 0.6, autoAlpha: 1, delay: delay })
						.to(progress.find('span'), { duration: 1, scaleX: value/100 });

				}
			}
		},
		slideType: {
			selector: '.thb-slidetype',
			control: function(container, delay, skip) {
				if( ( container.data('thb-in-viewport') === undefined ) || skip) {
					container.data('thb-in-viewport', true);
					var style = container.data('style'),
              split,
							tl = gsap.timeline({
                onComplete: function() {
                  if ( style !== 'style1' ) {
    								split.revert();
    							}
                }
              }),
							animated_split,
							dur = 0.25,
							stagger = 0.05;

					if (style === 'style1') {
						animated_split = container.find('.thb-slidetype-entry .lines');
						dur = 0.65;
						stagger = 0.15;
					} else if (style === 'style2') {
						split = new SplitText(container.find('.thb-slidetype-entry'), { type: 'words' });
						animated_split = split.words;
						dur = 0.65;
						stagger = 0.15;
					} else if (style === 'style3') {
						split = new SplitText(container.find('.thb-slidetype-entry'), { type: 'chars' });
						animated_split = split.chars;
					}

					tl
						.set(container, {visibility:"visible"})
						.from(animated_split, {
              duration: dur,
						  y: '200%',
						  delay: delay,
              stagger: stagger
						},'+=0');

				}
			}
		},
    counter: {
			selector: '.thb-counter',
			control: function(container, delay) {
				if ( container.data('thb-in-viewport') === undefined ) {
					container.data('thb-in-viewport', true);

					var _this = container,
							el = _this.find('.h1:not(.counter-text), .counter:not(.counter-text)').eq(0),
							counter = el[0],
							count = el.data('count'),
							speed = el.data('speed'),
							separator = _this.data('separator'),
							params = {
								el: counter,
								value: 0,
								duration: speed,
								theme: 'minimal'
							};

					if (_this.hasClass('single-decimal')) {
						params.format = '(,ddd).d';
					} else if (!separator || separator === '') {
						params.format = '';
					}
					var od = new Odometer(params);

					gsap.set(_this, { visibility: 'visible' });
					setTimeout(function(){
						od.update(count);
					}, delay);
				}
			}
		},
    hotspot: {
			selector: '.thb-hotspot-container',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
							hotspots = _this.find('.thb-hotspot'),
							func = _this.hasClass('hover') ? 'hover mouseenter ontouchstart' : 'click ontouchstart',
							target = _this.parents('.thb-hotspot-wrapper').find('.thb-carousel');

					hotspots.on( func, function() {
						var i = $(this).index() - 1;
						target.slick( 'slickGoTo', i );
					});

				});
			}
		},
    iconbox: {
			selector: '.thb-iconbox',
			control: function(container, delay) {
				if( container.data('thb-in-viewport') === undefined && !container.hasClass('animation-off')) {
					container.data('thb-in-viewport', true);

					var _this = container,
							animation_speed = _this.data('animation_speed') !== '' ? _this.data('animation_speed') : 1.5,
							svg = _this.find('svg'),
							img = _this.find('img:not(.thb_image_hover)'),
							el = svg.find('path, circle, rect, ellipse'),
							h = _this.find('h5'),
							p = _this.find('p'),
							line = _this.find('.thb-iconbox-line'),
							dot = _this.find('.thb-iconbox-line em'),
							tl = gsap.timeline({
								delay: delay,
								paused: true,
								clearProps: 'all'
							}),
							all = [];
              if (h.length) {
                all.push(h);
              }
              if (p.length) {
                all.push(p);
              }
              if (img.length) {
                all.push(img);
              }
							if ( !( _this.hasClass('left') || _this.hasClass('right') ) ) {
                if (_this.find('.thb-read-more').length) {
                  all.push(_this.find('.thb-read-more'));
                }
							}
					tl
						.set( _this, { visibility: 'visible' })
						.set( svg, { visibility: 'visible' })
						.from( el, { duration: animation_speed, drawSVG: "0%"}, "s")
						.fromTo( all, { duration: (animation_speed / 2), autoAlpha: 0, y: '20px', stagger: 0.1 }, { autoAlpha: 1, y: '0px'});

					if (dot.length) {
						tl
							.to(dot, { duration: (animation_speed / 2), scale: '1' });
					}

					if (line.length) {
						tl
							.to(line, { duration: (animation_speed / 2), scaleX: '1' });
					}

					tl.play();
				}
			}
		},
    productQuickView: {
			selector: '.thb-quick-view',
			init: function() {
				var base = this,
						container = $(base.selector),
            thb_qw_loading = false,
            ajax_url = window.wc_add_to_cart_params ? wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'thb_product_quickview' ) : themeajax.url,
            quickview_wrapper = $('.thb-quickview-wrapper', body),
            close = $('.thb-close', quickview_wrapper),
            quickview_tl = gsap.timeline(
              {
                paused: true,
                onStart: function() {
                  wrapper.addClass('open-cc');
                },
                onComplete: function() {
                  SITE.thb_scrolls.quickview_scroll.update();
                },
                onReverseComplete: function() {
                  wrapper.removeClass('open-cc');
                  gsap.set(quickview_wrapper, {clearProps: "transform"});
                }
              });

        quickview_tl
          .set( quickview_wrapper, { display: 'block' }, "start" )
          .to( cc, { duration: 0.3, autoAlpha: 1 }, "start" )
          .to( quickview_wrapper, { duration: 0.3, x: '0%' }, "start" );

        cc.add(close).on('click', function() {
          quickview_tl.reverse();
        });
        $doc.keyup(function(e) {
		      if (e.keyCode === 27) {
		        quickview_tl.reverse();
		      }
		    });
        container.on( 'click', function( e ) {
          var _this = $(this),
              id = _this.data('id');

          if (thb_qw_loading === false) {
            $.ajax( ajax_url, {
  						method: 'POST',
              headers: {
                "cache-control": "no-cache",
              },
  						data: {
                product_id: id,
                action: 'thb_product_quickview',
                security: themeajax.nonce.product_quickview
              },
  						beforeSend: function() {
                thb_qw_loading = true;
                quickview_wrapper.find('.thb-quickview-content').empty();
  							_this.addClass('thb-loading');
  						},
              success: function( response ) {
                var parsed_data = response.data;
                quickview_wrapper.find('.thb-quickview-content').html(parsed_data);
                quickview_tl.add(
                  gsap.to($('.thb-quickview-close'), { duration: 0.3, scale:1 }), "start+=0.2"
                );
                if ( $( '.variations_form', quickview_wrapper ) ) {
                  $( '.variations_form', quickview_wrapper ).wc_variation_form();
                }

								if ( body.hasClass('thb-quantity-style2') || body.hasClass('thb-quantity-style1')) {
									SITE.quantity.initialize();
								}

                SITE.variations.init();
                SITE.swatches.init();
                SITE.custom_scroll.init();
                quickview_tl.restart();
                thb_qw_loading = false;
                _this.removeClass('thb-loading');
              }
            });
          }
          return false;
        });
			}
		},
		wpml: {
			selector: '.thb-language-switcher-select',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on('change', function () {
					var url = $(this).val(); // get selected value
					if (url) { // require a URL
						window.location = url; // redirect
					}
					return false;
				});
			}
		},
		wpmlCurrencyMobile: {
			selector: '.thb-currency-switcher-select',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on('change', function () {
					var cur = $(this).val(); // get selected value
					if (cur && typeof wcml_load_currency !== "undefined") {
						wcml_load_currency(cur);
					}
					return false;
				});
			}
		},
    loginForm: {
			selector: '.thb-overflow-container',
			init: function() {
				var base = this,
						container = $(base.selector),
						ul = $('ul', container),
						links = $('a', ul);

				links.on('click', function() {
					var _this = $(this);
					if (!_this.hasClass('active')) {
						links.removeClass('active');
						_this.addClass('active');

						$('.thb-form-container', container).toggleClass('register-active');
					}
					return false;
				});
			}
		},
    productAjaxAddtoCart: {
			selector: '.thb-single-product-ajax-on.single-product .product-type-variable form.cart, .thb-single-product-ajax-on.single-product .product-type-simple form.cart',
			init: function() {
				var base = this,
						container = $(base.selector),
						btn = $('.single_add_to_cart_button', container);

				if ( typeof wc_add_to_cart_params !== 'undefined' ) {
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						return;
					}
				}
				if ( btn.hasClass('somdn-download-button') ) {
					return;
				}
				$doc.on('submit', 'body.single-product form.cart', function(e){
					e.preventDefault();
					var _this = $(this),
							btn_text = btn.eq(0).text();

					if (btn.is('.disabled') || btn.is('.wc-variation-selection-needed')) {
						return;
					}

					var	data = {
						product_id:	_this.find("[name*='add-to-cart']").val(),
						product_variation_data: _this.serialize()
					};

					$.ajax({
						method: 'POST',
						data: data.product_variation_data,
						dataType: 'html',
						url: wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add-to-cart=' + data.product_id + '&thb-ajax-add-to-cart=1' ),
						cache: false,
						headers: {'cache-control': 'no-cache'},
						beforeSend: function() {
							body.trigger( 'adding_to_cart' );
							btn.addClass('disabled').text(themeajax.l10n.adding_to_cart);
						},
						success: function( data ) {
							var parsed_data = $.parseHTML(data);

							var thb_fragments = {
								'.thb-cart-amount': $(parsed_data).find('.thb-cart-amount').html(),
								'.thb-cart-count': $(parsed_data).find('.thb-cart-count').html(),
								'.thb_prod_ajax_to_cart_notices': $(parsed_data).find('.thb_prod_ajax_to_cart_notices').html(),
								'.widget_shopping_cart_content': $(parsed_data).find('.widget_shopping_cart_content').html()
							};

							$.each( thb_fragments, function( key, value ) {
								$( key ).html(value);
							});
							body.trigger( 'wc_fragments_refreshed' );
							btn.removeClass('disabled').text(btn_text);
						},
						error: function( response ) {
							body.trigger( 'wc_fragments_ajax_error' );
							btn.removeClass('disabled').text(btn_text);
						}
					});
				});
			}
		},
    productStyle3: {
			selector: '.thb-product-style3',
			init: function() {
				var base = this,
			      container = $(base.selector),
            thumbnail_container = $( '.product-thumbnails', container ),
            thumbnails = $( '.woocommerce-product-gallery__image', thumbnail_container ),
            image_container = $( '.product-images', container ),
            images = $( '.woocommerce-product-gallery__image', image_container ),
            ah = $('#wpadminbar').outerHeight() || 0;

        win.on( 'scroll.product-scroll', function(){
          images.each( function() {
            var _this = $(this),
                i = image_container.find( '.woocommerce-product-gallery__image').index(_this);
            if ( ! thumbnail_container.is(':visible') ) {
              return;
            }
            if ( _this.offset().top - win.scrollTop() < 0 + ah ) {
              thumbnails.removeClass('active');
              if ( ! thumbnails.eq(i).hasClass('active')) {
                thumbnails.eq(i).addClass('active');
              }
            } else {
              if ( thumbnails.eq(i).hasClass('active')) {
                thumbnails.eq(i).removeClass('active');
              }
            }
          });
        }).trigger( 'scroll.product-scroll' );

        thumbnails.on( 'click', function() {
          var _this = $(this),
              i = _this.index(),
              to_scroll = image_container.find( '.woocommerce-product-gallery__image').eq(i).offset().top - ah + 1;

          gsap.to(win, { duration: 1, scrollTo: { y: to_scroll, autoKill:false } });
          return false;
        });
      }
    },
    variations: {
			selector: 'form.variations_form',
			init: function() {
				var base = this,
    				container = $(base.selector),
    				slider = $('#product-images'),
    				thumbnails = $('#product-thumbnails'),
    				org_image_wrapper = $('.first', slider ),
    				org_image = $('img', org_image_wrapper),
    				org_link = $('a', org_image_wrapper),
    				org_image_link = org_link.attr('href'),
    				org_image_src = org_image.attr('src'),
    				org_thumb = $('.first img', thumbnails),
    				org_thumb_src = org_thumb.attr('src'),
    				price_container = $('p.price', '.product-information').eq(0),
    				org_price = price_container.html();

				container.on( 'show_variation', function( e, variation ) {
          if ( variation.price_html ) {
  					price_container.html(variation.price_html);
          }

          if ( ! slider.length ) {
            return;
          }
					if (variation.hasOwnProperty("image") && variation.image.src) {
						org_image.attr("src", variation.image.src).attr("srcset", "");
						org_thumb.attr("src", variation.image.thumb_src).attr("srcset", "");
						org_link.attr("href", variation.image.full_src);

						if (slider.hasClass('slick-initialized')) {
							slider.slick('slickGoTo', 0);
						}
						if ( typeof wc_single_product_params !== 'undefined' ) {
							if (wc_single_product_params.zoom_enabled === '1') {
								  org_image.attr("data-src", variation.image.full_src);
							}
						}
					}
				}).on('reset_image', function () {
					price_container.html(org_price);
          if ( ! slider.length ) {
            return;
          }
					org_image.attr("src", org_image_src).attr("srcset", "");
					org_thumb.attr("src", org_thumb_src).attr("srcset", "");
					org_link.attr("href", org_image_link);

					if ( typeof wc_single_product_params !== 'undefined' ) {
						if (wc_single_product_params.zoom_enabled === '1') {
							org_image.attr("data-src", org_image_src);
						}
					}
				});
        if ( container.find('.single_variation').is(':visible')) {
          if (container.find('.single_variation .woocommerce-variation-price').html()) {
            price_container.html(container.find('.single_variation .woocommerce-variation-price').html());
          }
        }
			}
		},
		multiple_errors: {
			selector: '.woocommerce-notices-wrapper',
			elements: '.woocommerce-message, .woocommerce-info, .woocommerce-success, .woocommerce-error',
			init: function() {
				var base = this,
						parent = $(base.selector),
						set_top = function() {
							var container = $(base.elements, base.selector).last(),
									prev_el = container.prevAll(base.elements);
							if ( prev_el.length ) {
								container.css({
									'top': function() {
										var top = container[0].getBoundingClientRect().top;
										return top + prev_el.outerHeight() + 10 + 'px';
									}
								});
							}
						};
				body.on( 'updated_cart_totals', set_top );
			}
		},
    swatches: {
			selector: '.thb-swatches',
			init: function() {
				var base = this,
						container = $(base.selector),
						form = $('form.variations_form');

				container.each(function() {
					var _this = $(this),
							attr = _this.data('attribute_name');

          if (_this.data('thb-active')) {
            return;
          } else {
            _this.data('thb-active', true );
          }

					if ( _this.parents('.thb-product-detail').length ) {
            var label = _this.parents('tr').find('label');

            label.append(': <span class="thb_variation_text" />');
						_this.on( 'click', '.thb-swatch', function ( e ) {
							var swatch = $(this),
									value  = swatch.data('value');

              if ( swatch.siblings( '.thb-swatch' ).hasClass('selected') ) {
								swatch.siblings( '.thb-swatch' ).removeClass('selected');
							}

							$('select[name='+attr+']', form).val(value).change();
							swatch.toggleClass( 'selected' );
              if (swatch.hasClass('selected')) {
                label.find('.thb_variation_text').text(swatch.attr('title'));
              } else {
                label.find('.thb_variation_text').empty();
              }
							e.preventDefault();
						});
						if (_this.find('.thb-swatch.selected').length) {
							label.find('.thb_variation_text').text(_this.find('.thb-swatch.selected').attr('title'));
						}
						form.on('update_variation_values.wc-variation-form', function() {
							$('.thb-swatch', _this).each(function() {
								var swatch_value = $(this).data('value');
								if ( ! $('select[name='+attr+'] option[value='+swatch_value+']', form).length ) {
									$('.thb-swatch[data-value='+swatch_value+']').addClass('disabled');
								} else {
									$('.thb-swatch[data-value='+swatch_value+']').removeClass('disabled');
								}
							});
						});
					} else if ( _this.parents('.product').length ) {
						var parent     = _this.parents('.product'),
								org_image  = parent.find('.thb-product-image-link>img').attr('src'),
								org_srcset = parent.find('.thb-product-image-link>img').attr('srcset');

						if ( org_image === 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==' ) {
              org_image = parent.find('.thb-product-image-link>img').attr('data-src');
            }
						_this.on( 'mouseenter ontouchstart', '.thb-swatch', function ( e ) {
							var swatch = $(this),
									data = swatch.data('variation');

							if (data.image_src) {
								parent.find('.thb-product-image-link>img').attr('src', data.image_src);
								parent.find('.thb-product-image-link>img').attr('srcset', '');
							}
						}).on( 'mouseleave ontouchend', '.thb-swatch', function ( e ) {
							parent.find('.thb-product-image-link>img').attr('src', org_image);
							parent.find('.thb-product-image-link>img').attr('srcset', org_srcset);
						});
					}
				});
				form.on( 'reset_data', function() {
					container.find('.thb-swatch').removeClass('selected');
				});
			}
		},
		addtocart_quantity: {
			selector: '.thb-addtocart-with-quantity',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.find('.qty').on('change', function() {
					$(this).parents('.thb-addtocart-with-quantity').find('.button').attr('data-quantity', $(this).val());
				});
			}
		},
    quantity: {
			selector: '.thb-quantity-style2 .quantity:not(.hidden), .thb-quantity-style1 .quantity:not(.hidden)',
			init: function() {
				var base = this,
						container = $(base.selector);

				base.initialize();
				body.on( 'updated_cart_totals', function(){
					base.initialize();
          if (lazySizes) {
            lazySizes.loader.checkElems();
          }
				});
			},
			initialize: function() {

				var qty = $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' );

				qty.each(function() {
					var _this = $(this);

					_this.addClass( 'buttons_added' ).append( '<div class="plus"></div>' ).prepend( '<div class="minus"></div>' ).end().find('input[type="number"]').attr('type', 'text');

					$('.plus, .minus', _this).on('click', function() {
						// Get values
						var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
								currentVal	= parseFloat( $qty.val() ),
								max			= parseFloat( $qty.attr( 'max' ) ),
								min			= parseFloat( $qty.attr( 'min' ) ),
								step		= $qty.attr( 'step' );

						// Format values
						if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) { currentVal = 0; }
						if ( max === '' || max === 'NaN' ) { max = ''; }
						if ( min === '' || min === 'NaN' ) { min = 0; }
						if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) { step = 1; }

						// Change the value
						if ( $( this ).is( '.plus' ) ) {

							if ( max && ( max === currentVal || currentVal > max ) ) {
								$qty.val( max );
							} else {
								$qty.val( currentVal + parseFloat( step ) );
							}

						} else {

							if ( min && ( min === currentVal || currentVal < min ) ) {
								$qty.val( min );
							} else if ( currentVal > 0 ) {
								$qty.val( currentVal - parseFloat( step ) );
							}

						}
						// Trigger change event
						$qty.trigger( 'change' );
						return false;
					});
				});

			}
		},
    sticky_addtocart: {
			selector: '.thb-product-sticky',
			init: function() {
        var base = this,
            container = $(base.selector),
            button = $('.single_add_to_cart_button', container);
				win.on('scroll',_.debounce(function(){
          if (thb_md.mobile() || win.width() < 1068) {
            return;
          }
					base.control();
				}, 10));
        if ( button.hasClass('thb-select-options') ) {
          button.on('click', function() {
            var to_check = $( 'form.cart', $('.thb-product-detail').eq(0)),
                top = to_check.offset().top - 100;
            gsap.to( win, { duration: 0.5, scrollTo: { y: top, autoKill: false } } );
  					return false;
          });
        }
			},
			control: function() {
				var to_check = $( 'form.cart', $('.thb-product-detail').eq(0)),
            top = to_check.offset().top - win.scrollTop(),
            footer_top = $('.footer').offset().top - 75 - (win.scrollTop() + win.outerHeight());

				if ( top < 200 && footer_top > 0) {
          if ( ! body.hasClass('thb-sticky-active') ) {
            body.addClass('thb-sticky-active');
          }
				} else if ( footer_top < 1 && body.hasClass('thb-sticky-active') ) {
					body.removeClass('thb-sticky-active');
				} else if ( body.hasClass('thb-sticky-active') ) {
					body.removeClass('thb-sticky-active');
				}
			}
		},
		addToCartTouch: {
			selector: '.add_to_cart_button, .single_add_to_cart_button',
			init: function() {
				if ( ! ('ontouchstart' in document.documentElement)) {
					return;
				}
				var base = this,
						container = $(base.selector),
						touchStarted = true,
						currX = 0,
				    currY = 0,
				    cachedX = 0,
				    cachedY = 0,
						getPointerEvent = function(event) {
							return event.originalEvent.targetTouches ? event.originalEvent.targetTouches[0] : event;
						};

				container.on('touchstart', function(e) {

			    var _this = $(this),
							pointer = getPointerEvent(e);
			    cachedX = currX = pointer.pageX;
			    cachedY = currY = pointer.pageY;
			    touchStarted = true;

					setTimeout(function (){
						// Check if tap.
		        if ((cachedX === currX) && !touchStarted && (cachedY === currY)) {
		        	_this.trigger('click');
		        }
			    },200);

				}).on('touchend touchcancel',function (e){
				    e.preventDefault();

				    touchStarted = false;
				});
			}
		},
    shop: {
			selector: '.products .product, .wc-block-grid__products .product',
			init: function() {
				var base = this,
						container = $(base.selector),
            product,
            text;

        $('body')
          .on( 'adding_to_cart', function( e, $button ) {
            if ( ! $button ) {
              return;
            }
            product = $button.closest('.product');
            text    = $button.text();
            if ( product.hasClass( 'thb-listing-button-style3' ) || product.hasClass( 'thb-listing-button-style5' ) ) {
              text    = $button.find('.thb-icon-text').text();
              $button.find('.thb-icon-text').text( themeajax.l10n.adding_to_cart );
            } else {
              $button.text( themeajax.l10n.adding_to_cart );
            }

          })
  				.on( 'added_to_cart', function( e, fragments, cart_hash, $button) {
            if ( $button ) {
              if ( product.hasClass( 'thb-listing-button-style3' ) || product.hasClass( 'thb-listing-button-style5' ) ) {
                $button.find('.thb-icon-text').text(text);
              } else {
                $button.text(text);
              }
            }
            var product_title = product.find('.woocommerce-loop-product__title a').text();

            $('.thb-woocommerce-notices-wrapper').html('<div class="thb-temp-message">' + product_title + ' ' + themeajax.l10n.has_been_added + '</div>');
  				})
          .on( 'wc_fragments_refreshed added_to_cart', function() {
            if ( lazySizes ) {
              lazySizes.loader.checkElems();
            }
  				});
			}
		},
    newsletter: {
			selector: '.newsletter-form:not(.thb-active)',
			init: function() {
				var base = this,
					  container = $(base.selector),
            mc_enabled = themeajax.settings.newsletter_mailchimp,
            selected_action = mc_enabled ? 'thb_subscribe_mailchimp' : 'thb_subscribe_emails';

        container.each(function() {
          var _this = $(this),
              security = _this.data('security'),
              args = {
                security: security,
                action: selected_action,
                privacy: false
              };
          _this.addClass('thb-active');
          _this.on('submit', function() {
            if (_this.next('.thb-checkbox').length) {
              args.privacy = true;
              args.checked = _this.next('.thb-checkbox').find('.thb-newsletter-privacy').is(':checked');
            }
            args.email = _this.find('.widget_subscribe').val();
            $.ajax( themeajax.url, {
              method: 'POST',
              data: args,
              beforeSend: function() {
                _this.addClass('thb-loading');
              },
              success: function(data) {
                var d = $.parseHTML($.trim(data));
                _this.removeClass('thb-loading');
    						$(d).appendTo(body);
                _.delay(function() { $(d).remove();}, 8000);
              }
            });
  					return false;
  				});
        });

			}
		},
    widget_nav_menu: {
			selector: '.widget_nav_menu, .widget_pages, .widget_product_categories',
			init: function() {
				var base = this,
						container = $(base.selector),
            items = container.find('.menu-item-has-children, .page_item_has_children, .cat-parent' );

        items.each( function() {
          var _this = $(this),
              link = $('>a', _this ),
              menu = _this.find('>.sub-menu, >.children');

    			menu.before( '<div class="thb-arrow"><i class="thb-icon-down-open-mini"></i></div>' );

    			$( '.thb-arrow', _this ).on('click', function(e) {
  					var that = $(this),
                parent = that.parents('li');

  					if (parent.hasClass('active')) {
  						parent.removeClass('active');
  						menu.slideUp('200');
  					} else {
  						parent.addClass('active');
  						menu.slideDown('200');
  					}
  					e.stopPropagation();
  					e.preventDefault();
    			});
    			if ( link.attr( 'href' ) === '#' ) {
    				link.on('click', function( e ) {
              var that = $(this),
                  menu = that.next('.sub-menu');
              if (that.hasClass('active')) {
    						that.removeClass('active');
    						menu.slideUp('200');
    					} else {
    						that.addClass('active');
    						menu.slideDown('200');
    					}
    					e.preventDefault();
    				});
    			}
    		});
      }
    },
    pricingStyle2: {
			selector: '.thb-pricing-table.style2',
			init: function(el) {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var _this = $(this),
					    columns = $('.pricing-container', _this),
					    highlight = $('.pricing-style2-highlight', _this),
					    highlight_init = highlight.parents('.pricing-container');

					if ( ! highlight.length ) {
						return;
					}
					function moveHighlight(el) {
						var hover = el;

						gsap.set( highlight, {
							'left': hover.position().left,
							'width': hover.outerWidth(),
							'height': hover.parents('.thb-pricing-column').outerHeight(),
							'top': hover.position().top,
						});
					}

					columns.on('mouseenter',function() {
						moveHighlight($(this));
					}).on('mouseleave', function() {
						moveHighlight(highlight_init);
					});

					win.on('resize.move_highlight', function() {
						moveHighlight(highlight_init);
					}).trigger('resize.move_highlight');
					_this.addClass('active');
				});

			}
		},
    toBottom: {
			selector: '.scroll-bottom',
			init: function() {
				var base = this,
						container = $(base.selector);

        var fixed_height = $('.header>.row').outerHeight() + ( parseInt(themeajax.settings.fixed_header_padding.top, 10) || 0) + ( parseInt(themeajax.settings.fixed_header_padding.bottom, 10) || 0 );

				container.each(function() {
					var _this = $(this);

					_this.on('click', function(){
						var p = _this.parents('.post-gallery').length ? _this.parents('.post-gallery') : _this.closest('.row'),
								h = p.outerHeight(),
								ah = $('#wpadminbar').outerHeight() || 0,
								finalScroll = p.offset().top + h;

						finalScroll -= ah;

						gsap.to( win, { duration: 1, scrollTo: { y: finalScroll, autoKill: false } } );
						return false;
					});
				});
			}
		},
    toTop: {
			selector: '#scroll_to_top',
			init: function() {
				var base = this,
					container = $(base.selector);

				container.on('click', function(){
					gsap.to(win, { duration: 1, scrollTo: { y:0, autoKill:false } });
					return false;
				});
				win.on('scroll',_.debounce(function(){
					base.control();
				}, 20));
			},
			control: function() {
				var base = this,
						container = $(base.selector);

				if (win.scrollTop() > 200) {
					container.addClass('active');
				} else {
					container.removeClass('active');
				}
			}
		},
    contactMap: {
			selector: '.contact_map:not(.disabled)',
			init: function() {
				var base = this,
					container = $(base.selector);


				container.each(function() {
					var _this = $(this),
						mapzoom = _this.data('map-zoom'),
						mapstyle = _this.data('map-style'),
						mapType = _this.data('map-type'),
						panControl = _this.data('pan-control'),
						zoomControl = _this.data('zoom-control'),
						mapTypeControl = _this.data('maptype-control'),
						scaleControl = _this.data('scale-control'),
						streetViewControl = _this.data('streetview-control'),
						locations = _this.find('.thb-location'),
						expand = _this.next('.thb-expand'),
						tw = _this.width(),
						once,
						map;

					var bounds = new google.maps.LatLngBounds();

					var mapOptions = {
						styles: mapstyle,
						zoom: mapzoom,
						draggable: !("ontouchend" in document),
						scrollwheel: false,
						panControl: panControl,
						zoomControl: zoomControl,
						mapTypeControl: mapTypeControl,
						scaleControl: scaleControl,
						streetViewControl: streetViewControl,
						fullscreenControl: false,
						mapTypeId: mapType,
            gestureHandling: 'cooperative'
					};

					if (expand) {
						expand.on('click',function() {
							var w = _this.parents('.row').width(),
                  btn = $(this);

              if ( ! btn.data('clicked') ) {
                _this.parents('.contact_map_parent').css('overflow', 'visible');
  							gsap.to(_this, { duration: 1, width: w, onUpdate: function() {
  									google.maps.event.trigger(map, 'resize');
  									map.setCenter(bounds.getCenter());
  								}
  							});
                btn.data('clicked', true);
              } else {
                gsap.to(_this, { duration: 1, width: tw, onUpdate: function() {
  									google.maps.event.trigger(map, 'resize');
  									map.setCenter(bounds.getCenter());
  								}, onComplete: function() {
  									_this.parents('.contact_map_parent').css('overflow', 'hidden');
  								}
  							});
                btn.data('clicked', false );
              }

							return false;
						});
					}
					// Render Map
					map = new google.maps.Map(_this[0], mapOptions);

					// Render Marker
					function thb_renderMarker(i, location) {
						var options = location.data('option'),
								lat = options.latitude,
								long = options.longitude,
								latlng = new google.maps.LatLng(lat, long),
								marker = options.marker_image,
								marker_size = options.marker_size,
								retina = options.retina_marker,
								title = options.marker_title,
								desc = options.marker_description,
								pinimageLoad = new Image();

						bounds.extend(latlng);

						pinimageLoad.src = marker;

						location.data('rendered', true);

						$(pinimageLoad).on('load', function(){
							base.setMarkers(i, map, latlng, marker, marker_size, title, desc, retina);
						});
					}

					locations.each(function(i) {
						var location = $(this);
						thb_renderMarker(i, location);
					});


					// On Tiles Loaded
					google.maps.event.addListenerOnce(map,'tilesloaded', function() {

						if( mapzoom > 0 ) {
							map.setCenter(bounds.getCenter());
							map.setZoom(mapzoom);
						} else {
							map.setCenter(bounds.getCenter());
							map.fitBounds(bounds);
						}

					});
					win.on('resize.google_map', _.debounce(function(){
						map.setCenter(bounds.getCenter());
					}, 50) ).trigger('resize.google_map');

				});
			},
			setMarkers: function(i, map, latlng, marker, marker_size, title, desc, retina) {
				// info windows
				var contentString = '<h3>'+title+'</h3>'+'<div>'+desc+'</div>',
						infowindow = new google.maps.InfoWindow({
							content: contentString
						});

				if ( retina ) {
					marker_size[0] = marker_size[0]/2;
					marker_size[1] = marker_size[1]/2;
				}

				function CustomMarker(latlng,  map) {
				  this.latlng = latlng;
				  this.setMap(map);
				}

				CustomMarker.prototype = new google.maps.OverlayView();

				CustomMarker.prototype.draw = function() {
				    var self = this;
				    var div = this.div_;
				    if (!div) {
							div = this.div_ = $('' +
							    '<div class="thb_pin">' +
							    	'<div class="pulse"></div>' +
							    	'<div class="shadow"></div>' +
							    	'<div class="pin-wrap"><img src="'+marker+'" width="'+marker_size[0]+'" height="'+marker_size[1]+'"/></div>' +
							    '</div>' +
							    '');
							this.pinShadow = this.div_.find('.shadow');
							this.pulse = this.div_.find('.pulse');
							this.div_[0].style.position = 'absolute';
							this.div_[0].style.cursor = 'pointer';

							var panes = this.getPanes();
							panes.overlayImage.appendChild(this.div_[0]);

							google.maps.event.addDomListener(div[0], "click", function(event) {
								infowindow.setPosition(latlng);
								infowindow.open(map);
							});

				    }

				    var point = this.getProjection().fromLatLngToDivPixel(latlng);

				    if (point) {
				    	var shadow_offset = ((marker_size[0] - 40) / 2);

			        this.div_[0].style.left = point.x - (marker_size[0] / 2) + 'px';
			        this.div_[0].style.top = point.y - (marker_size[1] / 2) + 'px';
			        this.div_[0].style.width = marker_size[0] + 'px';
			        this.div_[0].style.height = marker_size[1] + 'px';
			        this.pinShadow[0].style.marginLeft = shadow_offset + 'px';
			        this.pulse[0].style.marginLeft = shadow_offset + 'px';
				    }


				};
				CustomMarker.prototype.remove = function() {
					if (this.div_) {
						this.div_.parentNode.removeChild(this.div_);
						this.div_ = null;
					}
				};

				CustomMarker.prototype.getPosition = function() {
					return this.latlng;
				};

				var g_marker = new CustomMarker(latlng, map);
			}
		},
    right_click: {
			selector: '.right-click-on',
			init: function() {
				var target = $('#right_click_content'),
						clickMain = gsap.timeline({ paused: true, onStart: function() { target.css('display', 'flex'); }, onReverseComplete: function() { target.css('display', 'none'); } }),
						el = target.find('.columns>*');


				clickMain
					.to( target, { duration: 0.25, opacity:1 }, "start");

				if ( el.length ) {
				clickMain.from( el, { duration: 0.5, y: 20, opacity: 0, stagger: 0.1 });
				}


				win.on("contextmenu", function(e) {
		      if (e.which === 3) {
		        clickMain.play();
		        return false;
		      }
		    });
		    $doc.keyup(function(e) {
		      if (e.keyCode === 27) {
		        clickMain.reverse();
		      }
		    });
		    target.on('click', function() {
		    	clickMain.reverse();
		    });
			}
		},
	};

	$(function(){
		if ($('#vc_inline-anchor').length) {
			win.on('vc_reload', function() {
				SITE.init();
			});
		} else {
			SITE.init();
		}
	});
})(jQuery, this);
