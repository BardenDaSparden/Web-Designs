$('.navbar li').click(function(e) {
    $('.navbar li.active').removeClass('active');
    var $this = $(this);
    if (!$this.hasClass('active')) {
        $this.addClass('active');
    }
    e.preventDefault();
});

$(".navbar li a[href^='#']").on('click', function(event) {
  var target;
  target = this.hash;

  event.preventDefault();

  var navOffset;
  navOffset = $('#navbar').height();

  return $('html, body').animate({
    scrollTop: $(this.hash).offset().top - navOffset - 50
  }, 500, function() {
    return window.history.pushState(null, null, target);
  });
});

$(".nav-btn[href^='#']").on('click', function(event) {
  var target;
  target = this.hash;

  event.preventDefault();

  var navOffset;
  navOffset = $('#navbar').height();

  return $('html, body').animate({
    scrollTop: $(this.hash).offset().top - navOffset
  }, 500, function() {
    return window.history.pushState(null, null, target);
  });
});
