(function (document) {

  img_preview = document.querySelectorAll("[data-file-img=\"images\"]");

  if (img_preview) {
      for (var i = 0; i < img_preview.length; i++) {

          input_image = img_preview[i];

          //AGREGAMOS EL EVENTOS
          input_image.addEventListener('change', function () {

              identificador = this.dataset.id;

              var preview = document.querySelector("[data-img-preview=\"" + identificador + "\"]");

              if (preview) {
                  preview.innerHTML = "";

                  if (this.files) {
                      [].forEach.call(this.files, readAndPreview);
                  }

              }

              function readAndPreview(file) {

                  // Make sure `file.name` matches our extensions criteria
                  if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                      return alert(file.name + " is not an image");
                  } // else...

                  var reader = new FileReader();

                  reader.addEventListener("load", function () {
                      var image = new Image();
                      image.height = 100;
                      image.title = file.name;
                      image.src = this.result;
                      preview.appendChild(image);
                  });

                  reader.readAsDataURL(file);

              }


          });
      }


  }


})(document);
