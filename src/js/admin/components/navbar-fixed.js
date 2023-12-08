/* navbar-fixed */
/**
 * [data-navbar="navbar-fixed"]: required 
 * [data-media="PROPERTY"] :  [md-up, sm-up OR number ]  : optionan 
 */

(function (document) {

  var resize = function () {


    width = window.innerWidth;
    //   height = event.target.innerHeight;
    var className = "fixed-top"
    var navbar_element = document.querySelector("[data-navbar=\"fixed-top\"]");
    if (navbar_element) {

      isClass = navbar_element.classList.contains(className);

      if (!isClass) {
        navbar_element.classList.add(className);
      }

      data_media = navbar_element.dataset.media;

      navbar_height = navbar_element.offsetHeight;

      if (navbar_height > 0) {

        navbar_height = navbar_element.offsetHeight + 'px';

        if (data_media === "all" || !data_media) {

          document.body.style.paddingTop = navbar_height;

        } else if (data_media === "md-up") {

          if (width >= 768) {
            document.body.style.paddingTop = navbar_height;
          } else {
            document.body.style.paddingTop = "";
            navbar_element.classList.remove(className);

          }

        } else if (data_media === 'sm-up') {

          if (width >= 568) {
            document.body.style.paddingTop = navbar_height;
          } else {
            document.body.style.paddingTop = "";
            navbar_element.classList.remove(className);

          }

        } else if (isNumeric(data_media)) {

          if (width >= parseInt(data_media)) {
            document.body.style.paddingTop = navbar_height;
          } else {
            document.body.style.paddingTop = "";
            navbar_element.classList.remove(className);

          }

        }

      }

      function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

    }
  }

  // start function
  resize();

  // Start onriseze 
  window.onresize = resize;

})(document);