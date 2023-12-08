/* $(document).ready(function () {
  $('.accordion-toggle').on('click', function () {
    $padre = $(this).parent('.accordion-item');

    $hermanos = $padre.siblings().removeClass('active');

    $padre.toggleClass('active');
  });

}); */

$(document).ready(function () {
  $('.accordion-toggle').on('click', function () {

    $accordion_node =  $(this).closest('.accordion');
    $toggle = $($accordion_node).data('toggle');

    $padre = $(this).parent('.accordion-item');
    if($toggle !== 'multiple')
    {
      $hermanos = $padre.siblings().removeClass('active');
    }

    $padre.toggleClass('active');

  });

});
