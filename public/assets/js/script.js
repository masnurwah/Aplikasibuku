var position = $(window).scrollTop(); 
var x1 = true;
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if(scroll > position) {
    $('#main-nav').removeClass('scroll-up').addClass('scroll-down');
  } else {
    $('#main-nav').removeClass('scroll-down').addClass('scroll-up');
  }
  position = scroll;

  if($('.snapshot').is(':visible')) {
    counterAnimate('.counter');
  }
});
$.fn.scrollEnd = function(callback, timeout) {          
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
$(window).scrollEnd(function(){
  $('#main-nav').removeClass(['scroll-up', 'scroll-down']);
}, 1000);
$('.slick-banner').slick({
  arrows: false,
  dots: true,
  fade: true,
  autoplay: true,
  autoplaySpeed: 5000
});
$('.product-packaging-banner').slick({
  arrows: true,
  dots: false,
  autoplay: false,
  autoplaySpeed: 5000,
  prevArrow: '<div class="arrow-item arrow-left"><i class="fas fa-caret-left"></i></div>',
  nextArrow: '<div class="arrow-item arrow-right"><i class="fas fa-caret-right"></i></div>',
});
function counterAnimate(classNumber) {
  if (x1) {
      $(classNumber).each(function() {
          $(this).prop('Counter', 0).animate({
              Counter: $(this).text()
          }, {
              duration: 3000,
              easing: 'swing',
              step: function(now) {
                  $(this).text(Math.ceil(now));
              }
          });
      });
      x1 = false;
  }
}
$('.navbar-nav .nav-item').on('mouseenter', function() {
  if($(this).hasClass('dropdown')) {
    $(this).addClass('show');
    $(this).children('.dropdown-toggle').attr('aria-expanded', true);
    $(this).children('.dropdown-menu').addClass('show');
  }
});
$('.navbar-nav .nav-item').on('mouseleave', function() {
  if($(this).hasClass('dropdown')) {
    $(this).removeClass('show');
    $(this).children('.dropdown-toggle').attr('aria-expanded', false);
    $(this).children('.dropdown-menu').removeClass('show');
  }
});
$('.companies-tabs').slick({
  arrows: true,
  prevArrow: '<div class="arrow-item arrow-left"><i class="fas fa-caret-left"></i></div>',
  nextArrow: '<div class="arrow-item arrow-right"><i class="fas fa-caret-right"></i></div>',
  infinite: false,
  slidesToShow: 5,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
$('.companies-tabs .nav-item').on('click', function() {
  $('.companies-tabs .nav-item').children('.nav-link').removeClass('active');
});
$('.products-tabs').slick({
  arrows: true,
  prevArrow: '<div class="arrow-item arrow-left"><i class="fas fa-caret-left"></i></div>',
  nextArrow: '<div class="arrow-item arrow-right"><i class="fas fa-caret-right"></i></div>',
  infinite: false,
  slidesToShow: 4,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
$('.products-tabs .nav-item').on('click', function() {
  $('.products-tabs .nav-item').children('.nav-link').removeClass('active');
});
