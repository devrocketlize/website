function isScrolledIntoView(a){var b=$(a),c=$(window),d=c.scrollTop(),e=d+c.height(),f=b.offset().top,g=f+b.height();return g<=e&&f>=d}var LayoutBrand=function(){return{init:function(){$("body").on("click",".c-hor-nav-toggler",function(){var a=$(this).data("target");$(a).toggleClass("c-shown")})}}}(),LayoutHeaderCart=function(){return{init:function(){var a=$(".c-cart-menu");0!==a.size()&&(App.getViewPort().width<App.getBreakpoint("md")?($("body").on("click",".c-cart-toggler",function(a){a.preventDefault(),a.stopPropagation(),$("body").toggleClass("c-header-cart-shown")}),$("body").on("click",function(b){a.is(b.target)||0!==a.has(b.target).length||$("body").removeClass("c-header-cart-shown")})):($("body").on("hover",".c-cart-toggler, .c-cart-menu",function(a){$("body").addClass("c-header-cart-shown")}),$("body").on("hover",".c-mega-menu > .navbar-nav > li:not(.c-cart-toggler-wrapper)",function(a){$("body").removeClass("c-header-cart-shown")}),$("body").on("mouseleave",".c-cart-menu",function(a){$("body").removeClass("c-header-cart-shown")})))}}}(),LayoutHeader=function(){var a=parseInt($(".c-layout-header").attr("data-minimize-offset")>0?parseInt($(".c-layout-header").attr("data-minimize-offset")):0),b=function(){$(window).scrollTop()>a?$("body").addClass("c-page-on-scroll"):$("body").removeClass("c-page-on-scroll")},c=function(){$(".c-layout-header .c-topbar-toggler").on("click",function(a){$(".c-layout-header-topbar-collapse").toggleClass("c-topbar-expanded")})};return{init:function(){$("body").hasClass("c-layout-header-fixed-non-minimized")||(b(),c(),$(window).scroll(function(){b()}))}}}(),LayoutMegaMenu=function(){return{init:function(){$(".c-mega-menu").on("click",".c-toggler",function(a){App.getViewPort().width<App.getBreakpoint("md")&&(a.preventDefault(),$(this).closest("li").hasClass("c-open")?$(this).closest("li").removeClass("c-open"):$(this).closest("li").addClass("c-open"))}),$(".c-layout-header .c-hor-nav-toggler:not(.c-quick-sidebar-toggler)").on("click",function(){if($(".c-layout-header").toggleClass("c-mega-menu-shown"),$("body").hasClass("c-layout-header-mobile-fixed")){var a=App.getViewPort().height-$(".c-layout-header").outerHeight(!0)-60;$(".c-mega-menu").css("max-height",a)}})}}}(),LayoutSidebarMenu=function(){return{init:function(){$(".c-layout-sidebar-menu > .c-sidebar-menu .c-toggler").on("click",function(a){a.preventDefault(),$(this).closest(".c-dropdown").toggleClass("c-open")})}}}(),LayoutQuickSearch=function(){return{init:function(){$(".c-layout-header").on("click",".c-mega-menu .c-search-toggler",function(a){a.preventDefault(),$("body").addClass("c-layout-quick-search-shown"),App.isIE()===!1&&$(".c-quick-search > .form-control").focus()}),$(".c-layout-header").on("click",".c-brand .c-search-toggler",function(a){a.preventDefault(),$("body").addClass("c-layout-quick-search-shown"),App.isIE()===!1&&$(".c-quick-search > .form-control").focus()}),$(".c-quick-search").on("click","> span",function(a){a.preventDefault(),$("body").removeClass("c-layout-quick-search-shown")})}}}(),LayoutCartMenu=function(){return{init:function(){$(".c-layout-header").on("mouseenter",".c-mega-menu .c-cart-toggler-wrapper",function(a){a.preventDefault(),$(".c-cart-menu").addClass("c-layout-cart-menu-shown")}),$(".c-cart-menu, .c-layout-header").on("mouseleave",function(a){a.preventDefault(),$(".c-cart-menu").removeClass("c-layout-cart-menu-shown")}),$(".c-layout-header").on("click",".c-brand .c-cart-toggler",function(a){a.preventDefault(),$(".c-cart-menu").toggleClass("c-layout-cart-menu-shown")})}}}(),LayoutQuickSidebar=function(){return{init:function(){$(".c-layout-header").on("click",".c-quick-sidebar-toggler",function(a){a.preventDefault(),a.stopPropagation(),$("body").hasClass("c-layout-quick-sidebar-shown")?$("body").removeClass("c-layout-quick-sidebar-shown"):$("body").addClass("c-layout-quick-sidebar-shown")}),$(".c-layout-quick-sidebar").on("click",".c-close",function(a){a.preventDefault(),$("body").removeClass("c-layout-quick-sidebar-shown")}),$(".c-layout-quick-sidebar").on("click",function(a){a.stopPropagation()}),$(document).on("click",".c-layout-quick-sidebar-shown",function(a){$(this).removeClass("c-layout-quick-sidebar-shown")})}}}(),LayoutGo2Top=function(){var a=function(){var a=$(window).scrollTop();a>300?$(".c-layout-go2top").show():$(".c-layout-go2top").hide()};return{init:function(){a(),navigator.userAgent.match(/iPhone|iPad|iPod/i)?$(window).bind("touchend touchcancel touchleave",function(b){a()}):$(window).scroll(function(){a()}),$(".c-layout-go2top").on("click",function(a){a.preventDefault(),$("html, body").animate({scrollTop:0},600)})}}}(),LayoutOnepageNav=function(){var a=function(){var a,b,c;$("body").addClass("c-page-on-scroll"),a=$(".c-layout-header-onepage").outerHeight(!0),$("body").removeClass("c-page-on-scroll"),$(".c-mega-menu-onepage-dots").size()>0?($(".c-onepage-dots-nav").size()>0&&$(".c-onepage-dots-nav").css("margin-top",-($(".c-onepage-dots-nav").outerHeight(!0)/2)),b=$("body").scrollspy({target:".c-mega-menu-onepage-dots",offset:a}),c=parseInt($(".c-mega-menu-onepage-dots").attr("data-onepage-animation-speed"))):(b=$("body").scrollspy({target:".c-mega-menu-onepage",offset:a}),c=parseInt($(".c-mega-menu-onepage").attr("data-onepage-animation-speed"))),b.on("activate.bs.scrollspy",function(){$(this).find(".c-onepage-link.c-active").removeClass("c-active"),$(this).find(".c-onepage-link.active").addClass("c-active")}),$(".c-onepage-link > a").on("click",function(b){var d=$(this).attr("href"),e=0;"#home"!==d&&(e=$(d).offset().top-a+1),$("html, body").stop().animate({scrollTop:e},c,"easeInExpo"),b.preventDefault(),App.getViewPort().width<App.getBreakpoint("md")&&$(".c-hor-nav-toggler").click()})};return{init:function(){a()}}}(),LayoutThemeSettings=function(){var a=function(){$(".c-settings .c-color").on("click",function(){var a=$(this).attr("data-color");$("#style_theme").attr("href","../assets/base/css/themes/"+a+".css"),$(".c-settings .c-color").removeClass("c-active"),$(this).addClass("c-active")}),$(".c-setting_header-type").on("click",function(){var a=$(this).attr("data-value");"fluid"==a?($(".c-layout-header .c-topbar > .container").removeClass("container").addClass("container-fluid"),$(".c-layout-header .c-navbar > .container").removeClass("container").addClass("container-fluid")):($(".c-layout-header .c-topbar > .container-fluid").removeClass("container-fluid").addClass("container"),$(".c-layout-header .c-navbar > .container-fluid").removeClass("container-fluid").addClass("container")),$(".c-setting_header-type").removeClass("active"),$(this).addClass("active")}),$(".c-setting_header-mode").on("click",function(){var a=$(this).attr("data-value");"static"==a?$("body").removeClass("c-layout-header-fixed").addClass("c-layout-header-static"):$("body").removeClass("c-layout-header-static").addClass("c-layout-header-fixed"),$(".c-setting_header-mode").removeClass("active"),$(this).addClass("active")}),$(".c-setting_font-style").on("click",function(){var a=$(this).attr("data-value");"light"==a?($(".c-font-uppercase").addClass("c-font-uppercase-reset").removeClass("c-font-uppercase"),$(".c-font-bold").addClass("c-font-bold-reset").removeClass("c-font-bold"),$(".c-fonts-uppercase").addClass("c-fonts-uppercase-reset").removeClass("c-fonts-uppercase"),$(".c-fonts-bold").addClass("c-fonts-bold-reset").removeClass("c-fonts-bold")):($(".c-font-uppercase-reset").addClass("c-font-uppercase").removeClass("c-font-uppercase-reset"),$(".c-font-bold-reset").addClass("c-font-bold").removeClass("c-font-bold-reset"),$(".c-fonts-uppercase-reset").addClass("c-fonts-uppercase").removeClass("c-fonts-uppercase-reset"),$(".c-fonts-bold-reset").addClass("c-fonts-bold").removeClass("c-fonts-bold-reset")),$(".c-setting_font-style").removeClass("active"),$(this).addClass("active")}),$(".c-setting_megamenu-style").on("click",function(){var a=$(this).attr("data-value");"dark"==a?$(".c-mega-menu").removeClass("c-mega-menu-light").addClass("c-mega-menu-dark"):$(".c-mega-menu").removeClass("c-mega-menu-dark").addClass("c-mega-menu-light"),$(".c-setting_megamenu-style").removeClass("active"),$(this).addClass("active")})};return{init:function(){a()}}}(),ContentOwlcarousel=function(){var a=function(){$("[data-slider='owl'] .owl-carousel").each(function(){var b,c,d,e,f,g,a=$(this),h=!!a.data("rtl")&&a.data("rtl"),i=!a.data("loop")||a.data("loop"),j=!a.data("navigation-dots")||a.data("navigation-dots"),k=!!a.data("navigation-label")&&a.data("navigation-label");1==a.data("single-item")?(b=1,c=1,d=1,e=1,f=1,g=1):(b=a.data("items"),c=[1199,a.data("desktop-items")?a.data("desktop-items"):b],d=[979,a.data("desktop-small-items")?a.data("desktop-small-items"):3],e=[768,a.data("tablet-items")?a.data("tablet-items"):2],g=[479,a.data("mobile-items")?a.data("mobile-items"):1]),$(this).owlCarousel({rtl:h,loop:i,items:b,responsive:{0:{items:a.data("mobile-items")?a.data("mobile-items"):1},480:{items:a.data("mobile-items")?a.data("mobile-items"):1},768:{items:a.data("tablet-items")?a.data("tablet-items"):2},980:{items:a.data("desktop-small-items")?a.data("desktop-small-items"):3},1200:{items:a.data("desktop-items")?a.data("desktop-items"):b}},dots:j,nav:k,navText:!1,autoplay:!a.data("auto-play")||a.data("auto-play"),autoplayTimeout:a.data("slide-speed"),autoplayHoverPause:!!a.data("auto-play-hover-pause")&&a.data("auto-play-hover-pause"),dotsSpeed:a.data("slide-speed")})})};return{init:function(){a()}}}(),ContentCubeLatestPortfolio=function(){var a=function(){$(".c-content-latest-works").cubeportfolio({filters:"#filters-container",loadMore:"#loadMore-container",loadMoreAction:"click",layoutMode:"grid",defaultFilter:"*",animationType:"quicksand",gapHorizontal:20,gapVertical:23,gridAdjustment:"responsive",mediaQueries:[{width:1100,cols:4},{width:800,cols:3},{width:500,cols:2},{width:320,cols:1}],caption:"zoom",displayType:"lazyLoading",displayTypeSpeed:100,lightboxDelegate:".cbp-lightbox",lightboxGallery:!0,lightboxTitleSrc:"data-title",lightboxCounter:'<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',singlePageDelegate:".cbp-singlePage",singlePageDeeplinking:!0,singlePageStickyNavigation:!0,singlePageCounter:'<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',singlePageCallback:function(a,b){var c=this;$.ajax({url:a,type:"GET",dataType:"html",timeout:5e3}).done(function(a){c.updateSinglePage(a)}).fail(function(){c.updateSinglePage("Error! Please refresh the page!")})}}),$(".c-content-latest-works-fullwidth").cubeportfolio({loadMoreAction:"auto",layoutMode:"grid",defaultFilter:"*",animationType:"fadeOutTop",gapHorizontal:0,gapVertical:0,gridAdjustment:"responsive",mediaQueries:[{width:1600,cols:5},{width:1200,cols:4},{width:800,cols:3},{width:500,cols:2},{width:320,cols:1}],caption:"zoom",displayType:"lazyLoading",displayTypeSpeed:100,lightboxDelegate:".cbp-lightbox",lightboxGallery:!0,lightboxTitleSrc:"data-title",lightboxCounter:'<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>'})};return{init:function(){a()}}}(),ContentCounterUp=function(){var a=function(){$("[data-counter='counterup']").counterUp({delay:10,time:1e3})};return{init:function(){a()}}}(),ContentFancybox=function(){var a=function(){$("[data-lightbox='fancybox']").fancybox()};return{init:function(){a()}}}(),ContentTwitter=function(){var a=function(){$(".twitter-timeline")[0]&&!function(a,b,c){var d,e=a.getElementsByTagName(b)[0],f=/^http:/.test(a.location)?"http":"https";a.getElementById(c)||(d=a.createElement(b),d.id=c,d.src=f+"://platform.twitter.com/widgets.js",e.parentNode.insertBefore(d,e))}(document,"script","twitter-wjs")};return{init:function(){a()}}}(),LayoutProgressBar=function(a){return{init:function(){var b=0;a(".c-progress-bar-line").each(function(){b++;var d=(a(this).attr("data-id",b),'.c-progress-bar-line[data-id="'+b+'"]'),e=a(this).data("progress-bar");e=e.toLowerCase().replace(/\b[a-z]/g,function(a){return a.toUpperCase()}),"Semicircle"==e&&(e="SemiCircle");var f=a(this).css("border-top-color"),g=a(this).data("animation"),h=a(this).data("stroke-width"),i=a(this).data("duration"),j=a(this).data("trail-width"),k=a(this).data("trail-color"),l=a(this).data("progress"),m=a(this).css("color");"rgb(92, 104, 115)"==f&&(f="#32c5d2"),""==k&&(k="#5c6873"),""==j&&(j="0"),""==l&&(l="1"),""==h&&(h="3"),""==g&&(g="easeInOut"),""==i&&(i="1500");var n=new ProgressBar[e](d,{strokeWidth:h,easing:g,duration:i,color:f,trailWidth:j,trailColor:k,svgStyle:null,step:function(a,b){b.setText(Math.round(100*b.value())+"%")},text:{style:{color:m}}}),o=isScrolledIntoView(d);1==o&&n.animate(l),a(window).scroll(function(a){var b=isScrolledIntoView(d);1==b&&n.animate(l)})})}}}(jQuery),LayoutCookies=function(){var a=function(){$(".c-cookies-bar-close").click(function(){$(".c-cookies-bar").animate({opacity:0},500,function(){$(".c-cookies-bar").css("display","none")})})};return{init:function(){a()}}}(),LayoutSmoothScroll=function(){var a=function(){$(".js-smoothscroll").on("click",function(){var a=$(this).data("target");return $.smoothScroll({scrollTarget:"#"+a}),!1})};return{init:function(){a()}}}();$(document).ready(function(){LayoutBrand.init(),LayoutHeader.init(),LayoutHeaderCart.init(),LayoutMegaMenu.init(),LayoutSidebarMenu.init(),LayoutQuickSearch.init(),LayoutCartMenu.init(),LayoutQuickSidebar.init(),LayoutGo2Top.init(),LayoutOnepageNav.init(),LayoutThemeSettings.init(),LayoutProgressBar.init(),LayoutCookies.init(),LayoutSmoothScroll.init(),ContentOwlcarousel.init(),ContentCubeLatestPortfolio.init(),ContentCounterUp.init(),ContentFancybox.init(),ContentTwitter.init()});