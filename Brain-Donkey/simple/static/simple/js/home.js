//Initialize Plexus data
//This may be used somewhere in an element of the DOM somewhere usable

/**
 * Thanks to Mozilla Developer Network
 * Returns a random integer between min (inclusive) and max (inclusive).
 * The value is no lower than min (or the next integer greater than min
 * if min isn't an integer) and no greater than max (or the next integer
 * lower than max if max isn't an integer).
 * Using Math.round() will give you a non-uniform distribution!
 */
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

$(document).ready(function(){
  var plexus = new Plexus("plexus", {
      pointsSpeed: 1,
      pointsRadius: 0.01,
      pointsStartDistance: 50
  });
});

var blurbs = ["printf(%s, \"Hello!\");","print(\"Hello!\")","DISPLAY \"Hello!\"","alert(\"Hello!\");","System.out.print(\"Hello!\")","Matrix.Choice();","fact(i*i*i);", "Hello World!"];

$(document).ready(function(){
  $("#menu-btn").click(function(){
    $("#subnav-container").toggle();
  });

  var idx = getRandomInt(0, blurbs.length);
  var blurb = blurbs[idx];

  $("#logo-message").text(blurb);

});
