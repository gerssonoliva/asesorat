/* siblings up */
function prevSiblings(target) {
  var siblings = [],
    n = target;
  while (n = n.previousElementSibling) siblings.push(n);
  return siblings;
}
/* siblings down */
function nextSiblings(target) {
  var siblings = [],
    n = target;
  while (n = n.nextElementSibling) siblings.push(n);
  return siblings;
}
/* All siblings */
function siblings(target) {
  var prev = prevSiblings(target) || [],
    next = nextSiblings(target) || [];
  return prev.concat(next);
}

(function (document) {

  var sidebar = function () {
    var sidebar_element = document.querySelector("[data-sidebar=\"menu\"]");
    if (sidebar_element) {
      var menu_toggle = sidebar_element.dataset.menuToggle;
      // console.log(menu_toggle);

      var menus = document.querySelectorAll('.sidenav li .menu');
      for (var i = 0; i < menus.length; i++) {
        var menu = menus[i];

        menu.addEventListener("click", function (event) {
          event.preventDefault();

          var current = this;

          if (menu_toggle && menu_toggle === 'only') {
            removeClassActive(current);
          }

          if (!current.classList.contains('active')) {
            current.classList.add("active");
          } else {
            current.classList.remove("active");
          }

        });
      }

    }
  }

  function removeClassActive(currentMenu) {
    siblings_parent = siblings(currentMenu.parentNode);
    // console.log(siblings_parent);
    for (var i = 0; i < siblings_parent.length; i++) {
      var menu = siblings_parent[i];
      if (menu.firstElementChild.classList.contains('active')) {
        menu.firstElementChild.classList.remove("active");
      }
    }
  }

  // start function
  sidebar();


})(document);