var AdminAppValidation = function () {
    return {
        validationForm: function (id, rules, messages) {
            const formElements = $('#' + id);
            formElements.validate({
                rules: rules,
                messages: messages,
                errorElement: 'span', //default input error message container
                errorClass: 'invalid-feedback', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                highlight: function (element, errorClass, validClass) { // hightlight error inputs
                    // $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                    $(element).addClass('is-invalid'); // set error class to the control
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element).removeClass('is-invalid'); // set error class to the control group
                },
                success: function (label) {
                    label.removeClass('is-invalid'); // set success class to the control group
                },
                errorPlacement: function (error, element) {
                    if ($(element).is('select') && element.hasClass('bs-select')) {//PARA LOS SELECT BOOSTRAP
                        error.insertAfter(element);//element.next().after(error);
                    } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
                        element.next().after(error);
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // default placement for everything else
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    // $(this).find(":input.error:first").focus();
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        // alert(validator.errorList[0].message);  //Only show first invalid rule message!!!
                        validator.errorList[0].element.focus(); //Set Focus
                    }
                },
                submitHandler: function (form) {
                    return true;
                }
            });
        },
        notificaciones: function (mensaje, titulo, tipo) {
            toastr.options = {
                closeButton: true,
                newestOnTop: true,
                positionClass: 'toast-top-right',
                preventDuplicates: true,
                timeOut: '5000'
            };
            if (tipo == 'error') {
                toastr.error(mensaje, titulo);
            } else if (tipo == 'success') {
                toastr.success(mensaje, titulo);
            } else if (tipo == 'info') {
                toastr.info(mensaje, titulo);
            } else if (tipo == 'warning') {
                toastr.warning(mensaje, titulo);
            }
        },
    }
}();