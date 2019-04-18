var $initial
document.addEventListener('DOMContentLoaded', function() {
  $initial = document.querySelector('.initial')
})

window.addEventListener('scroll', function() {
  var d = window.scrollY - window.innerHeight

  var d = Math.max(0, d)

  $initial.style.transform = 'translateY('+(0-d)+'px)'
})