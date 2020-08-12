//Menu toggle
var menu_open = false;

//Background image movement offsets
var startOffset = 20.0;
var endOffset = 0.0;

var HOME_PAGE = 0;
var ABOUT_PAGE = 1;
var EXPERIENCE_PAGE = 2;
var PROJECTS_PAGE = 3;
var CONTACT_PAGE = 4;
var activePage = HOME_PAGE;

function OpenNavigation(){
  var container_height = parseInt($('#icon-container').css("height"), 10);
  var icon_row_height = parseInt($('.icon-row').css("height"), 10);
  var offset = container_height / 2 - icon_row_height / 2;

  //Icon Styling
  $('.icon-row').css("background", "#655CA5");
  $('#icon-row-1').css("top", offset + "px");
  $('#icon-row-1').css("transform", "rotate(45deg)");
  $('#icon-row-2').css("opacity", "0");
  $('#icon-row-3').css("top", -offset + "px");
  $('#icon-row-3').css("transform", "rotate(-45deg)");

  //Menu Styling
  $('#dropdown-menu').css("display", "flex");
  $('#dropdown-menu').css("opacity", "1")
  $('#dropdown-menu').animate({top:"0px"}, 500);
  menu_open = !menu_open;
}

function CloseNavigation(){
  var dropdown_menu_height = parseInt($('#dropdown-menu').outerHeight(), 10);

  //Icon Styling
  $('#icon-row-1').css("top", "0em");
  $('#icon-row-1').css("transform", "rotate(0deg)");
  $('#icon-row-2').css("opacity", "1");
  $('#icon-row-3').css("top", "0em");
  $('#icon-row-3').css("transform", "rotate(0deg)");
  $('.icon-row').css("background", "rgba(255, 255, 255, 0.12)");

  //Menu Styling
  $('#dropdown-menu').animate({top:"-" + dropdown_menu_height + "px"}, 500);
  $('#dropdown-menu').promise().done(function(){
    $('#icon-container').blur();
    //required incase menu button is spammed
    if(menu_open){
      $('#dropdown-menu').css("display", "none");
    }
  });

  menu_open = !menu_open;
}

function setActiveLink(link){
  var name = link.attr('id');
  if(name == "home-link"){
    activePage = HOME_PAGE;
  }
  if(name == "about-link"){
    activePage = ABOUT_PAGE;
  }
  if(name == "experience-link"){
    activePage = EXPERIENCE_PAGE;
  }
  if(name == "projects-link"){
    activePage = PROJECTS_PAGE;
  }
  if(name == "contact-link"){
    activePage = CONTACT_PAGE;
  }

  var base = $('.menu-link');
  base.find("img").css("opacity", 0.7);
  base.find("p").css("color", "#B4B4B4");
  base.css("box-shadow", "inset 0px 0px 0px 0px #655CA5");

  link.find("img").css("opacity", 1);
  link.find("p").css("color", "#EFEFEF");
  link.css("box-shadow", "inset 0px -6px 0px 0px #655CA5");
}

function configureCharts(){
  CanvasJS.addColorSet("purpleShades", [
                "#544d89",
                "#746bbf",
                "#655ca5",
                "#544d89",
                "#7369bc"
  ]);

  CanvasJS.addColorSet("cyanShades", [
                "#488ea5",
                "#5fbad8",
                "#54a4bf",
                "#488ea5",
                "#5fbad8"
  ]);

  var chart = new CanvasJS.Chart("chart-overview", {
    colorSet:"cyanShades",
    backgroundColor: "transparent",
    title:{
      padding:10,
      backgroundColor:"rgba(0, 0, 0, 0.18)",
      cornerRadius:5,
      text:"Langauges",
      verticalAlign: "center",
      fontSize: "20",
      fontFamily:"Montserrat",
      fontWeight:"normal",
      fontColor:"#CDCDCD"
    },
    toolTip:{
			content: "{y}: {name}"
		},
    data:[{
      name:"Years",
      indexLabelFontSize: 14,
      indexLabelFontColor: "#CDCDCD",
      type:"doughnut",
      radius:"90%",
      innerRadius:"78%",
      dataPoints: [
        {y:7.5, indexLabel:"Java"},
        {y:3.5, indexLabel:"OpenGL"},
        {y:3.5, indexLabel:"GLSL"},
        {y:5, indexLabel:"HTML/CSS"},
        {y:5, indexLabel:"Javascript"},
        {y:2.5, indexLabel:"PHP/MYSQL"},
        {y:1, indexLabel:"C++"}
      ]
    }]
  });
  chart.render();

  var chart2 = new CanvasJS.Chart("chart-tools", {
    colorSet:"purpleShades",
    backgroundColor: "transparent",
    title:{
      padding:10,
      backgroundColor:"rgba(0, 0, 0, 0.18)",
      cornerRadius:5,
      text:"Tools",
      verticalAlign: "center",
      fontSize: "20",
      fontFamily:"Montserrat",
      fontWeight:"normal",
      fontColor:"#CDCDCD"
    },
    toolTip:{
			content: "{y}: {name}"
		},
    data:[{
      name:"Years",
      indexLabelFontSize: 14,
      indexLabelFontColor: "#CDCDCD",
      type:"doughnut",
      radius:"90%",
      innerRadius:"78%",
      dataPoints: [
        {y:6, indexLabel:"Photoshop"},
        {y:4, indexLabel:"Eclipse"},
        {y:2, indexLabel:"After Effects"},
        {y:2, indexLabel:"Cinema 4D"},
        {y:1, indexLabel:"3DS Max"},
        {y:1, indexLabel:"Blender"},
      ]
    }]
  });
  chart2.render();

  var chart3 = new CanvasJS.Chart("chart-libraries", {
    colorSet:"cyanShades",
    backgroundColor: "transparent",
    title:{
      padding:10,
      backgroundColor:"rgba(0, 0, 0, 0.18)",
      cornerRadius:5,
      text:"Libraries",
      verticalAlign: "center",
      fontSize: "20",
      fontFamily:"Montserrat",
      fontWeight:"normal",
      fontColor:"#CDCDCD"
    },
    toolTip:{
			content: "{y}: {name}"
		},
    data:[{
      name:"Years",
      indexLabelFontSize: 14,
      indexLabelFontColor: "#CDCDCD",
      tickLength:3,
      type:"doughnut",
      radius:"90%",
      innerRadius:"78%",
      dataPoints: [
        {y:5, indexLabel:"GIT"},
        {y:1, indexLabel:"LWJGL"},
        {y:1, indexLabel:"JavaFX"},
        {y:1, indexLabel:"libGDX"},
        {y:1, indexLabel:"Box2D"},
        {y:1, indexLabel:"Maven"},
        {y:1, indexLabel:"JOML"},
        {y:1, indexLabel:"KryoNet"},
        {y:1, indexLabel:"jQuery"},
        {y:1, indexLabel:"canvas.js"},
      ]
    }]
  });
  chart3.render();
}

