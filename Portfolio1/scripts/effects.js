//Credit to Darcy Clarke for the solution to animating an element to "auto" height/width value
jQuery.fn.animateAuto = function(initProps, prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();

        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);

        el.animate(initProps, speed, callback);
    });
}

var menu_open = false;

var startInterval = null;
var isTyperReady = false;

var messageInterval = null;
// var message = " creatively modulating complexity\"";
var message = " programming is programming is programming is programming is\"";
var processedMessage = "";
var isProcessed = false;

var cursorInterval = null;
var c = 0;

var startupTimer;
var typingTimer;
var untypeTimer;
var thinkTimer;

function typeMessage(){

}

function deleteMessage(){

}

$(document).ready(function(){ //Once DOM is loaded

  cursorInterval = setInterval(function(){
    c++;
    if(c % 3 == 0)
      $('.pseudo-cursor').toggleClass("cursor-toggle");
  }, 180);

  startInterval = setInterval(function(){
    isTyperReady = true;
    clearInterval(startInterval);
  }, 2000);

  messageInterval = setInterval(function(){
    if(isTyperReady){
      //processedMessage += "A";
      if(message.length > 0){
        // if(message.length == 1){
        //   processedMessage = message;
        //   message = "";
        // } else {
        //
        // }
        processedMessage += message.substr(0, 1);
        message = message.substr(1, message.length - 1);
        $('#quote-container p').text(processedMessage);
      } else {
        clearInterval(messageInterval);
      }
    }
  }, 140);

  if(!menu_open){
    var container_height = parseInt($('#icon-container').css("height"), 10);
    var icon_row_height = parseInt($('.icon-row').css("height"), 10);
    var offset = container_height / 2 - icon_row_height / 2;
    $('#dropdown-menu').css("opacity", "1")
    $('#dropdown-menu').css("top", "0px")

    $('#icon-row-1').css("top", offset + "px");
    $('#icon-row-1').css("transform", "rotate(45deg)");
    $('#icon-row-2').css("opacity", "0");
    $('#icon-row-3').css("top", -offset + "px");
    $('#icon-row-3').css("transform", "rotate(-45deg)");
    menu_open = !menu_open;
  }

  //Call when navigation button is pressed
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

  $('#main-container').click(function(){
    if(menu_open){
      var dropdown_menu_height = parseInt($('#dropdown-menu').outerHeight(), 10);
      $('#dropdown-menu').css("top", "-" + dropdown_menu_height + "px")
      $('#icon-row-1').css("top", "0em");
      $('#icon-row-1').css("transform", "rotate(0deg)");
      $('#icon-row-2').css("opacity", "1");
      $('#icon-row-3').css("top", "0em");
      $('#icon-row-3').css("transform", "rotate(0deg)");
      menu_open = !menu_open;
    }
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

      if($(this).attr('href') == "#home"){
        scrollTo = 0;
      } else if($(this).attr('href') == '#contact-content-header'){
        scrollTo = $(document).height() - window_height / 2;
      } else {
        scrollTo = $(hash).offset().top - window_height / 2;
      }

      var scroll_dx = Math.abs(parseInt($('body').scrollTop() - scrollTo));

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({scrollTop: scrollTo}, Math.max(750, scroll_dx), "swing", function(){
        // window.location.hash = hash;
      });
      // $('html, body').animate({
      //   scrollTop: scrollTo
      // }, parseInt(Math.max(1000, scrollTo), 10),
      // function(){
      //   // Add hash (#) to URL when done scrolling (default click behavior)
      //   window.location.hash = hash;
      // });

    } // End if
  });

});
