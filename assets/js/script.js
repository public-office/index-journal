var $initial
document.addEventListener('DOMContentLoaded', function() {
  $initial = document.querySelector('.initial')
})

window.addEventListener('scroll', function() {
  var d = window.scrollY - window.innerHeight
  var d = Math.max(0, d)

  if($initial) $initial.style.transform = 'translateY('+(0-d)+'px)'
})

$(document).ready(function () {
  $('header h1 nav').hover(
    function(){ $(this).addClass('hover') },
    function(){ $(this).removeClass('hover') }
  )
  // $('figure').append($('<span class="figure-close">&times;</span>'))

  $('figure').on('click', function() {
    $(this).toggleClass('expand');
  })

  $('.abstract-trigger').on('click', function() {
    console.log('clicked toggle')
    $('.abstract-content').slideToggle();
  })

  $('.footnotes li').each(function() {
    var n = $(this).index() + 1
    var fnhtml = $(this).text()
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
