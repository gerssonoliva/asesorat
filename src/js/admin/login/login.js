
//  login
function processForLogin(event) {
  event.preventDefault();
  var inputs = $('#formLogin').serializeFormJSON();
  inputs.accion = 'login';

  var params = JSON.stringify(inputs);
  // console.log(params);

   axios.post('./app/auth/IndexAuth.php', params)
    .then(function (response) {
      // console.log(response);
      var data = response.data ;

      if (!data.error && data.data['login']) {

        $(".btn-login").attr("disabled", true);

        // setInterval(showRemaining, 1000);

        var notification = alertify.notify(data.msg + "-  Espere 5 Segundos para ir al administrador", 'success', 3, function(){
          // console.log('dismissed');
          window.location.href = "admin/";
        });

      }
      else {
        alertify.error('Sucedio un error al enviar mensaje: ' + data.msg);
      }


    })
    .catch(function (error) {
      console.log(error);
    });

}
$('#formLogin').submit(processForLogin);