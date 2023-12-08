$(document).ready(function () {
  $('[data-sidebar="toggle"]').on('click', function () { 
    $('.sidebar').toggleClass('sidebar-hidden');
    $('.main').toggleClass('sidebar-hidden');
  });
});

