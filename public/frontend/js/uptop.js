$(document).ready(function() {
			  /******************************
			      BOTTOM SCROLL TOP BUTTON
			   ******************************/ 
			  // declare variable
			  var scrollTop = $(".scrollTop");
			  $(window).scroll(function() {
			    // declare variable
			    var topPos = $(window).scrollTop();
			    // if user scrolls down - show scroll to top button
			    if (topPos > 100) {
			      $(scrollTop).css("opacity", ".5");
			    } else {
			      $(scrollTop).css("opacity", "0");
			  }
	 	 	}); 
			  //Click event to scroll to top
		  $(scrollTop).click(function() {
		    $('html, body').animate({
		      scrollTop: 0
		    }, 800);
		    return false;

		  }); // click() scroll top EMD
		});