( function($) {

$(document).ready(function(){

	// Dropdown Nav Menu
	$('ul.nav li.dropdown').hover(function() {
  	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
	}, function() {
  	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
	});


	var didScroll = false;

	$(window).on('scroll', function(){
		didScroll = true;
	});

	setInterval(function(){
		if (didScroll){
			scrollNav();

			if ($('.our-approach__plus').length){
				$('.our-approach__plus').each(function(){
					var imagePos = $(this).offset().top - $(window).scrollTop();
					var topOfWindow = $(window).scrollTop();
					var halfway = $(window).height()/2;

					if (imagePos < halfway) {
						$(this).addClass('inView');
					}
				});
			}

			if ( $('.jumbotron__page').length ) {
				$('.jumbotron__page').css('filter', 'blur(0px)');
			}

			didScroll = false;
		}
	}, 250)

	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('.navbar').outerHeight();

	function scrollNav() {
		var st = $(this).scrollTop();

		if (Math.abs(lastScrollTop - st) <= delta) {
			return;
		}

		// hide navbar on scroll down
		if (st > lastScrollTop && st > navbarHeight){
			$('.navbar').removeClass('nav-show').addClass('nav-hide');
		} else {
			if (st + $(window).height() < $(document).height()) {
				$('.navbar').removeClass('nav-hide').addClass('nav-show');
			}
		}
		lastScrollTop = st;
	}

	// Slick Client Slider Initialization
	$('.client-slider').slick({
		arrows: true,
		prevArrow: '<i class="slick-prev fa fa-chevron-left"></i>',
		nextArrow: '<i class="slick-next fa fa-chevron-right"></i>',
		slidesToShow: 6,
		slidesToScroll: 3,
		swipeToSlide: true,
		infinite: true,

		responsive: [{

			breakpoint: 768,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
			},

		}]
	});

	// Slick Brand Slider Initialization
	// Check if two brand slides exist, if so initialize Slick
	if ( $('.brand-col').length > 1 ){

		$('.brand-slider').slick({
			arrows: true,
			prevArrow: '<i class="slick-prev fa fa-chevron-left"></i>',
			nextArrow: '<i class="slick-next fa fa-chevron-right"></i>',
			dots: false,
			lazyLoad: 'ondemand',
			slidesToScroll: 1,
			swipeToSlide: true,
		});
	}



// TO DO
// custom custom script

$.fn.visible = function(partial) {
  var $t            = $(this),
      $w            = $(window),
      viewTop       = $w.scrollTop(),
      viewBottom    = viewTop + $w.height(),
      _top          = $t.offset().top,
      _bottom       = _top + $t.height(),
      compareTop    = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom;

	return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

};

var win = $(window);

var allMods = $(".scroll");

allMods.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("already-visible");
  }
});

win.scroll(function(event) {

  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("animate-scroll-pop");
    }
  });

});


// Contact Form Submission js
$("#contactForm").validator().on("submit", function (event) {
  if (event.isDefaultPrevented()) {
  	submitMsg(false, "Please fill in the required fields.");
  } else {
    // everything looks good!
    event.preventDefault();
    submitForm();
  }
});

var submitForm = function(){
  // Initiate Variables With Form Content
  var firstName = $("#formFirstName").val();
	var lastName 	= $("#formLastName").val();
  var email 		= $("#formEmail").val();
	var title 		= $("#formTitle").val();
	var company 	= $("#formCompany").val();
  var message 	= $("#formMessage").val();

  $.ajax({
    type: "POST",
    url: "php/form-process.php",
    data: "firstName=" + firstName + "&lastName=" + lastName + "&email=" + email + "&title=" + title + "&company=" + company + "&message=" + message,
    success : function(text){
	  	if (text == "success"){
	    	formSuccess();
			} else {
	    	submitMsg(false,text);
	    }
    }
  });
}

var formSucces = function(){
	$("#contactForm")[0].reset();
	submitMsg(true, "Thanks for submitting your message.")
}

var submitMsg = function(valid, msg){
	var msgClasses;

  if(valid){
		msgClasses = "h3 text-center animated text-success";
  } else {
		msgClasses = "h3 text-center text-danger";
  }

  $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

})
}) (jQuery);
