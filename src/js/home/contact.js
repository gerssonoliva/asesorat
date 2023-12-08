// procesar formulario
$(document).ready(function() {
    $('#alertConfirmPrincipal').addClass('d-none');
});

function processFormContacto(event) {
    event.preventDefault();
    // serializar data
    var inputs = $('#formContacto').serializeFormJSON();
    inputs.accion = 'set';
    inputs.captcha = $("#g-recaptcha-response").val();
    var params = JSON.stringify(inputs);

    $.ajax({
        url: './app/api/suscriptor/IndexSuscriptor.php',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: params,
        processData: false,
        success: function(data, textStatus, jQxhr) {

            $('#alertConfirmPrincipal').removeClass('alert-success');
            $('#alertConfirmPrincipal').removeClass('alert-danger');

            if (data.error) {
                $('#alertConfirmPrincipal').addClass('alert-danger');
                $('#msg').html(data.msg);
            } else {
                $('#alertConfirmPrincipal').addClass('alert-success');
                $('#msg').html(data.msg);

                $('#formContacto')[0].reset();
            }

            $('#alertConfirmPrincipal').addClass('d-block show');
            $("#alertConfirmPrincipal").fadeTo(8000, 0).slideUp(8000, function() {
                // console.log('remove alert');
                $('#alertConfirmPrincipal').removeClass('d-none show');
            });

        },
        error: function(jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}



$('#formContacto').submit(processFormContacto);