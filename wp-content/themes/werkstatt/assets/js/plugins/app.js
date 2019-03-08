(function ($, window) {
	'use strict';
    
	var $doc = $(document),
			win = $(window),
			body = $('body'),
			thb_css_ease = 'cubic-bezier(0.35, 0.3, 0.2, 0.85)',
			thb_ease = new BezierEasing(0.35, 0.3, 0.2, 0.85),
			thb_md = new MobileDetect(window.navigator.userAgent);
	
	var SITE = SITE || {};
	
	TweenMax.defaultEase = thb_ease;
	TimelineMax.defaultEase = thb_ease;
	
	SITE = {
		activeSlider: false,
		menuscroll: $('#menu-scroll'),
		init: function() {
			var self = this,
					obj;
			
			if ($('.header-lateral-off').length) {
				var borders = $('.thb-borders').css("border-top-width");
				
				win.on('resize', function() {
					$('.page-padding').css({
						'paddingTop': $('.header').outerHeight() + ($('.page-padding').hasClass('extra') ? 30 : 0) + ($('.thb-borders').length ? parseInt(borders) : 0)
					});
				}).trigger('resize');
			}
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
			
			if (themeajax.settings.page_transition === 'on' && !body.hasClass('compose-mode')) {
				$('.thb-page-transition-on')
					.animsition({
						inClass : themeajax.settings.page_transition_style +'-in',
						outClass : themeajax.settings.page_transition_style +'-out',
						inDuration : parseInt(themeajax.settings.page_transition_in_speed,10),
						outDuration : parseInt(themeajax.settings.page_transition_out_speed,10),
						loading : false,
						touchSupport: false,
						linkElement: '.animsition-link, a[href]:not([target="_blank"]):not([target=" _blank"]):not([href^="'+themeajax.settings.current_url+'#"]):not([href^="#"]):not([href*="javascript"]):not([href*=".rar"]):not([href*=".zip"]):not([href*=".jpg"]):not([href*=".jpeg"]):not([href*=".gif"]):not([href*=".png"]):not([href*=".mov"]):not([href*=".swf"]):not([href*=".mp4"]):not([href*=".flv"]):not([href*=".avi"]):not([href*=".mp3"]):not([href^="mailto:"]):not([class="no-animation"]):not(.add_to_cart_button):not([class*="ftg-lightbox"])'
					})
					.on('animsition.inEnd', function() {
						initFunctions();
					});
			} else {
				initFunctions();	
			}
			
		},
		headRoom: {
			selector: '.midnight_off .header',
			portfolio_header: false,
			regular_header: false,
			tl: new TimelineMax({paused:true}),
			init: function() {
				var base = this,
						container = $(base.selector);
				
			 
				base.portfolio_header = $('.portfolio-header', container);
				base.regular_header = $('.regular-header', container);
				
				if (base.portfolio_header.length) {
					base.tl
								.to(base.regular_header, 0.5, { y: "-100%", autoAlpha: 0 }, "s")
								.to(base.portfolio_header, 0.5, { y: "0%", autoAlpha: 1 }, "s+=0.1");
					
				}		
				win.on('scroll', function() {
					base.scroll(container);
				});
			},
			scroll: function (container) {
				var wOffset = win.scrollTop(),
						stick = 'hover',
						base = this;

				if (wOffset > 0) {
					_.defer(function(){
						container.addClass(stick);
						base.tl.play();
					});

				} else {
					_.defer(function(){
						container.removeClass(stick);
						base.tl.reverse();
					});
				}
			}
		},
		right_click: {
			selector: '.right-click-on',
			init: function() {
				var target = $('#right_click_content'),
						clickMain = new TimelineLite({ paused: true, onStart: function() { target.css('display', 'flex'); }, onReverseComplete: function() { target.css('display', 'none'); } }),
						el = target.find('.columns>*');
				
				
				clickMain
					.to(target, 0.5, {opacity:1, ease: thb_ease}, "start")
					.staggerFrom(el, 0.5, { Y: 20, opacity:0, ease: thb_ease}, 0.1);
					
				win.on("contextmenu", function(e) {
		      if (e.which === 3) {
		        clickMain.play();
		        return false;
		      }
		    });
		    
		    target.on('click', function() {
		    	clickMain.reverse();
		    });
			}
		},
		scrollSpy: {
			selector: '.scroll-spy-on',
			init: function() {
				var base = this,
						container = $(base.selector),
						ah = $('#wpadminbar').outerHeight() + 5,
						offset = (body.hasClass('disable_header_fill-on') || body.hasClass('midnight_on')) ? ah : $('.header').outerHeight() + ah;
				
				offset = $('.header').hasClass('style3') ? 0 : offset;
						
				if ($('#full-menu').length && !body.hasClass('thb_row_pagination_on')) {
					body.scrollspy({ 
						target: '#full-menu',
						offset: offset
					});
				}
			}
		},
		search: {
			selector: '#quick_search',
			init: function() {
				var base = this,
						container = $(base.selector),
						search = $('#searchpopup'),
						field = $('.searchform', search),
						tl = new TimelineMax({paused:true, onComplete:function() { field.find('input').get(0).focus(); }});
				
				tl
					.to(search, 0.5, { autoAlpha: 1 })
					.to(field, 0.5, { y: 0 });
					
				container.on('click', function() {
					var _this = $(this);
					
					tl.timeScale(1).play();
					return false;
				});
				
				$('.thb-search-close, .cc', search).on('click', function() {
					tl.timeScale(1.6).reverse();
					
					return false;
				});	
				
				$doc.keyup(function(e) {
					if (e.keyCode === 27) { // ESC button
						tl.timeScale(1.6).reverse();
					}
				});
			}
		},
		retinaJS: {
			selector: 'img.retina_size',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					$(this).attr('width', function() {
						var w = $(this).attr('width') / 2;	
						return w;
					}).addClass('retina_active');
				});
			}
		},
		midnight: {
			selector: '.midnight_on:not(.page-template-template-onepage):not(.header-lateral-on)',
			init: function() {
				
				$('.header').midnight({
					defaultClass: 'dark-title'
				});
			}
		},
		responsiveNav: {
			selector: '#wrapper',
			init: function() {
				var base = this,
					container = $(base.selector),
					onepage = body.hasClass('page-template-template-onepage'),
					music_toggle = $('#music_toggle'),
					toggle = $('.mobile-toggle'),
					target = $('#mobile-menu'),
					behaviour = target.data('behaviour'),
					animation = target.data('animation'),
					close = $('.thb-close', target),
					main_menu = $('.thb-mobile-menu'),
					links = target.find('.thb-mobile-language-switcher>a,.thb-mobile-menu>li>.link_container>.link_inner'),
					footer_links = target.find('.thb-secondary-menu a, .menu-footer>div'),
					tl = new TimelineMax({
						paused:true, 
						onComplete: function() {
							SITE.menuscroll.perfectScrollbar('update');
						},
						onReverseComplete: function() {
							TweenMax.set(target, {clearProps :'all'}); 
						}
					}),
					all_links = $('.thb-mobile-menu a'),
					span = behaviour === 'thb-submenu' ? target.find('.thb-mobile-menu li:has(".sub-menu")>.link_container a') : target.find('.thb-mobile-menu .next'),
					active_sub_menu = new TimelineMax({paused:true}),
					music_tl = new TimelineMax({paused:true}),
					mobile_menu_speed = themeajax.settings.mobile_menu_speed;
				
				
				if (target.hasClass('style2')) {
					tl
						.to(target, mobile_menu_speed, { display: 'flex', scale:1, autoAlpha:1 });
				} else {
					tl
						.to(target, mobile_menu_speed, { x:"0%", strictUnits:true });
						
				}
				if (animation === 'style1') {
					tl
						.staggerTo(links, 0.2, { y:"0", strictUnits:true }, 0.07 )
						.staggerTo(footer_links, 0.1, { y:"0", strictUnits:true }, 0.02, "-=0.1" );
				}
				
				
				/* Swipe Right */
				var mc = new Hammer(target[0]);
				
				mc.on("swiperight", function(ev) {
					if (themeajax.sounds.menu_close_sound === 'on') {
						SITE.sounds.close.play();
					}
					container.removeClass('open-menu');
					if (span.length && active_sub_menu.totalProgress() > 0) {
						active_sub_menu.reverse();
					}
					tl.reverse();
					return false;
				});
				span.each(function() {
					var _this = $(this),
							sub_menu = _this.parents('.link_container').next('.sub-menu'),
							sub_menu_back = sub_menu.find('>li:eq(0) .back'),
							sub_menu_links = sub_menu.find('>li>.link_container>.link_inner'),
							sub_tl = new TimelineMax({ 
								paused:true, 
								onComplete: function() {
									SITE.menuscroll.perfectScrollbar('update');
								},
								onReverseComplete: function() {
									SITE.menuscroll.perfectScrollbar('update');
								}
							});
					
					sub_tl
						.set(main_menu, { minHeight: sub_menu.outerHeight() })
						.to(main_menu, 0.5, { x:"-=100%" }, "start")
						.to(main_menu.find('>li>.link_container'), 0.5, { autoAlpha:0 }, "start")
						.to(sub_menu, 0.5, { autoAlpha: 1 }, "start")
						.staggerTo(sub_menu_links, 0.2, { y:"0"}, 0.1, "start" );
						
					_this.on('click', function() {
						active_sub_menu = sub_tl;
						sub_tl.play();
						return false;
					});
					
					sub_menu_back.on('click', function() {
						sub_tl.reverse();
						return false;
					});
				});
				
				all_links.on('click', function(e){
					var _this = $(this),
						url = _this.attr('href'),
						ah = $('#wpadminbar').outerHeight(),
						fh = (body.hasClass('disable_header_fill-on') || body.hasClass('midnight_on')) ? 0 : $('.header').outerHeight(),
						hash = url ? (url.indexOf("#") !== -1 ? url.substring(url.indexOf("#")+1) : '') : false,
						pos = hash ? $('#'+hash).offset().top - ah - fh : 0,
						time = thb_md.mobile() ? 0 : 1;

					if (hash && onepage) {
						container.removeClass('open-menu');
						tl.reverse();
						return true;
					} else if (hash && !pos) {
						return true;
					} else if (hash) {
						pos = (hash === 'footer') ? "max" : pos;
						container.removeClass('open-menu');
						tl.reverse();
						TweenMax.to(win, time, { scrollTo:{y:pos} });
						return false;
					} else {
						return true;	
					}
				});
				
				toggle.on('click', function() {
					if (themeajax.sounds.menu_open_sound === 'on') {
						SITE.sounds.open.play();
					}
					container.toggleClass('open-menu');
					tl.timeScale(1).restart();
					return false;
				});
				
				$('.click-capture').add(close).on('click', function() {
					if (themeajax.sounds.menu_close_sound === 'on') {
						SITE.sounds.close.play();
					}
					container.removeClass('open-menu');
					if (span.length && active_sub_menu.totalProgress() > 0) {
						
						active_sub_menu.reverse();
					}
					tl.reverse();
					return false;
				});
				
				$doc.keyup(function(e) {
					if (e.keyCode === 27) { // ESC button
						if (span.length) {
							active_sub_menu.reverse();
						}
						tl.reverse();
					}
				});
				
				
				$('a').on('click',function(){
					if (themeajax.sounds.click_sound === 'on') {
						SITE.sounds.click.stop().play();
					}
				});
				
				if (themeajax.sounds.menu_item_hover_sound === 'on') {
					$('a', '#mobile-menu').mouseenter(function(){
							SITE.sounds.hover.stop().play();
					});
				}
				
				if (
					themeajax.sounds.music_sound === 'on' && 
					(themeajax.sounds.music_sound_toggle_home === 'on' ? body.hasClass('home') : true)
				) {
					SITE.sounds.music.play();
					music_toggle.data('state', 'on');
					if (music_toggle.length) {
						
						music_toggle.on('click', function() {
							$(this).toggleClass('on');
							
							if (music_toggle.data('state') === 'on') {
								SITE.sounds.music.fadeTo(0, 1000, function() {
									SITE.sounds.music.pause();
								});
								
								music_toggle.data('state', 'off');
							} else {
								SITE.sounds.music.play().fadeTo(50, 1000);
								music_toggle.data('state', 'on');
							}
							return false;
						});
						SITE.sounds.music.bind("ended pause", function () {
							
						});
						SITE.sounds.music.bind("playing", function () {
							
						});
					}
				}
			}
		},
		mmBgFill: {
			selector: '.mm-link-animation-bg-fill',
			init: function() {
				var links = $('a[data-menubg]', '#mobile-menu'),
						ph = $('.menubg-placeholder', '#mobile-menu');

				links.each(function() {
					if ($(this).data('menubg') !=='') {
						var image = new Image();
						image.src = $(this).data('menubg');
					}
				});
				links.hoverIntent(
					function() {
						ph.css({
							'background-image': 'url('+$(this).data('menubg')+')',
							'opacity': '0.2'
						});
					},
					function() {
						ph.css({
							'background-image': '',
							'opacity': '0'
						});
					}
				);
			}
		},
		fullMenu: {
			selector: '.thb-full-menu',
			init: function() {
				var base = this,
					container = $(base.selector),
					onepage = body.hasClass('page-template-template-onepage'),
					li_org = container.find('a'),
					children = container.find('li.menu-item-has-children');
				
				if (themeajax.sounds.menu_item_hover_sound === 'on') {
					li_org.mouseenter(function(){
						SITE.sounds.hover.stop().play();
					});
				}
				children.each(function() {
					var _this = $(this),
							menu = _this.find('>.sub-menu'),
							li = menu.find('>li>a'),
							tl = new TimelineMax({ paused: true });
					
					tl
						.to(menu, 0.5, {autoAlpha: 1 }, "start")
						.staggerTo(li, 0.1, {opacity: 1, y: 0 }, 0.03, "start");
					
					if (body.hasClass('header-lateral-on')) {
						_this.find('>a').on('click',
							function() {
								_this.toggleClass('sfHover');
								menu.slideToggle('200');	
								
								return false;
							}
						);
					} else {
						_this.hoverIntent(
							function() {
								_this.addClass('sfHover');
								if (!$('.header').hasClass('style3')) {
									tl.timeScale(1).restart();
								} else {
									menu.slideDown('200');	
								}
							},
							function() {
								_this.removeClass('sfHover');
								if (!$('.header').hasClass('style3')) {
									tl.timeScale(1.5).reverse();
								} else {
									menu.slideUp('200');	
								}
							}
						);
					}
				});
				
				li_org.on('click', function(e){
					var _this = $(this),
							url = _this.attr('href'),
							ah = $('#wpadminbar').outerHeight(),
							fh = (body.hasClass('disable_header_fill-on') || body.hasClass('midnight_on')) ? 1 : $('.header').outerHeight(),
							hash = url.indexOf("#") !== -1 ? url.substring(url.indexOf("#")+1) : '',
							pos = (hash && $('#'+hash).length ) ? $('#'+hash).offset().top - ah - fh : 0;
					
					if (hash && onepage) {
						return true;
					} else if (hash && !pos) {
						return true;
					} else if (hash) {
						pos = (hash === 'footer') ? "max" : pos;
						TweenMax.to(win, 1, { scrollTo:{y:pos} });
						return false;
					} else {
						return true;	
					}
				});
			}
		},
		snap_rows: {
			selector: '.snap_rows_on',
			init: function() {
				var base = this,
					container = $(base.selector),
					rows = $('.page.type-page>.row.wpb_row, .post.portfolio-detail .post-content>.row.wpb_row, .post.portfolio-detail .post-gallery'),
					positions = [];
				
				if (!thb_md.mobile()) {
					rows.imagesLoaded(function() {
						rows.each(function(i) {
							positions.push($(this).offset().top);
						});
					});
					
					win.on('resize', function(){
						positions.length = 0;
						rows.each(function(i) {
							positions.push($(this).offset().top);
						});
					});
					win.on('scroll', function(){
						var progress = win.scrollTop();
						clearTimeout(win.timer);
						
						win.isScrolling = true;
						win.timer = setTimeout(function(){
							win.isScrolling = false;
							base.goTo(Math.round(progress), positions);
						}, 200);
					});
				}
			},
			goTo: function(progress, positions) {
				var offset = (body.hasClass('disable-row-offset-on') ? 0 : $('.header.hover').outerHeight()) + $('#wpadminbar').outerHeight();
				if(win.isScrolling) { return; }
				
				function getClosest(array, target) {
			    var rows = _.map(array, function(val) {
			        return [val, Math.abs(val - target)];
			    });
			    var closest = _.reduce(rows, function(memo, val) {
			    		
			        return (memo[1] < val[1]) ? memo : val;
			    }, [-1, 999])[0];

			    return closest;
				}
				var el = getClosest(positions, progress);
				
				TweenMax.to(win, 0.3, {scrollTo: { y:el, offsetY:offset } });
			}
		},
		socialSharing: {
			selector: '.thb-portfolio-share .social',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.data('pin-no-hover', true);
				container.on('click', function() {
					var left = (screen.width/2)-(640/2),
							top = (screen.height/2)-(440/2)-100;
					
					if (!container.hasClass('email')) {
						window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
						return false;
					}
				});
			}
		},
		custom_scroll: {
			selector: '.custom_scroll',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var _this = $(this);
					
					_this.perfectScrollbar({
						suppressScrollX: true
					});
				});			 
				
			}
		},
		skrollr: {
			selector: '.parallax_bg',
			init: function() {
				var args = {
							forceHeight: false,
							easing: thb_ease,
							mobileCheck: function() {
								return false;
							},
							render: function() {
								if (typeof window.vcParallaxSkroll !== 'undefined') {
									if (vcParallaxSkroll) {
										vcParallaxSkroll.refresh();
									}
								}	
							}
						};
				var s = skrollr.init(args);
			}
		},
		paginationStyle2: {
			selector: '.pagination-style2',
			init: function() {
				var base = this,
						container = $(base.selector),
						load_more = $('.thb_load_more'),
						thb_loading = false,
						page = 2;
								
				load_more.on('click', function(){
					var _this = $(this),
							text = _this.text(),
							count = _this.data('count');
					
					if(thb_loading === false) {
						_this.html('<span>'+themeajax.l10n.loading+'</span>').addClass('loading');
						
						$.ajax( themeajax.url, {
							method : 'POST',
							data : {
								action: 'thb_blog_ajax',
								page : page++
							},
							beforeSend: function() {
								thb_loading = true;
							},
							success : function(data) {
								thb_loading = false;
								var d = $.parseHTML($.trim(data)),
										l = d ? d.length : 0;
									
								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
									_this.html('<span>'+themeajax.l10n.nomore+'</span>').removeClass('loading').off('click');
								} else {
									
									$(d).appendTo(container).hide().imagesLoaded({ background: true }, function() {
										if (container.data('isotope')) {
											container.isotope('appended', $(d));
										}
										$(d).show();
										TweenMax.set($(d), {opacity: 0, y:30});
										TweenMax.staggerTo($(d), 0.5, { y: 0, opacity:1}, 0.25);
									});
									
									if (l < count){
										_this.html('<span>'+themeajax.l10n.nomore+'</span>').removeClass('loading');
									} else {
										_this.html('<span>'+text+'</span>').removeClass('loading');
									}
								}
							}
						});
					}
					return false;
				});
			}
		},
		paginationStyle3: {
			selector: '.pagination-style3',
			init: function() {
				var base = this,
						container = $(base.selector),
						page = 2,
						thb_loading = false,
						count = container.data('count'),
						preloader = container.parents('.blog-container').find('.thb-preloader');
				
				var scrollFunction = _.debounce(function(){
					
					if (thb_loading === false) {
						if (preloader.length) {
							TweenMax.set(preloader, {autoAlpha: 1});
						}
						$.ajax( themeajax.url, {
							method : 'POST',
							data : {
								action: 'thb_blog_ajax',
								page : page++
							},
							beforeSend: function() {
								thb_loading = true;
							},
							success : function(data) {
								thb_loading = false;
								var d = $.parseHTML($.trim(data)),
										l = d ? d.length : 0;
								if (preloader.length) {
									TweenMax.to(preloader, 0.25, {autoAlpha: 0});
								}
								if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
									win.off('scroll', scrollFunction);
								} else {
									$(d).appendTo(container).hide().imagesLoaded(function() {
										if (container.data('isotope')) {
											container.isotope('appended', $(d));
										}
										$(d).show();
										TweenMax.set($(d), {opacity: 0, y:30});
										TweenMax.staggerTo($(d), 0.5, { y: 0, opacity:1}, 0.25);
									});
									
									if (l >= count) {
										win.on('scroll', scrollFunction);
									}
								}
							}
						});
					}
				}, 30);
				
				win.scroll(scrollFunction);
			}
		},
		isotope: {
			selector: '.masonry',
			init: function() {
				var base = this,
						container = $(base.selector),
						header = $('.logo-holder', '.header'),
						
						a = $('#wpadminbar'),
						ah = (a ? a.outerHeight() : 0);
				
				Outlayer.prototype._setContainerMeasure = function( measure, isWidth ) {
				  if ( measure === undefined ) {
				    return;
				  }
				  var elemSize = this.size;
				  // add padding and border width if border box
				  if ( elemSize.isBorderBox ) {
				    measure += isWidth ? elemSize.paddingLeft + elemSize.paddingRight +
				      elemSize.borderLeftWidth + elemSize.borderRightWidth :
				      elemSize.paddingBottom + elemSize.paddingTop +
				      elemSize.borderTopWidth + elemSize.borderBottomWidth;
				  }
				
				  measure = Math.max( measure, 0 );
				  measure = Math.floor( measure );
				  this.element.style[ isWidth ? 'width' : 'height' ] = measure + 'px';
				};
				
				if (!$('.pswp').length && container.find('.portfolio-image-links').length > 0) {
					body.append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div><div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>');
				}
				
				container.each(function(index) {
					var _this = $(this),
							layoutMode = _this.data('layoutmode') ? _this.data('layoutmode') : 'masonry',
							preload = _this.data('preload') === 'nobg' ? false : '.thb-placeholder',
							el = _this.find('.columns'),
							animation = _this.data('thb-animation'),
							animationspeed = _this.data('thb-animation-speed') ? _this.data('thb-animation-speed') : 0.5,
							preloader = _this.find('.thb-preloader:not(.detail)'),
							loadmore = $(_this.data('loadmore')),
							page = 2,
							args = {
								layoutMode: layoutMode,
								itemSelector: '.columns',
								transitionDuration : 0,
								hiddenStyle: { },
							  visibleStyle: { },
							},
							org,
							items,
							filters = $('#'+_this.data('filter')+''),
							menu_filter = _this.hasClass('thb-filter-style4'),
							args_in,
							args_out,
							in_speed = animationspeed,
							out_speed = in_speed / 2,
							stagger_speed = in_speed / 5,
							
							/* Lightbox Variables */
							masonry_gallery,
							pswpElement = document.querySelectorAll('.pswp')[0],
							gallery_portfolios = _this.find('.portfolio-image-links'),
							alt = gallery_portfolios.find('.portfolio-link').length ? 0 : 1,
							gallery_items = [],
							gallery_options = {
								galleryUID: index,
						    index: 0,
						    hideAnimationDuration:500, 
						    showAnimationDuration:500,
						    fullscreenEl: true,
						    shareEl: false,
						    captionEl: true,
						    addCaptionHTMLFn: function(item, captionEl, isFake) {						    
						      if(!item.title) {
						        captionEl.children[0].innerHTML = '';
						        return false;
						      }
						      captionEl.children[0].innerHTML = item.title;
						      return true;
						    },
						    getThumbBoundsFn: function(i) {
						      var thumbnail = gallery_portfolios[i],
						          pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
						          rect = thumbnail.getBoundingClientRect(); 
						  		
						      return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
						    }
							};

					/* Animation Args */
					if (animation === 'thb-fade') {
						args_in = {
							opacity:1
						};
						args_out = {
							opacity:0	
						};
					} else if (animation === 'thb-scale') {
						args_in = {
							opacity:1,
							scale:1
						};
						args_out = {
							opacity:0,
							scale:0
						};
					} else if (animation === 'thb-none') {
						in_speed = out_speed = 0;
						stagger_speed = 0;
						args_in = {
							opacity:1
						};
						args_out = {
							opacity:0
						};
					} else {
						args_in = {
							y: 0, opacity:1
						};
						args_out = {
							y: 30, opacity:0	
						};
					}
					/* Load More */
					loadmore.on('click', function(){
						var text = loadmore.text(),
								i = portfolioajax.i,
								aspect = portfolioajax.aspect,
								columns = portfolioajax.columns,
								style = portfolioajax.style,
								masonry_layout = portfolioajax.masonry_layout,
								count = portfolioajax.count,
								loop = portfolioajax.loop,
								hover_style = portfolioajax.hover_style,
								title_position = portfolioajax.title_position,
								animation_style = portfolioajax.animation_style;
						
						loadmore.prop('title', themeajax.l10n.loading);
						loadmore.find('span').text(themeajax.l10n.loading).addClass('loading');
						
						$.post( themeajax.url, { 
						
								action : 'thb_ajax',
								loop : loop,
								i : i,
								columns : columns,
								masonry_layout : masonry_layout,
								style : style,
								page : page,
								hover_style: hover_style,
								title_position: title_position,
								animation_style: animation_style
								
						}, function(data){
							
							page++;
							var d = $.parseHTML($.trim(data)),
									l = d ? d.length : 0;
							
							if( data === '' || data === 'undefined' || data === 'No More Posts' || data === 'No $args array created') {
								loadmore.prop('title',themeajax.l10n.nomore);
								loadmore.find('span').text(themeajax.l10n.nomore).removeClass('loading').off('click');
							} else {
								var added = $(d);
								added.imagesLoaded({ background: true }, function() {
									
									added.appendTo(_this).hide();

									_this.isotope( 'appended', added );
									
									added.show();
									
//									if (masonry_gallery) {
//										masonry_gallery.shout('thbAdded', added);
//									}
									TweenMax.staggerTo(added.find('.portfolio-holder'), in_speed, args_in, stagger_speed);
									
									if (l < count){
										loadmore.prop('title', themeajax.l10n.nomore);
										loadmore.find('span').text(themeajax.l10n.nomore).removeClass('loading');
									} else {
										loadmore.prop('title', text);
										loadmore.find('span').text(text).removeClass('loading');
									}
								});
							}
							
						});
						return false;
					});
					
					/* Filter - Header Animation */
					if ( filters.length ) {
						if (filters.hasClass('style1')) {
							header.append(filters);
							TweenMax.set(filters, { autoAlpha: 0, display: 'none' });
							
							var filter_check = _.debounce(function(){
								if (win.scrollTop() + ah >= _this.offset().top - $('.header').outerHeight() && win.scrollTop() <= (_this.offset().top + _this.outerHeight() - $('.header').outerHeight() - ah) ) {
									if ((win.width() > 1025)) {
										TweenMax.to(filters, 0.5, { autoAlpha: 1, display: 'inline-flex' });
									} else {
										TweenMax.to(filters, 0.5, { autoAlpha: 0, display: 'none' });
									}
								} else {
									TweenMax.to(filters, 0.5, { autoAlpha: 0, display: 'none' });	
								}
							}, 10);
							win.scroll(filter_check);
							win.resize(filter_check);
						}
					}
					
					/* Masonry */
					_this.imagesLoaded( { background: preload }, function() {
						if (preloader.length) {
							TweenMax.to(preloader, 0.25, {autoAlpha: 0});
						}
						_this.addClass('thb-loaded');
						SITE.style6hover.start();
					  _this.on( 'layoutComplete', function( e, items ) {
					  	var elms = _.map(items, 'element');
					  	win.scroll(_.debounce(function(){
					  		items = $(elms).filter(':in-viewport').filter(function() {
					  		    return $(this).data('thb-in-viewport') === undefined;
					  		});
					  		if (items) {
					  			items.data('thb-in-viewport', true);
					  			TweenMax.staggerTo(items.find('.portfolio-holder'), in_speed, args_in, stagger_speed, function() {
					  				items.data('thb-in-viewport', true);
					  			});
					  		}
					  	}, 20)).trigger('scroll');
					  	_this.trigger('resize');
					  	
					  	/* Lightbox Links */
					  	if (gallery_portfolios.length) {
						  	gallery_portfolios.each(function() {
						  		var gallery_portfolio = $(this),
						  				image_data = SITE.isotope.getImageData(gallery_portfolio, alt);
						  		
						  		gallery_items.push(image_data);		
						  	});

//						  	masonry_gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, gallery_items, gallery_options);
						  	
						  	/* Listen for new gallery items */
//						  	masonry_gallery.listen('thbAdded', function(added_items) {
//						  		var i = 0
//						  		console.log(gallery_items);
//						  		added_items.each(function() {
//						  			var added_item = $(this);
//						  			if ( added_item.hasClass('portfolio-image-links') ) {
//						  				
//						  				var image_data = SITE.isotope.getImageData(added_item, alt);
//
//											gallery_portfolios = gallery_portfolios.add(added_item);
//						  				gallery_items.push(image_data);
//						  				i++;
//						  			}
//						  		});
//						  		if (i) {
//						  			masonry_gallery.updateSize();	
//						  		}
//						  		
//						  	});
						  	
						  	_this.on('click', '.portfolio-image-link', function(e) {
						  	  e.preventDefault();
									var _t = $(this),
											i = alt ? gallery_portfolios.index(_t) : gallery_portfolios.index(_t.parents('.portfolio-image-links'));

						  		gallery_options.index = i;
						  		masonry_gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, gallery_items, gallery_options);
		  						masonry_gallery.init();
						  	});
					  	}
					  }).isotope(args);
					  
					  /* Filters */
					  if (filters.length || menu_filter) {
					  	var a = menu_filter ? $('.full-menu a[data-filter]').add($('.thb-mobile-menu a[data-filter]')) : filters.find('a');

					  	a.on('click', function(){
					  		var _that = $(this),
						  			selector = _that.data('filter'),
						  			filter_function = function() {
						  				_this.on( 'layoutComplete', function(e,items) {
						  					var new_items = _.map(items, 'element');
						  					TweenMax.staggerTo($(new_items).find('.portfolio-holder'), in_speed, args_in, stagger_speed);
						  				});
						  				_this.isotope({ filter: selector });
						  			},
						  			items_out = $(_this.isotope('getFilteredItemElements')).find('.portfolio-holder');
						  			
				  			a.not(_that).removeClass('active');
				  			
				  			if (!_that.hasClass('active')) {
				  				_that.addClass('active');
				  			} else {
				  				_that.removeClass('active');
				  				selector = '*';
				  				a.filter('[data-filter="*"]').addClass('active');
				  			}
				  			if (items_out.length) {
				  				TweenMax.staggerTo(items_out, out_speed, args_out, stagger_speed, filter_function);
				  			} else {
				  				filter_function();
				  			}

					  		return false;
					  	});
					  }
					}); // Images Loaded 
				});
			},
			getImageData: function(gallery_link, alt) {
				var data,
						href = alt ? gallery_link.attr('href') : gallery_link.find('.portfolio-link').attr('href'),
						src = gallery_link.find('.thb-placeholder').css('background-image').replace('url(','').replace(')','').replace(/\"/gi, ""),
						size = alt ? gallery_link.data('size').split('x') : gallery_link.find('.portfolio-link').data('size').split('x'),
						item = {
							msrc: src,
							src: href,
							title: gallery_link.attr('title'),
							w: parseInt(size[0], 10),
							h: parseInt(size[1], 10)
						};
				return item;	
			}
		},
		headerFilter: {
			selector: '.thb-portfolio-filter, .thb-portfolio-share',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var _this = $(this),
							a = _this.find('li>a, li>span'),
							tl = new TimelineMax({paused: true}),
							port = _this.hasClass('thb-portfolio-share'),
							time = port ? 0.1 : 0.2,
							nav = $('nav.full-menu', '.header');
					
					tl
						.staggerTo(a, time, { x: '0%' }, time - 0.05);
					
					if (_this.hasClass('thb-portfolio-filter') && _this.hasClass('style1') && nav.length && !$('.header').hasClass('style3')) {
						tl.
							to(nav, 1, { opacity: 0 }, 0);
					}
					if (port) {
						a.on('click', function() {
							a.removeClass('active');
							$(this).addClass('active');
						});
					}
					_this.hoverIntent(
						function() {
							if (!_this.hasClass('alt')) {
								tl.timeScale(1).play();
							}
						},
						function() {
							if (!_this.hasClass('alt')) {
								tl.timeScale(2).reverse();
							}
						}
					);
				});
			}
		},
		verticalDeck: {
			selector: '.vertical-deck',
			pageIndex: 0,
			init: function() {
				var base = this,
						container = $(base.selector),
						pagi = $('.swiper-pagination'),
						active = $('.swiper-pagination-current', pagi);

				container.curtain({
					prevSlide: function() { 
						if (!thb_md.mobile()) { 
							active.html($('.vertical-page.current').index() + 1);
						}
					},
					nextSlide: function() { 
						if (!thb_md.mobile()) { 
							active.html($('.vertical-page.current').index() + 1);
						}
					}
				});

			}
		},
		slick: {
			selector: '.slick',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector);
				
				container.each(function() {
					var that = $(this),
						data_columns = that.data('columns'),
						thb_columns = data_columns.length > 2 ? parseInt( data_columns.substr(data_columns.length - 1) ) : data_columns,
						children = that.find('.columns'),
						columns = data_columns.length > 2 ? (thb_columns === 5 ? 5 : ( 12 / thb_columns )) : data_columns,
						fade = (that.data('fade') ? true : false),
						navigation = (that.data('navigation') === true ? true : false),
						autoplay = (that.data('autoplay') === true ? true : false),
						pagination = (that.data('pagination') === true ? true : false),
						center = (that.data('center') ? (( (children.length > columns) && (columns % 2)) ? that.data('center') : false) : false),
						infinite = (that.data('infinite') === false ? false : true),
						autoplay_speed = that.data('autoplay-speed') ? that.data('autoplay-speed') : 4000,
						asNavFor = that.data('asnavfor'),
						rtl = body.hasClass('rtl');
					
					var args = {
						dots: pagination,
						arrows: navigation,
						infinite: infinite,
						speed: 1000,
						fade: fade,
						centerPadding: 0,
						centerMode: center,
						slidesToShow: columns,
						slidesToScroll: 1,
						rtl: rtl,
						cssEase: thb_css_ease,
						autoplay: autoplay,
						autoplaySpeed: autoplay_speed,
						pauseOnHover: true,
						accessibility: false,
						focusOnSelect: true,
						prevArrow: '<button type="button" class="slick-nav slick-prev"><span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="thb-arrow" x="0" y="0" width="16.7" height="11.3" viewBox="0 0 16.7 11.3" enable-background="new 0 0 16.664 11.289" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" points="0 5.6 1.4 4.2 1.4 4.2 5.7 0 7.1 1.4 3.8 4.7 16.7 4.7 16.7 6.7 3.9 6.7 7.1 9.9 5.7 11.3 1.4 7.1 1.4 7.1 0 5.7 0 5.6 "/></svg></span></button>',
						nextArrow: '<button type="button" class="slick-nav slick-next"><span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="thb-arrow" x="0" y="0" width="16.7" height="11.3" viewBox="0 0 16.7 11.3" enable-background="new 0 0 16.664 11.289" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" points="16.7 5.6 15.3 4.2 15.2 4.2 11 0 9.6 1.4 12.9 4.7 0 4.7 0 6.7 12.8 6.7 9.6 9.9 11 11.3 15.2 7.1 15.3 7.1 16.7 5.7 16.7 5.6 "/></svg></span></button>',
						responsive: [
							{
								breakpoint: 1025,
								settings: {
									slidesToShow: (columns < 3 ? columns : 3)
								}
							},
							{
								breakpoint: 780,
								settings: {
									slidesToShow: (columns < 2 ? columns : 2)
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
								}
							}
						]
					};
					if (asNavFor && $(asNavFor).is(':visible')) {
						args.asNavFor = asNavFor;	
					}
					if (that.data('fade')) {
						args.fade = true;
					}
					if (that.hasClass('product-thumbnails')) {
						args.responsive = false;
					}
					if (center) {
						that.on('init', function() {
							that.addClass('centered');
						});
					}
					that.slick(args);
					
				});
			}
		},
		onePage: {
			selector: '#thb_fullscreen_rows',
			init: function() {
				var base = this,
						container = $(base.selector),
						animationspeed = 1150,
						footer = $('.footer-container'),
						names = [],
						anchors = [];
				
				SITE.fullPageEnabled = true;
				if (footer.length) {
					footer.appendTo(container);
				}
				$('>.wpb_row', container).each(function() {
					var _this = $(this),
							anchor = _this.data('onepage-anchor') ? _this.data('onepage-anchor') : '';
					anchors.push(anchor);
					names.push(_this.data('row-title'));
				});
				container.fullpage({
					sectionSelector: '>.wpb_row',
					navigation: true,
					css3: true,
					scrollingSpeed: animationspeed,
					anchors: anchors,
					scrollOverflow: true,
					scrollOverflowOptions: {
						click: false,
						preventDefaultException: {
		            tagName: /.*/
		        }
			    },
					navigationPosition: 'right',
					navigationTooltips: names,
					afterLoad: function(anchorLink, index){ 
						var firstRow = $('.wpb_row.fp-section:nth-child('+index+')', container),
								color = firstRow.data('midnight');
								
						SITE.animation.container(firstRow);
						var ins = firstRow.data('vide');
						if (ins) {
							ins.getVideoObject().play();
						}
						if (color &&!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						win.trigger('scroll');
					},
					onLeave: function(index, nextIndex, direction){ 
						var currentRow = $('.wpb_row.fp-section:nth-child('+index+')', container),
								nextRow = $('.wpb_row.fp-section:nth-child('+nextIndex+')', container),
								color = nextRow.data('midnight'),
								dir = direction === 'down' ? 1 : -1;

						function animateSlide() {
							TweenMax
								.to(currentRow, (animationspeed/1000), { opacity: 0.8, y: (dir*50)+'%', ease: thb_ease, clearProps:"all"});
						}
						
						if ( currentRow.data('vide')) {
							currentRow.data('vide').getVideoObject().pause();
						}
						
						if (direction === 'down') {
							if ( !nextRow.hasClass('footer-container') ) {
								animateSlide();
							} else {
								currentRow.addClass('before-footer');	
							}
						} else {
							if (!nextRow.hasClass('before-footer')) {
								animateSlide();
							}
						}
						var ins = nextRow.data('vide');
						if ( ins ) {
							ins.resize();
						}
						_.delay(function() {
							SITE.animation.container(nextRow);
							currentRow.removeClass('active');
							
							if ( ins ) {
								ins.getVideoObject().play();
							}
							
						}, animationspeed);
						
					}
				});
			}
		},
		shopLoading: {
			selector: '.post-type-archive-product ul.products.thb-main-products',
			thb_loading: false,
			scrollInfinite: false,
			href: false,
			init: function() {
				var base = this,
						container = $(base.selector),
						type = themeajax.settings.shop_product_listing_pagination;
						
				if ($('.woocommerce-pagination').length && body.hasClass('post-type-archive-product')) {
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
							if( resp.find('.woocommerce-pagination .next').length ) {
								win.on('scroll', base.scrollInfinite);	
							}
						}
						if (products.length) {
							products.addClass('will-animate').appendTo(container);
							TweenMax.set(products, {opacity: 0, y:30});
							TweenMax.staggerTo(products, 0.3, { y: 0, opacity: 1 }, 0.15);
						}
						base.thb_loading = false;
					}
				});
			}
		},
		fsStyle1: {
			selector: '.swiper-container.style1',
			init: function() {
				var base = this,
						container = $(base.selector),
						footer_style = container.data('footer-style'),
						active = false,
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';
				
				// General Slider
				var params = {
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					speed: 1000,
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
 						return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
				      return '<span class="' + currentClassName + '"></span>' +
				             ' - ' +
				             '<span class="' + totalClassName + '"></span>';
				  },
					loop: true,
					autoplay: container.data('autoplay'),
					effect: 'fade',
					direction: 'vertical',
					keyboardControl: true,
					mousewheelControl: true,
					onInit: function(e) {
						var i = e.activeIndex,
								color = e.slides.eq(i).data('color');
						if (!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						win.on('orientationchange', function() {
							e.update();
						}); 
					},
					onSlideChangeStart: function(e) {
						var color = $('.swiper-slide-active').data('color');
						
						body.removeClass('light-title dark-title').addClass(color);
					}
				};
				SITE.activeSlider = new Swiper(base.selector, params);
			}
		},
		fsStyle3: {
			selector: '.swiper-container.style3',
			init: function() {
				var base = this,
						container = $(base.selector),
						footer_style = container.data('footer-style'),
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';

				// General Slider
				var params = {
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					speed: 1000,
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
							return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
					    return '<span class="' + currentClassName + '"></span>' +
					           ' - ' +
					           '<span class="' + totalClassName + '"></span>';
					},
					loop: false,
					autoplay: container.data('autoplay'),
					direction: 'vertical',
					keyboardControl: true,
					mousewheelControl: true,
					onInit: function(e) {
						var titles = container.find('h1');
						
						titles.each(function(i, el) {
							var _this = $(el),
									split = new SplitText(_this, {type:"words,chars", charsClass: "char"}),
									tl = new TimelineMax({ paused: true });
									
							tl
								.set(_this, { display: 'flex' })
								.staggerTo(split.chars, 1, { opacity: 1, y: "0%" }, 0.1);

							_this.data('tl', tl);
							_this.css('font-size', parseInt(((100 /split.chars.length),10)) * 1.5 +'vw');

							if (i === 0) {
								tl.play();
							}
						});
						var i = e.activeIndex,
								color = e.slides.eq(i).data('color');
								
						if (!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						win.on('orientationchange', function() {
							e.update();
						});
					},
					onSlideChangeStart: function(swiper) {
						var previousSlide = swiper.slides.eq(swiper.previousIndex),
								activeSlide = swiper.slides.eq(swiper.activeIndex),
								is_light =  activeSlide.hasClass('light-title'),
								body_color = is_light ? 'light-title' : 'dark-title',
								tl = activeSlide.find('h1').data('tl');

						previousSlide.find('h1').data('tl').timeScale(2).reverse();
						activeSlide.find('h1').data('tl').timeScale(1).play();
						
						body.removeClass('light-title dark-title').addClass(body_color);

					}
				};
				SITE.activeSlider = new Swiper(base.selector, params);
			}
		},
		fsStyle4: {
			selector: '.swiper-container.style4',
			init: function() {
				var base = this,
						container = $(base.selector),
						thumbnails = $('.swiper-container.style4-thumbnails'),
						footer_style = container.data('footer-style'),
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';

					
				// General Slider
				var params = {
					speed: 1000,
					loop: false,
					effect: 'slide',
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
							return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
					    return '<span class="' + currentClassName + '"></span>' +
					           ' - ' +
					           '<span class="' + totalClassName + '"></span>';
					},
					autoplay: container.data('autoplay'),
					direction: 'vertical',
					keyboardControl: true,
					mousewheelControl: true
				};
				SITE.activeSlider = new Swiper(base.selector, params);
				
				var params2 = {
					direction: 'vertical',
					speed: 1000,
					loop: false,
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					effect: 'fade',
					keyboardControl: false,
					mousewheelControl: true
				};
				
				var swiperThumbnails = new Swiper(thumbnails, params2);
			
				SITE.activeSlider.params.control = swiperThumbnails;
				swiperThumbnails.params.control = SITE.activeSlider;
			}
		},
		fsStyle5: {
			selector: '.swiper-container.style5',
			init: function() {
				var base = this,
						container = $(base.selector),
						footer_style = container.data('footer-style'),
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';

					
				// General Slider
				var params = {
					speed: 1000,
					loop: false,
					autoplay: container.data('autoplay'),
					direction: 'vertical',
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
							return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
					    return '<span class="' + currentClassName + '"></span>' +
					           ' - ' +
					           '<span class="' + totalClassName + '"></span>';
					},
					keyboardControl: true,
					mousewheelControl: true,
					onInit: function(e) {
						var slides = e.slides,
								titles = container.find('h1'),
								boxes = [
									{
										pieces: 3,
										positions: [
											{top: 0, left: 0, width: 30, height: 54},
											{top: 62, left: 19, width: 40, height: 38},
											{top: 28, left: 55, width: 45, height: 40}
										]
									},
									{
										pieces: 4,
										positions: [
											{top: 0, left: 7, width: 33, height: 71},
											{top: 0, left: 51, width: 22, height: 30},
											{top: 38, left: 60, width: 40, height: 51},
											{top: 65, left: 0, width: 45, height: 25}
										]
									},
									{
										pieces: 4,
										positions: [
											{top: 30, left: 0, width: 41, height: 70},
											{top: 0, left: 48, width: 33, height: 69},
											{top: 18, left: 76, width: 24, height: 36},
											{top: 79, left: 63, width: 26, height: 11}
										]
									},
									{
										pieces: 4,
										positions: [
											{top: 14, left: 5, width: 38, height: 57},
											{top: 0, left: 48, width: 33, height: 56},
											{top: 50, left: 70, width: 26, height: 50},
											{top: 83, left: 30, width: 26, height: 17}
										]
									}
								];
						
						slides.each(function(i, el) {
							var _this = $(el),
									segmenter,
									args = {
										animation: {
												duration: 8000,
												translateZ: {min: 80, max: 140},
										},
										onReady: function() {
										 	_this.data('tl', segmenter.animate());
										 	
										 	if (i === 0) {
										 		_this.data('tl').play();
										 	}
										}
									};

							args.pieces = boxes[(i % 4)].pieces;
							args.positions = boxes[(i % 4)].positions;
							segmenter = new Segmenter(el, args);
						});
						var i = e.activeIndex,
								color = e.slides.eq(i).data('color');
								
						if (!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						win.on('orientationchange', function() {
							e.update();
						});
					},
					onSlideChangeStart: function(swiper) {
						var activeSlide = swiper.slides.eq(swiper.activeIndex),
								is_light =  activeSlide.hasClass('light-title'),
								body_color = is_light ? 'light-title' : 'dark-title';
						
						body.removeClass('light-title').addClass(body_color);

					},
					onSlideChangeEnd: function(swiper) {
						var previousSlide = swiper.slides.eq(swiper.previousIndex),
								activeSlide = swiper.slides.eq(swiper.activeIndex);
						
						previousSlide.data('tl').reverse();
						activeSlide.data('tl').play();
					}
				};
				SITE.activeSlider = new Swiper(base.selector, params);
			}
		},
		fsStyle6: {
			selector: '.swiper-container.style6',
			getRandomGlitchParams: function() {
				return {
					seed: Math.round(Math.random() * 3000),
					quality:  Math.floor(Math.random() * (80 - 40 + 1)) + 70,
					amount: Math.floor(Math.random() * (99 - 25 + 1)) + 15,
					iterations: 8
				};
			},
			generateGlitchedImageData: function( frameCount, image ) {
				var base = this;
        var glitchPromises = [ ];
        for ( var i = 0; i < frameCount; ++i ) {
            glitchPromises[i] = glitch( base.getRandomGlitchParams() )
                .fromImage(image)
                .toImage();
        }
				glitchPromises[frameCount] = image;
        return Promise.all( glitchPromises );
      },
			distortCanvas: function (canvas, src, cover) {
				var base = this,
						ctx = canvas.getContext('2d'),
						aspect = win.outerWidth() / win.outerHeight(),
						imgAspect = 1,
						image = new Image(),
						framesCache = [],
						currentFrameIndex = 0,
						isAnimating = false,
						fps = 50,
						frameCount = 5;
				
				function resizeCanvas() {
					if ((win.outerWidth() / win.outerHeight()) < imgAspect) {
						//taller
						$(canvas).css({
							'width'	: 'auto',
							'height': win.outerHeight() + 'px'
						});
					} else {
						//wider
						$(canvas).css({
							'width'	: win.outerWidth() + 'px',
							'height': 'auto'
						});
					}	
				}
        
        function showNextFrame() {
        	var delay = 0;
        	
	        if ( isAnimating ) {
            if ( framesCache.length ) {
              currentFrameIndex++;

              if ( currentFrameIndex > framesCache.length - 1 ) {
              	currentFrameIndex = 0;
              } else if ( currentFrameIndex + 1 === framesCache.length ) {
              	delay = 3000;
              }
            }

            window.requestAnimationFrame( function () {
              ctx.drawImage( framesCache[currentFrameIndex], 0, 0, canvas.width, canvas.height );
              setTimeout( showNextFrame, (1000 / fps) + delay );
            } );
	        }
        }
        
        function startAnimation() {
            isAnimating = true;
            showNextFrame();
            //cover.hide();
        }

        function stopAnimation() {
            isAnimating = false;
            //cover.show();
        }

        function toggleAnimation() {
            if ( isAnimating ) {
                stopAnimation();
            } else {
                startAnimation();
            }
        }
        
        image.onload = function () {
        		canvas.width = image.naturalWidth;
        		canvas.height = image.naturalHeight;
        		imgAspect = canvas.width / canvas.height;
        		
            base.generateGlitchedImageData( frameCount, image ).then( function ( frames ) {
            		frames[frameCount] = image;
                framesCache = frames;
                resizeCanvas();
                startAnimation();
            } );
        };

        image.src = canvas.getAttribute("data-image");
        
        win.on('resize', function() {
        	resizeCanvas();
        });
			},
			init: function() {
				var base = this,
						container = $(base.selector),
						footer_style = container.data('footer-style'),
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';

				// General Slider
				var params = {
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					speed: 1000,
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
							return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
					    return '<span class="' + currentClassName + '"></span>' +
					           ' - ' +
					           '<span class="' + totalClassName + '"></span>';
					},
					loop: false,
					autoplay: container.data('autoplay'),
					direction: 'vertical',
					keyboardControl: true,
					mousewheelControl: true,
					onInit: function(e) {
						var i = e.activeIndex,
								color = e.slides.eq(i).data('color'),
								canvas = $('.glitch', e.slides.eq(i)),
								cover = $('.glitch-image', e.slides.eq(i)),
								image = canvas.data('image');
						
						setTimeout( function() { e.slides.eq(i).addClass('thb-animate-slide-text'); }, 900);
						if (!canvas.data('active')) {
							base.distortCanvas(canvas[0], image, cover);
							canvas.data('active', 1);
						}
						if (!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						win.on('orientationchange', function() {
							e.update();
						});
					},
					onSlideChangeStart: function(swiper) {
						var previousSlide = swiper.slides.eq(swiper.previousIndex),
								activeSlide = swiper.slides.eq(swiper.activeIndex),
								is_light =  activeSlide.hasClass('light-title'),
								body_color = is_light ? 'light-title' : 'dark-title';
						
						previousSlide.removeClass('thb-animate-slide-text');
						
						body.removeClass('light-title dark-title').addClass(body_color);

					},
					onSlideChangeEnd: function(swiper) {
						var previousSlide = swiper.slides.eq(swiper.previousIndex),
								activeSlide = swiper.slides.eq(swiper.activeIndex),
								canvas = $('.glitch', activeSlide),
								cover = $('.glitch-image', activeSlide),
								image = canvas.data('image');
						
						
							setTimeout( function() { activeSlide.addClass('thb-animate-slide-text'); }, 900);
						if (!canvas.data('active')) {
							base.distortCanvas(canvas[0], image, cover);
							canvas.data('active', 1);
						}
					}
				};
				SITE.activeSlider = new Swiper(base.selector, params);
			}
		},
		fsStyle7: {
			selector: '.swiper-container.style7',
			init: function() {
				var base = this,
						container = $(base.selector),
						active = false,
						borders = $('.thb-borders'),
						org_border_color = borders.length ? borders.css("border-color") : false,
						footer_style = container.data('footer-style'),
						paginationType = footer_style === 'footer_style2' ? 'bullets' : 'fraction';

					
				// General Slider
				var params = {
					speed: 1500,
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					pagination: '.swiper-pagination',
					paginationType: paginationType,
					paginationClickable: true,
					paginationBulletRender: function(swiper, index, className) {
						function n(n){
						    return n > 9 ? "" + n: "0" + n;
						}
							return '<span class="' + className + '">' + n(index + 1) + '</span>';
					},
					paginationFractionRender: function (swiper, currentClassName, totalClassName) {
				      return '<span class="' + currentClassName + '"></span>' +
				             ' - ' +
				             '<span class="' + totalClassName + '"></span>';
				  },
					loop: true,
					autoplay: container.data('autoplay'),
					direction: 'horizontal',
					parallax: true,
					keyboardControl: true,
					mousewheelControl: true,
					onInit: function(e) {
						var i = e.activeIndex,
								color = e.slides.eq(i).data('color'),
								maincolor = e.slides.eq(i).data('main-color');
						if (!body.hasClass(color)) {
							body.removeClass('light-title dark-title').addClass(color);
						}
						if (borders.length) {
							var bordercolor = maincolor ? maincolor : org_border_color;
							borders.css('border-color', bordercolor);
						}
						var titles = container.find('h1');
						
						titles.each(function(i, el) {
							var _this = $(el),
									compressor = 1.1;
							var resizer = function () {
								_this.css('font-size', Math.max(Math.min(_this.width() / (compressor*10), parseFloat('180px')), parseFloat('20px')));
							};
							resizer();
							win.on('resize orientationchange', function() {
								resizer();
							});
						});
						win.on('resize orientationchange', function() {
							e.update();
						});
					},
					onSlideChangeStart: function(e) {
						var color = $('.swiper-slide-active').data('color'),
								maincolor = $('.swiper-slide-active').data('main-color');
						
						body.removeClass('light-title dark-title').addClass(color);
						
						if (borders.length) {
							var bordercolor = maincolor ? maincolor : org_border_color;
							borders.css('border-color', bordercolor);
						}
					}
				};
				SITE.activeSlider = new Swiper(base.selector, params);
			}
		},
		carousel: {
			selector: '.swiper-container.carousel',
			init: function() {
				var base = this,
						container = $(base.selector),
						change_colors = container.hasClass('thb_change_header'),
						pagination = $('div', '.thb-swiper-pagination'),
						autoplay_speed = container.data('autoplay-speed') ? container.data('autoplay-speed') : '5000',
						autoplay = container.data('autoplay') ? autoplay_speed : false,
						preloader = container.find('.thb-preloader'),
						count = $('.columns', container).length,
						pagination_ani = new TimelineMax({ paused: true });
				
				// General Slider
				var params = {
					nextButton: '.swiper-button-next.swiper-nav',
					prevButton: '.swiper-button-prev.swiper-nav',
					slideClass: 'columns',
					slideActiveClass: 'slide-active',
					speed: 1000,
          autoplay: autoplay,
          autoplayDisableOnInteraction: false,
					loop: container.find('.type-portfolio').length > 1 ? true : false,
					pagination: '.thb-swiper-pagination',
					paginationClickable: true,
					paginationElement: 'div',
					slidesPerView: 'auto',
					loopedSlides: count,
					keyboardControl: true,
					mousewheelControl: true,
					mousewheelForceToAxis: true,
					paginationBulletRender: function (swiper, index, className) {
						
						var title = $('[data-swiper-slide-index='+index+']').data('title');
						return '<div class="' + className + '"><span><span class="progress"></span></span><h6>'+title+'</h6></div>';
					},
					onPaginationRendered: function(swiper, paginationContainer) {
						var as = autoplay ? parseInt(autoplay / 1000, 10) : 5;
						pagination_ani
							.clear()
							.to($('.progress', paginationContainer), as, { scaleX: 1 });
					},
					onAutoplayStart: function(swiper) {
						if (pagination && swiper.autoplaying) {
							pagination_ani.play();
						}
					},
					onSlideChangeStart: function(swiper) {
						var activeIndex = swiper.slides.eq(swiper.activeIndex).attr('data-swiper-slide-index'),
								is_light =  $('[data-swiper-slide-index='+activeIndex+']').hasClass('light-title'),
								body_color = is_light ? 'light-title' : 'dark-title',
								color = is_light ? 'light-pagination' : 'dark-pagination';
						
						swiper.wrapper.removeClass('light-pagination dark-pagination').addClass(color);
						
						if (change_colors) {
							body.removeClass('light-title').addClass(body_color);
						}
						if (pagination && swiper.autoplaying) {
							pagination_ani.pause().progress(0);
						}
					},
					onSlideChangeEnd: function(swiper) {
						if (pagination && swiper.autoplaying) {
							pagination_ani.progress(0);
							pagination_ani.restart();
						}
					}
				};
				if (preloader.length) {
					container.imagesLoaded( { background: '.thb-placeholder' }, function() {
						
						TweenMax.to(preloader, 0.25, {autoAlpha: 0});
						container.addClass('thb-loaded');
						
						var carousel = new Swiper(base.selector, params);
					});
				} else {
					container.addClass('thb-loaded');
					
					var carousel = new Swiper(base.selector, params);
				}
			}
		},
		showAll: {
			selector: '.show-all.style1',
			init: function() {
				var base = this,
						container = $(base.selector),
						i = 0,
						curtains = $('.curtains'),
						tl = new TimelineMax({
							paused: true,
							onReverseComplete: function() {
								if (curtains.length) {
									var pos = curtains.find('li').eq(i).data('position');
									TweenMax.to(win, 2, {scrollTo:pos});
								} else {
									if ( SITE.activeSlider.params.loop ) {
										i = SITE.activeSlider.slides.filter('[data-swiper-slide-index='+i+']').index();
									}
									SITE.activeSlider.slideTo(i);
								}
							},
							onComplete: function() {
								win.trigger('resize');
							}
						}),
						all = $('.thb-show-all'),
						items = $('li>div', all);

				tl
					.timeScale(1)
					.to(all, 1, { autoAlpha: 1 })
					.staggerFromTo(items, 0.5, { y:'100%' }, { y: '0%' }, 0.1, "-=0.3");
				
				container.on('click', function() {
					var _this = $(this);
					
					tl.play();
					return false;
				});
				
				$('.thb-close').on('click', function() {
					tl.timeScale(1.6).reverse();
					
					return false;
				});	
				items.on('click', function() {
					i = $(this).parents('li').index();
					tl.timeScale(1.6).reverse();
				});	
				
				$doc.keyup(function(e) {
					if (e.keyCode === 27) { // ESC button
						tl.timeScale(1.6).reverse();
					}
				});
			}
		},
		listPortfolio: {
			selector: '.thb-list-portfolio',
			init: function() {
				var base = this,
						container = $(base.selector);

					
				container.each(function() {
					var _this = $(this),
							zoom = _this.data('zoom-effect'),
							content_side = _this.find('.thb-content-side'),
							images = _this.find('.portfolio-image'),
							links = _this.find('.type-portfolio'),
							preloader = _this.find('.thb-preloader');
					
					function animateOver(i, el) {
					  var tl = new TimelineMax();
					  if (!images.eq(i).is(':visible')) {
					  	tl
					  		.to(images.filter(':visible'), 0.5, {autoAlpha: 0, scale: 1, display: 'none'}, 0) 
					  		.to(images.eq(i), 0.5, {autoAlpha: 1, display: 'block'}, 0);
					  }
					  
					  if (zoom) {
						  tl
						  	.add(TweenMax.to(images.eq(i), 5, {scale: 1.05}));
					  }
					  el.animation = tl;
					  return tl;
					}
					links.hoverIntent(function() {
							var i = $(this).index(),
									color = $(this).data('color');
							links.removeClass('active');
							$(this).addClass('active');
							if (!content_side.hasClass(color)) {
								content_side.removeClass('light-title dark-title').addClass(color);
							}	
							animateOver(i, this);
					});
					if (preloader.length) {
						container.imagesLoaded( { background: '.portfolio-image' }, function() {
							container.addClass('thb-loaded');
							TweenMax.to(preloader, 0.25, {autoAlpha: 0});
						});
					} else {
						container.addClass('thb-loaded');
						TweenMax.to(preloader, 0.25, {autoAlpha: 0});
					}
				});
			}
		},
		rowPagination: {
			selector: '.thb_row_pagination_on',
			init: function() {
				var rows = $('.row.wpb_row:not(.vc_inner)'),
						position = body.hasClass('row_pagination_position-right') ? 'row_pagination_position-right' : '',
						container = $('<ul class="thb_row_pagination '+position+'"/>'),
						offset = body.hasClass('disable-row-offset-on') ? 0 : $('.header').outerHeight(),
						i = 1,
						ids = [];

				container.appendTo('#wrapper div[role="main"]');
				body.scrollspy({
					target: '.thb_row_pagination',
					offset: offset + $('#wpadminbar').outerHeight() + 5
				});
				rows.each(function() {
					var _this = $(this),
							id = _this.attr('id'),
							title = _this.data('row-title') ? '<span>' + _this.data('row-title') + '</span>' : '';
					if (!id) {
						_this.attr('id', 'thb_id_'+ Math.random().toString(35).substr(2, 7) + '');
					}
					if (title !== '') {
						if (body.hasClass('row_pagination_position-right')) {
							$('<li href="#'+_this.attr('id')+'">'+title+'<b>'+i+'</b></li>').appendTo(container); 
						} else {
							$('<li href="#'+_this.attr('id')+'"><b>'+i+'</b>'+title+'</li>').appendTo(container); 
						}
						
						i++;
					}
				});
				
				body.scrollspy('refresh');
				TweenMax.staggerTo(container.find('li'), 0.2, { delay:1, y:0, opacity:1 }, 0.1);
				container.on('click', 'li', function() {
					var id = $(this).attr('href');
					TweenMax.to(win, 1, { scrollTo: { y:id, offsetY:offset - 1 }, ease: thb_ease });
				});
			}
		},
		sounds: {
			selector: '#wrapper',
			music: new buzz.sound( themeajax.sounds.music_sound_file, {
				preload: false,
				loop: true,
				volume: 50
			}),
			hover: new buzz.sound( themeajax.sounds.menu_item_hover_sound_file, {
				preload: themeajax.sounds.menu_item_hover_sound === 'on',
				volume: 50
			}),
			open: new buzz.sound( themeajax.sounds.menu_open_sound_file, {
				preload: themeajax.sounds.menu_open_sound === 'on',
				volume: 50
			}),
			close: new buzz.sound( themeajax.sounds.menu_close_sound_file, {
				preload: themeajax.sounds.menu_close_sound === 'on',
				volume: 50
			}),
			click: new buzz.sound( themeajax.sounds.click_sound_file, {
				preload: themeajax.sounds.click_sound === 'on',
				volume: 50
			})
		},
		toTop: {
			selector: '#scroll_to_top',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.on('click', function(){
					TweenMax.to(win, 1, { scrollTo: { y:0, autoKill:false } });
					return false;
				});
				win.scroll(_.debounce(function(){
					base.control();
				}, 20));
			},
			control: function() {
				var base = this,
						container = $(base.selector);
					
				if (win.scrollTop() > 100) {
					container.addClass('active');
				} else {
					container.removeClass('active');
				}
			}
		},
		toBottom: {
			selector: '.scroll-bottom',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var _this = $(this);
						
					_this.on('click', function(){
						if (SITE.fullPageEnabled) {
							$.fn.fullpage.moveSectionDown();	
						} else {
							var p = _this.parents('.post-gallery').length ? _this.parents('.post-gallery') : _this.closest('.row'),
									h = p.outerHeight(),
									header = $('.header:not(.style3)').outerHeight(),
									finalScroll = p.offset().top + h - ( ( body.hasClass('disable_header_fill-on') || body.hasClass('midnight_on') ) ? 0 : header);
	
							TweenMax.to(win, 1, {scrollTo: { y: finalScroll, autoKill:false } });
						}
						return false;
					});
				});
			}
		},
		animation: {
			selector: '.animation, .thb-counter, .thb-iconbox, .portfolio-title:not(.not-activated), .thb-fadetype',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				if (!$('#thb_fullscreen_rows').length) {
					base.control(container, true);
	
					win.on('scroll.thb-animation', function(){
						base.control(container, true);
					}).trigger('scroll.thb-animation');
				}
			},
			container: function(container) {
				var base = this,
						element = $(base.selector, container);
						
				base.control(element, false);
			},
			control: function(element, filter) {
				var t = 0,
						el = filter ? element.filter(':in-viewport') : element;
				
				el.each(function() {
					var _this = $(this);

					if (_this.hasClass('thb-iconbox')) {
						SITE.iconbox.control(_this, t*0.3);
					} else if (_this.hasClass('thb-counter')) {
						SITE.counter.control(_this, t*0.3);
					} else if (_this.hasClass('portfolio-title')) {
						SITE.portfolioTitle.control(_this, t*0.3);
					} else if (_this.hasClass('thb-fadetype')) {
						SITE.fadeType.control(_this, t*0.3);
					} else if (_this.data('thb-animated') === undefined ) {
						_this.data('thb-animated', true);
						TweenMax.to(_this, 0.75, { autoAlpha: 1, x: 0, y: 0, scale: 1, delay: t*0.3 });
					}
					
					t++;
				});
			}
		},
		portfolioFloat: {
			selector: '.portfolio-floating-button',
			init: function() {
				var base = this,
						container = $(base.selector),
						toggle = container.find('.thb-toggle'),
						content = container.find('.header-content'),
						scroll = container.find('.custom_scroll'),
						tl = new TimelineMax({ 
							paused: true,
							onComplete: function() {
								scroll.perfectScrollbar('update');
							} 
						}),
						header = $('.header'),
						borders = $('.thb-borders').css("border-top-width"),
						hh = !header.hasClass('style3') ? header.outerHeight() : 30;

				win.on('resize', _.debounce(function() {
					container.css({
						'marginTop': hh + ($('.thb-borders').length ? parseInt(borders) : 0) + 15
					});
				}, 30)).trigger('resize');
						
				tl
					.set( content, { display: 'flex', autoAlpha: 1 })
					.from( content, 1, { width:0, height: 0, padding: 0 })
					.to( container.find('>div'), 1, { autoAlpha: 1 });
					
					
				toggle.on('click', function(e) {
					if(!toggle.data('toggled')) {
						tl.timeScale(1).restart();
						toggle.find('.show-message').hide();
						toggle.find('.hide-message').css('display', 'inline-flex');
						toggle.data('toggled', true);
					} else {
						toggle.find('.hide-message').hide();
						toggle.find('.show-message').css('display', 'inline-flex');
						tl.timeScale(1.5).reverse();
						toggle.removeData('toggled');
					}
					e.preventDefault();
					return false;
				});
			}
		},
		fixedMe: {
			selector: '.thb-fixed, .woocommerce-MyAccount-navigation',
			init: function(el) {
				var base = this,
						container = el ? el : $(base.selector),
						a = $('#wpadminbar'),
						ah = (a ? a.outerHeight() : 0);
				if (
					container.parents('.sidebar').length || 
					container.hasClass('woocommerce-MyAccount-navigation') ||
					container.hasClass('header-offset')
				) {
					ah += $('.header').outerHeight();	
				}
				
				if (!thb_md.mobile()) {
					container.each(function() {
						var _this = $(this);
						
						_this.stick_in_parent({
							offset_top: ah,
							spacer: '.sticky-content-spacer',
							recalc_every: 50
						});
					});
					
					$('.post-content, .products, .product-images').imagesLoaded(function() {
						$(document.body).trigger("sticky_kit:recalc");
					});
					win.on('resize', _.debounce(function(){
						$(document.body).trigger("sticky_kit:recalc");
					}, 30));
				}
			}
		},
		pswpGallery: {
			selector: '.thb_gallery',
			init: function(el) {
				var base = this,
						container = $(base.selector),
						options = {
						    index: 0,
						    hideAnimationDuration:500, 
						    showAnimationDuration:500
						};
				
				if (!$('.pswp').length) {
					body.append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div><div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>');
				}
				
				container.each(function(index) {
					var _this = $(this),
							the_gallery = _this,
							pswpElement = document.querySelectorAll('.pswp')[0],
							links = _this.find('a[data-size]'),
							items = [],
							gallery,
							options = {
									galleryUID: index,
							    index: 0,
							    hideAnimationDuration:500, 
							    showAnimationDuration:500,
							    fullscreenEl: true,
							    shareEl: false,
							    captionEl: true,
							    addCaptionHTMLFn: function(item, captionEl, isFake) {						    
							      if(!item.title) {
							        captionEl.children[0].innerHTML = '';
							        return false;
							      }
							      captionEl.children[0].innerHTML = item.title;
							      return true;
							    }
							};
					
					links.each(function() {
						var _this = $(this),
								href = _this.attr('href'),
								src = _this.find('img').attr('src'),
								size = _this.data('size').split('x'),
								item = {
									msrc: src,
									src: href,
									title: _this.attr('title'),
									w: parseInt(size[0], 10),
									h: parseInt(size[1], 10)
								};
						items.push(item);		
					});

					links.on('click', function(e) {
		        e.preventDefault();
		        
						var i = $(this).parents('.thb_gallery').find('a[data-size]').index($(this));
						options.index = i;
						options.getThumbBoundsFn = function(i) {
		            var thumbnail = links[i],
		                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
		                rect = thumbnail.getBoundingClientRect(); 
								
		            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
		        };
		        
						gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
						
						gallery.init();
					});
					
				});
			}
		},
		pswp: {
			selector: '[rel="magnific"]',
			init: function(el) {
				var base = this,
						container = $(base.selector),
						options = {
						    index: 0,
						    hideAnimationDuration:500, 
						    showAnimationDuration:500,
						    fullscreenEl: true,
						    shareEl: false,
						    captionEl: true,
						    addCaptionHTMLFn: function(item, captionEl, isFake) {						    
						      if(!item.title) {
						        captionEl.children[0].innerHTML = '';
						        return false;
						      }
						      captionEl.children[0].innerHTML = item.title;
						      return true;
						    }
						};
				
				if (!$('.pswp').length) {
					body.append('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div><div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div></div></div></div></div>');
				}
				
				container.on('click', function(e) {
					var _this = $(this),
							pswpElement = document.querySelectorAll('.pswp')[0],
							href = _this.attr('href'),
							img = _this.find('img'),
							src = img.attr('src'),
							size = _this.data('size') ? _this.data('size').split('x') : false,
							item = [{
								msrc: src,
								src: href,
								title: _this.attr('title')
							}],
							gallery;

					if (size) {
						item[0].w = parseInt(size[0], 10);
						item[0].h = parseInt(size[1], 10); 
					} else {
						item[0].w = img.attr('width');	
						item[0].h = img.attr('height');	
					}

					options.getThumbBoundsFn = function(i) {
	            var thumbnail = _this[0],
	                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
	                rect = thumbnail.getBoundingClientRect(); 

	            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
	        };
					gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, item, options);
					
					gallery.init();
					
					return false;
				});
			}
		},
		portfolioTitle: {
			selector: '.portfolio-title',
			tl: false,
			control: function(container, delay, skip) {
				if ( ( ( container.data('thb-in-viewport') === undefined ) || skip ) && themeajax.settings.portfolio_title_animation === 'on' ) {
					container.data('thb-in-viewport', true);
					var base = this,
							h1 = container.find('.entry-title'),
							h4 = container.find('h4'),
							p = container.find('p'),
							attr = container.find('.attribute'),
							splith1 = new SplitText(h1, {type:"lines"}),
							splith4 = h4.length ? new SplitText(h4, {type:"lines"}) : false,
							splitp = p.length ? new SplitText(p, {type:"lines"}) : false,
				    	all = $(splith1.lines).add(splith4 ? $(splith4.lines) : false).add(splitp ? $(splitp.lines) : false).add(attr);
					
					base.tl = new TimelineMax({ paused: true });
	 				
					base.tl
						.set(container, { display: 'block', autoAlpha:1})	
						.staggerFrom(all , 0.75, {
						  autoAlpha: 0,
						  delay: delay,
						  y: 20
						}, 0.2, '+=0',function() {
							splith1.revert();	
							if (p.length) {
						  	win.one('resize', function() {
						  		splitp.revert();
						  	});
							}
							if (h4.length) {
								win.one('resize', function() {
									splith4.revert();
								});
							}
						});
					
					if (!skip) {
						base.tl.play();
					} else {
						return base.tl;	
					}
				}
			}
		},
		style6hover: {
			selector: '.type-portfolio.style6',
			start: function() {
				var base = this,
						container = $(base.selector),
						ah = $('#wpadminbar').outerHeight(),
						contentbox = $('.portfolio-hover-content');
				
				if (contentbox.length) {
					container.each(function() {
					var _this = $(this),
							box = _this.find('.style6-box'),
							id = box.data('id'),
							box_width,
							box_height;
					
					_this.hoverIntent(function() {
						contentbox.addClass('active');
						
						box.imagesLoaded(function() {	
							
							if (contentbox.data('active-box') !== id) {
								contentbox.find('.thb-replace').html(box.html());
								contentbox.data('active-box', id);
							}
							contentbox.addClass('loaded');
							box_width = contentbox.outerWidth();
							box_height = contentbox.outerHeight();
						});
					}, function() {
						contentbox.removeClass('active loaded');
					});

					if(!_this.data('binded')) {
						_this.bind('mousemove', function(e){

							_this.data('binded', 1);
							
							var cursor_area = _this,
									offset = cursor_area.offset(),
									mouseX = ((e.clientX + box_width + 40) > win.outerWidth() ? e.clientX - box_width - 40 : e.clientX + 40 ),
									mouseY = ((e.clientY + ( box_height / 2 ) ) > win.outerHeight() ? e.clientY - Math.abs( e.clientY + box_height - win.outerHeight() ) : ( e.clientY - (box_height / 2) ) );
							
							if (mouseY < 0) { mouseY = 0; }
							if (mouseX < 0) { mouseX = 0; }

							TweenMax.set(contentbox, {x:mouseX , y:mouseY, force3D:true});
	
						});
					}
				});
				}
			}
		},
		autoType: {
			selector: '.thb-autotype',
			init: function() {
				var base = this,
						container = $(base.selector);
						
				container.each(function() {
					var _this = $(this),
							entry = _this.find('.thb-autotype-entry'),
							strings = entry.data('strings'),
							speed = entry.data('speed') ? entry.data('speed') : 50,
							loop = entry.data('thb-loop') ? entry.data('thb-loop') : false;
					
					entry.typed({
						strings: strings,
						loop: loop,
						contentType: 'html',
						typeSpeed: speed,
						backDelay: 1000,
					});
				});
			}
		},
		fadeType: {
			selector: '.thb-fadetype',
			control: function(container, delay, skip) {
				if( ( container.data('thb-in-viewport') === undefined ) || skip) {
					container.data('thb-in-viewport', true);
					var base = this,
							split = new SplitText(container.find('.thb-fadetype-entry')),
							tl = new TimelineMax();
						
					tl
						.set(container, {visibility:"visible"})	
						.staggerFrom(split.chars, 1, {
					  autoAlpha: 0,
					  delay: delay
					}, 0.05, '+=0', function() {
						split.revert();
					});
					
				}
			}
		},
		keyNavigation: {
			selector: '.portfolio_nav',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				var thb_nav_click = function(e) {
					if (e.keyCode === 78) { // Next
						if (container.find('.post_nav_link.next').length) {
							container.find('.post_nav_link.next')[0].click();
						}
					}
					if (e.keyCode === 80) { // Prev
						if (container.find('.post_nav_link.prev').length) {
							container.find('.post_nav_link.prev')[0].click();
						}
					}
				};
				$doc.bind('keyup', thb_nav_click);
				
				$('input, textarea').on('focus', function() {
						$doc.unbind('keyup', thb_nav_click);
				});
				$('input, textarea').on('blur', function() {
						$doc.bind('keyup', thb_nav_click);
				});
			}
		},
		counter: {
			selector: '.thb-counter',
			control: function(container, delay) {	
				if( container.data('thb-in-viewport') === undefined ) {
					container.data('thb-in-viewport', true);
					
					var _this = container,
							counter = _this.find('.h1')[0],
							count = _this.find('.h1').data('count'),
							speed = _this.find('.h1').data('speed'),
							svg = _this.find('svg'),
							el = svg.find('path, circle, rect, ellipse'),
							od = new Odometer({
								el: counter,
								value: 0,
								duration: speed,
								theme: 'minimal'
							}),
							tl = new TimelineMax({
								paused: true
							});
						tl
							.set(_this, { visibility: 'visible' })
							.set(svg, { display: 'block' })
							.staggerFrom(el, (speed/2000), { drawSVG: "0%"}, (speed/10000), "s");
						setTimeout(function(){
							tl.play();
							od.update(count);
						}, delay);
				}
			}
		},
		iconbox: {
			selector: '.thb-iconbox',
			control: function(container, delay) {	
				if( container.data('thb-in-viewport') === undefined && !container.hasClass('animation-off')) {
					container.data('thb-in-viewport', true);
					
					var _this = container,
							animation_speed = _this.data('animation_speed') !== '' ? _this.data('animation_speed') : '1.5',
							svg = _this.find('svg'),
							img = _this.find('img'),
							el = svg.find('path, circle, rect, ellipse'),
							h = _this.find('h5'),
							p = _this.find('p'),
							split_p = p.length ? new SplitText(p, {type:"lines"}) : false,
							tl = new TimelineMax({
								delay: delay,
								paused: true, 
								onComplete: function() {
									if (p.length) {
										split_p.revert();	
									}
								} 
							}),
							all = h.add(split_p ? $(split_p.lines) : false).add(img);
					
					tl
						.set(_this, { visibility: 'visible' })
						.set(svg, { display: 'block' })
						.staggerFrom(el, animation_speed, { drawSVG: "0%"}, 0.2, "s")
						.staggerFrom(all, (animation_speed / 2), { autoAlpha: 0, y: '20px'}, 0.1, "s+="+ (animation_speed / 2) );
					
					tl.play();
				}
			}
		},
		contact: {
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
						once;
						
					var bounds = new google.maps.LatLngBounds();
					
					var mapOptions = {
						center: {
							lat: -34.397,
							lng: 150.644
						},
						styles: mapstyle,
						zoom: mapzoom,
						draggable: !("ontouchend" in document),
						scrollwheel: false,
						panControl: panControl,
						zoomControl: zoomControl,
						mapTypeControl: mapTypeControl,
						scaleControl: scaleControl,
						streetViewControl: streetViewControl,
						mapTypeId: mapType
					};

					var map = new google.maps.Map(_this[0], mapOptions);
					
					map.addListener('tilesloaded', function() {
						if (!once) {
							locations.each(function(i) {
								var location = $(this),
										options = location.data('option'),
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
								
								$(pinimageLoad).on('load', function(){
									base.setMarkers(i, locations.length, map, lat, long, marker, marker_size, title, desc, retina);
								});
									once = true;
							});
							
							if(mapzoom > 0) {
								map.setCenter(bounds.getCenter());
								map.setZoom(mapzoom);
							} else {
								map.setCenter(bounds.getCenter());
								map.fitBounds(bounds);
							}
						}
					});
					
					win.on('resize', _.debounce(function(){
						map.setCenter(bounds.getCenter());
					}, 50) );
					
				});
			},
			setMarkers: function(i, count, map, lat, long, marker, marker_size, title, desc, retina) {
				
				function showPin (i) {

					var markerExt = marker.toLowerCase().split('.');
							markerExt = markerExt[markerExt.length - 1];
					
					if($.inArray(markerExt, ['svg']) || retina ) {
						 marker = new google.maps.MarkerImage(marker, null, null, null, new google.maps.Size(marker_size[0]/2, marker_size[1]/2));
					}
					var g_marker = new google.maps.Marker({
								position: new google.maps.LatLng(lat,long),
								map: map,
								animation: google.maps.Animation.DROP,
								icon: marker,
								optimized: false
							}),
							contentString = '<h3>'+title+'</h3>'+'<div>'+desc+'</div>';
					
					// info windows 
					var infowindow = new google.maps.InfoWindow({
							content: contentString
					});
					
					g_marker.addListener('click', function() {
				    infowindow.open(map, g_marker);
				  });
				}
				setTimeout(showPin, i * 250, i);
			}
		},
		ajaxAddToCart: {
			selector: '.add_to_cart_button',
			init: function() {
				var base = this,
						container = $(base.selector);

				body.on('added_to_cart', function(e, fragments, cart_hash, $button) {
					$button.find('.thb_button_icon').html(themeajax.l10n.added_svg);
					$button.find('span').text(themeajax.l10n.added);
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
					first_selector = '.woocommerce-product-gallery__image:first-of-type img',
					org_image = $(first_selector, slider).attr('src'),
					org_thumb = $(first_selector, thumbnails).attr('src'),
					price_container = $('p.price', '.product-information').eq(0),
					org_price = price_container.html();
										
				container.on("show_variation", function(e, variation) {
					price_container.html(variation.price_html);
					if (variation.hasOwnProperty("image") && variation.image.src) {
						$(first_selector, slider).attr("src", variation.image.src).attr("srcset", "");
						$(first_selector, thumbnails).attr("src", variation.image.thumb_src).attr("srcset", "");
						
						if (slider.hasClass('slick-initialized')) {
							slider.slick('slickGoTo', 0);	
						}
					}
				}).on('reset_image', function () {
					price_container.html(org_price);
					$(first_selector, slider).attr("src", org_image).attr("srcset", "");
					$(first_selector, thumbnails).attr("src", org_thumb).attr("srcset", "");
				});
			}
		},
		footerUnfold: {
			selector: '.fixed-footer-container',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				base.run(container);
				
				win.on('resize', _.debounce(function(){
					base.run(container);
				}, 50) );
			},
			run: function(container) {
				var h;
				container.imagesLoaded( { background: true }, function() {
					h = container.outerHeight();
					body.css('padding-bottom', h);
				});
			}
		},
		reviews: {
			selector: '#respond',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on( 'click', 'p.stars a', function(){
					var that = $(this);
					
					setTimeout(function(){ that.prevAll().addClass('active'); }, 10);
				});
			}
		},
		wooWidgets: {
			selector: '.widget.woo',
			init: function() {
				var base = this,
						container = $(base.selector),
						demos = $('.thb-demo-holder');
				
				$('h6', container).on('click', function() {
					$(this).parents('.widget').toggleClass('active');
					return false;
				});
			}
		},
		demoSwitcher: {
			selector: '#toggle-demos',
			init: function() {
				var base = this,
						container = $(base.selector),
						demos = $('.thb-demo-holder');
				
				container.on('click', function() {
					if (!container.data('toggled')) {
						container.data('toggled', true);
						TweenMax.to(demos, 0.5, { autoAlpha: 1 });
					} else {
						container.data('toggled', false);
						TweenMax.to(demos, 0.5, { autoAlpha: 0 });
					}
					return false;
				});
				demos.find('svg').on('click', function() {
					container.data('toggled', false);
					TweenMax.to(demos, 0.5, { autoAlpha: 0 });
				});
			}
		},
	};
	
	$doc.ready(function() {
		if ($('#vc_inline-anchor').length) {
			win.on('vc_reload', function() {
				SITE.init();
			});
		} else {
			SITE.init();
		}
	});

})(jQuery, this);