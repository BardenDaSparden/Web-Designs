var menu_open = false;

$(document).ready(function(){ //Once DOM is loaded

  $('#icon-container').click(function(){

    //Calculate movement of top / bottom '.icon-row' based on container height, and '.icon-row' height
    var container_height = parseInt($('#icon-container').css("height"), 10);
    var icon_row_height = parseInt($('.icon-row').css("height"), 10);
    var offset = container_height / 2 - icon_row_height / 2;
    var dropdown_menu_height = parseInt($('#dropdown-menu').outerHeight(), 10);

    if(!menu_open){
      //Do Open animation
      // $('#icon-container').css("background", "rgba(33, 33, 33, 1)");

      // $('#dropdown-menu').css("display", "flex")
      $('#dropdown-menu').css("opacity", "1")
      $('#dropdown-menu').css("top", "0px")

      $('#icon-row-1').css("top", offset + "px");
      $('#icon-row-1').css("transform", "rotate(45deg)");
      $('#icon-row-2').css("opacity", "0");
      $('#icon-row-3').css("top", -offset + "px");
      $('#icon-row-3').css("transform", "rotate(-45deg)");

    } else {
      //Do Close Animation
      // $('#icon-container').css("background", "rgba(0, 0, 0, 0.0)");

      // $('#dropdown-menu').css("display", "none")
      // $('#dropdown-menu').css("opacity", "0")
      $('#dropdown-menu').css("top", "-" + dropdown_menu_height + "px")

      $('#icon-row-1').css("top", "0em");
      $('#icon-row-1').css("transform", "rotate(0deg)");
      $('#icon-row-2').css("opacity", "1");
      $('#icon-row-3').css("top", "0em");
      $('#icon-row-3').css("transform", "rotate(0deg)");
    }

    //toggle menu state
    menu_open = !menu_open;
  });

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;
      var window_height = $(window).height();
      var scrollTo = 0;

      if($(this).attr('href') == "#about-me-header"){
        scrollTo = 0;
      } else {
        scrollTo = $(hash).offset().top - window_height / 2;
      }

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: scrollTo
      }, 1000, function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });

    } // End if
  });

});
