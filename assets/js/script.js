var $initial
document.addEventListener('DOMContentLoaded', function() {
  $initial = document.querySelector('.initial')
})

window.addEventListener('scroll', function() {
  var d = window.scrollY - window.innerHeight

  var d = Math.max(0, d)

  $initial.style.transform = 'translateY('+(0-d)+'px)'
})

$(document).ready(function () {
  // $('.initial').on('click', function() {
  //   $('.pane').addClass('open');
  // })
  // $('.pane-close').on('click', function() {
  //   $('.pane').removeClass('open');
  // })
});
