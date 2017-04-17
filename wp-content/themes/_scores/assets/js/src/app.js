//= require bootstrap

$(document).ready(function(){
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
});


//animations for scroll

(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

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

})(jQuery);


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


//contact form submission js

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        submitMsg(false, "Please fill in the required fields.");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm(){
    // Initiate Variables With Form Content
    var firstName = $("#formFirstName").val();
		var lastName = $("#formLastName").val();
    var email = $("#formEmail").val();
		var title = $("#formTitle").val();
		var company = $("#formCompany").val();
    var message = $("#formMessage").val();

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

function formSuccess(){
	$("#contactForm")[0].reset();
	submitMsg(true, "Thanks for submitting your message.")
}

function submitMsg(valid, msg){
		var msgClasses;

    if(valid){
			msgClasses = "h3 text-center animated text-success";
    } else {
			msgClasses = "h3 text-center text-danger";
    }

    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}


// Activate Carousel
    $("#myCarousel").carousel(
			{interval: false}
		);

    // Enable Carousel Indicators
    $(".carousel-item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".carousel-item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    /*$(".carousel-item3").click(function(){
        $("#myCarousel").carousel(2);
    });*/

    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });



		$('#myCarousel').on('slid', function (e) {
		    // This event is fired when the carousel has completed its slide transition.
		   $("#myCarousel .active .carousel-caption").removeClass("fadeInDown");
		   $("#myCarousel .active .carousel-caption").addClass("fadeOutUp");
		}).on('slide', function (e) {
		    // This event fires immediately when the slide instance method is invoked.
		   $("#myCarousel .active .carousel-caption").removeClass("fadeOutUp");
		   $("#myCarousel .active .carousel-caption").addClass("fadeInDown");
		})

})
