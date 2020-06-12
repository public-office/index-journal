var $initial
document.addEventListener('DOMContentLoaded', function() {
  $initial = document.querySelector('.initial')
})

window.addEventListener('scroll', function() {
  var d = window.scrollY - window.innerHeight
  var d = Math.max(0, d)

  if($initial) $initial.style.transform = 'translateY('+(0-d)+'px)'
})

function loadImages() {
  $('img, figure').imagesLoaded({ background: true })
  .progress( function( instance, image ) {
    console.log()
    $(image.element || image.img).addClass('loaded');
  })
}

$(document).ready(function () {
  loadImages()
  setTimeout(function() {
    $('body').addClass('ready');
  }, 1000);

  $('header h1 nav').hover(
    function(){ $(this).addClass('hover') },
    function(){ $(this).removeClass('hover') }
  )

  $(window).on('scroll', function() {
    if(window.scrollY > (window.innerHeight - 60)){
      $('header').addClass('scrolled')
    } else {
      $('header').removeClass('scrolled')
    }
  })

  $('figure').on('click', function() {
    $(this).toggleClass('expand');
  })

  $('.initial').on('click', function() {
    $('.issue-overlay').css({opacity: 0, display: 'flex'}).fadeTo('slow', 1);
  })
  $('.issue-overlay-close').on('click', function() {
    $('.issue-overlay').fadeOut();
  })

  $('.abstract.hidden').on('click', function() {
    console.log('clicked toggle')
    $('.abstract').toggleClass('hidden');
    $('.shadow').toggle();
  })

  $('.text-block figure').each(function(number) {
    $(this).prepend('<span class="figure-num">FIG. '+(number+1)+'</span>')
  })

  $('.footnotes li').each(function() {
    var n = $(this).index() + 1
    var fnhtml = $(this).html()
    var $fn = $(this).html(fnhtml)
    var $ref = $('a[href="#'+$fn.attr('id')+'"]')

    var $parent = $ref.parents('p')
    $parent.css('position', 'relative')
    var $inline = $('<span>'+$fn.html()+'</span>')

    var $parentfns
    if($parent.find('.inline-footnotes__container').length) {
      $parentfns = $parent.find('.inline-footnotes__container')
    } else {
      $parentfns = $('<span class="inline-footnotes__container" />')
      $parent.append($parentfns)
    }

    $inline = $('<span class="inline-footnote">'+'<span class="inline-footnote__num">'+n+'.</span>'+$inline.html()+'</span>')
    $inline.find('a[rev="footnote"]').remove()
    $parentfns.append($inline)
  })


});