function resizeBackground(){
  var h = parseInt($('#main-container').css("height"), 10);
  $('#page-background').css("height", h + "px");
  $('#page-background').css("transform", "scale(1)");
}

function setupPage(){
  //Reset scroll
  $('html').animate({scrollTop:0}, 1);
  $('body').animate({scrollTop:0}, 1);

  // var w = $(document).width();
  // $('#message').text(w);
  // alert(w);

  //Create a spacer the same height as menu to offset content area
  var header_menu_height = $('#navigation-menu').outerHeight();
  $('#spacer-container').css("height", header_menu_height+"px");

  resizeBackground();
  //alert("Main Container Height: " + h);

  var container = $('#page-background');
  container.css("background-position", "50% " + startOffset + "%");

  setActiveLink($('#home-link'));
}

$(document).ready(function(){ //Once DOM is loaded

  configureCharts();
  setupPage();

  if(!menu_open){
    var dropdown_menu_height = parseInt($('#dropdown-menu').outerHeight(), 10);
    $('#dropdown-menu').css("top", "-" + dropdown_menu_height + "px");
  }

  //Toggle menu on click
  $('#icon-container').click(function(){
    if(!menu_open){
      OpenNavigation();
    } else {
      CloseNavigation();
    }
  });

  $(window).resize(function(){
    resizeBackground();
  });

  $(window).scroll(function(event){
     var st = parseFloat($(this).scrollTop());
     var height = parseFloat($(document).height());
     var container = $('#page-background');
     var scale = startOffset + (st / height) * ((100.0 - startOffset) + endOffset);
     container.css("background-position", "50% " + scale + "%");
     var contactMarker = $("#contact-page").offset().top;
     var projectsMarker = $("#projects-page").offset().top;
     var experienceMarker = $("#experience-page").offset().top;
     var aboutMarker = $("#about-page").offset().top;
     var homeMarker = $("#home-page").offset().top;

     var currentPage = HOME_PAGE;
     st += 1; //Offset region to test to account for floating error

     if(st > aboutMarker){
       currentPage = ABOUT_PAGE;
     }

     if(st > experienceMarker){
       currentPage = EXPERIENCE_PAGE;
     }

     if(st > projectsMarker){
       currentPage = PROJECTS_PAGE;
     }

     if(st > contactMarker){
       currentPage = CONTACT_PAGE;
     }

     if(currentPage != activePage){
       if(currentPage == HOME_PAGE){
         setActiveLink($('#home-link'));
       } else if(currentPage == ABOUT_PAGE){
         setActiveLink($('#about-link'));
       } else if(currentPage == EXPERIENCE_PAGE){
         setActiveLink($('#experience-link'));
       } else if(currentPage == PROJECTS_PAGE){
         setActiveLink($('#projects-link'));
       } else if(currentPage == CONTACT_PAGE){
         setActiveLink($('#contact-link'));
       }
     }

  });

  //When somewhere besides the menu is clicked, close it
  $('#main-container').click(function(){
    if(menu_open){
      CloseNavigation();
    }
  });

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    var curr = $(this);

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      CloseNavigation();

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;
      var window_height = $(window).height();
      var scrollTo = 0;

      scrollTo = $(hash).offset().top;//window_height / 2;
      //scrollTo = Math.max(Math.min(scrollTo, scrollMax), scrollMin);
      //var scroll_dx = parseInt($('body').scrollTop() - scrollTo);

      $('html, body').animate({scrollTop: scrollTo}, 1000, "swing", function(){
        // window.location.hash = hash;
        curr.blur();
      });
    }
  });
});
