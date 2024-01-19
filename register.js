$(document).ready(function () {
    var form = $('#registrationForm');

    function addValidationButton(id,  clickHandler) {
        var validateButton = $('<button>').attr({ id: id })
            .text('Validar').click(clickHandler);

        form.append(validateButton);
    }

    function removeValidationButton(buttonId) {
        form.find('#' + buttonId).remove();
    }

    function addUsernameField() {
        var usernameField = $('<input>').attr({
            type: 'text',
            id: 'username',
            name: 'username',
            placeholder: 'Nombre de usuario'
        });

        var labelField = $('<label>').attr('for', 'username').text('Nombre de usuario :');

        form.append(labelField);
        form.append(usernameField);
        form.append('<br>');
    }

    function addPasswordField() {
        var passwordField = $('<input>').attr({
            type: 'password',
            id: 'password',
            name: 'password',
            placeholder: 'Contraseña'
        });

        var labelField = $('<label>').attr('for', 'password').text('Contraseña :');
        form.append('<br>'); 
        form.append(labelField);
        form.append(passwordField);
        form.append('<br>');
    }

    function addPasswordConfirmationField() {
        var passwordConfirmationField = $('<input>').attr({
            type: 'password',
            id: 'passwordConfirm',
            name: 'passwordConfirm',
            placeholder: 'Confirmar Contraseña'
        });

        var labelField = $('<label>').attr('for', 'passwordConfirm').text('Confirmar Contraseña :');
        form.append('<br>'); 
        form.append(labelField);
        form.append(passwordConfirmationField);
        form.append('<br>');
    }

    function addEmailField() {
        var emailField = $('<input>').attr({
            type: 'email',
            id: 'email',
            name: 'email',
            placeholder: 'Email'
        });

        var labelField = $('<label>').attr('for', 'email').text('Email :');
        form.append('<br>'); 
        form.append(labelField);
        form.append(emailField);
        form.append('<br>');
    }

    function addEmailField() {
        var emailField = $('<input>').attr({
            type: 'email',
            id: 'email',
            name: 'email',
            placeholder: 'Email'
        });

        var labelField = $('<label>').attr('for', 'email').text('Email :');
        form.append('<br>'); 
        form.append(labelField);
        form.append(emailField);
        form.append('<br>');
    }

    function addTelefonField() {
        var telefonField = $('<input>').attr({
            type: 'number',
            id: 'telefon',
            name: 'telefon',
            placeholder: 'Telefon'
        });

        var labelField = $('<label>').attr('for', 'telefon').text('Telefono :');
        form.append('<br>'); 
        form.append(labelField);
        form.append(telefonField);
        form.append('<br>');
    }













    function validateUsername(username) {
        return username.length >= 3;
    }

    function validatePassword(password) {
        return password.length >= 3;
    }

    function validateConfirmPassword(passwordConfirm) {
        return passwordConfirm.length >= 3;
    }

    function validateTelefon(telefon) {
        return telefon.length >= 2 ;
    }


    function handleValidationUserName(event) {
        event.preventDefault();

        var usernameValue = $('#username').val();

        if (validateUsername(usernameValue)) {
            alert('El nombre de usuario es válido.');
            addPasswordField();
            addValidationButton('btnPassword',  handleValidationPassword);
            removeValidationButton('btnUserName');
        } else {
            alert('El nombre de usuario debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationPassword(event) {
        event.preventDefault();

        var passwordValue = $('#password').val();

        if (validatePassword(passwordValue)) {
            alert('La contraseña es válida.');
            addPasswordConfirmationField();
            addValidationButton('btnConfirmPassword',handleValidationConfirmPassword);
            removeValidationButton('btnPassword');
        } else {
            alert('La contraseña debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationConfirmPassword(event) {
        event.preventDefault();

        var confirmPasswordValue = $('#passwordConfirm').val();

        if (validateConfirmPassword(confirmPasswordValue)) {
            alert('La confirmación de la contraseña es válida.');
            addEmailField();
            addValidationButton('btnEmail',  handleValidationEmail);
            removeValidationButton('btnConfirmPassword');
        } else {
            alert('La confirmación de la contraseña debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationEmail(event) {
        event.preventDefault();

        var emailValue = $('#email').val();

        if (validateConfirmPassword(emailValue)) {
            alert('La confirmación de la contraseña es válida.');
            addTelefonField();
            addValidationButton('btnTelefon',  handleValidationEmail);
            removeValidationButton('btnEmail');
        } else {
            alert('La confirmación de la contraseña debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationTelefon(event) {
        event.preventDefault();

        var telefonValue = $('#passwordConfirm').val();

        if (validateConfirmPassword(telefonValue)) {
            alert('La confirmación de la contraseña es válida.');
            removeValidationButton('btnTelefon');
        } else {
            alert('La confirmación de la contraseña debe tener al menos 3 caracteres.');
        }
    }

    // Función para eliminar el botón de validación del nombre de usuario
    function removeValidationButton(buttonId) {
        form.find('#' + buttonId).remove();
    }

    // Inicialización de la página
    addUsernameField();
    addValidationButton('btnUserName',  handleValidationUserName);
});
