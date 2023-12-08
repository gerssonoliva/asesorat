// require('./components/perfect-scrollbar.min');
import PerfectScrollbar from 'perfect-scrollbar';

if($('.scroll-item').length){
  // var ps = new PerfectScrollbar('.scroll-item');
  $('.scroll-item').each(function(){ const ps = new PerfectScrollbar($(this)[0]); });

}

// console.log('scroll-item', $('.scroll-item').length);