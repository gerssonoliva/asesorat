// var menus = document.querySelectorAll('.sidenav li .menu');
// var sidebar_element = document.querySelector("[data-sidebar=\"menu\"]"); 

var sidebar_toggle = document.querySelectorAll("[data-sidebar=\"toggle\"]");

console.log('sidebar_toggle',sidebar_toggle);

if (sidebar_toggle) {    
   
  for (var i = 0; i < sidebar_toggle.length; i++) {
    let toggle = sidebar_toggle[i];

    toggle.addEventListener("click", function () {

      let current = this; 
      
      if (!toggle.classList.contains('active')) {
        current.classList.add("active");
   $('.sidebar').toggleClass('sidebar-hidden');

      } else {
        current.classList.remove("active");
      }

    });
  }

}