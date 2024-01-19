$(document).ready(function () {
    var form = $('#registrationForm');

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

        // Agregar evento para validar cuando el campo pierde el foco
        usernameField.on('blur', function() {
            handleValidationUserName();
        });
    }

    function addPasswordField() {
        var passwordField = $('<input>').attr({
            type: 'password',
            id: 'password',
            name: 'password',
            placeholder: 'Contraseña'
        });

        var labelField = $('<label>').attr('for', 'password').text('Contraseña :');
        form.append(labelField);
        form.append(passwordField);
        form.append('<br>');

        // Agregar evento para validar cuando el campo pierde el foco
        passwordField.on('blur', function() {
            handleValidationPassword();
        });
    }

    function addPasswordConfirmationField() {
        var passwordConfirmationField = $('<input>').attr({
            type: 'password',
            id: 'passwordConfirm',
            name: 'passwordConfirm',
            placeholder: 'Confirmar Contraseña'
        });

        var labelField = $('<label>').attr('for', 'passwordConfirm').text('Confirmar Contraseña :');
        form.append(labelField);
        form.append(passwordConfirmationField);
        form.append('<br>');

        // Agregar evento para validar cuando el campo pierde el foco
        passwordConfirmationField.on('blur', function() {
            handleValidationConfirmPassword();
        });
    }

    function addEmailField() {
        var emailField = $('<input>').attr({
            type: 'email',
            id: 'email',
            name: 'email',
            placeholder: 'Email'
        });

        var labelField = $('<label>').attr('for', 'email').text('Email :');

        form.append(labelField);
        form.append(emailField);
        form.append('<br>');

        // Agregar evento para validar cuando el campo pierde el foco
        emailField.on('blur', function() {
            handleValidationEmail();
        });
    }

    function addTelefonField() {
        var telefonField = $('<input>').attr({
            type: 'number',
            id: 'telefon',
            name: 'telefon',
            placeholder: 'Telefono'
        });

        var labelField = $('<label>').attr('for', 'telefon').text('Telefono :');
 
        form.append(labelField);
        form.append(telefonField);
        form.append('<br>');

        // Agregar evento para validar cuando el campo pierde el foco
        telefonField.on('blur', function() {
            handleValidationTelefon();
        });
    }

    function validateUsername(username) {
        return username.length >= 3;
    }

    function validatePassword(password) {
        return password.length >= 8 && password.length <= 16;
    }
    

    function validateConfirmPassword(passwordConfirm,password) {
        return passwordConfirm==password;
    }

    function validateTelefon(telefon) {
        return telefon.length >= 2 ;
    }

    function handleValidationUserName() {
        var usernameValue = $('#username').val();

        if (validateUsername(usernameValue)) {
            alert('El nombre de usuario es válido.');
            addPasswordField();
        } else {
            alert('El nombre de usuario debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationPassword() {
        var passwordValue = $('#password').val();

        if (validatePassword(passwordValue)) {
            alert('La contraseña es válida.');
            addPasswordConfirmationField();
        } else {
            alert('La contraseña debe tener de 8 caracteres a 16 caracteres.');
        }
    }

    function handleValidationConfirmPassword() {
        var confirmPasswordValue = $('#passwordConfirm').val();
        var passwordValue = $('#password').val();

        if (validateConfirmPassword(confirmPasswordValue,passwordValue)) {
            alert('La confirmación de la contraseña es válida.');
            addEmailField();
        } else {
            alert('Las contraseñas no coinciden');
        }
    }

    function handleValidationEmail() {
        var emailValue = $('#email').val();

        if (validateConfirmPassword(emailValue)) {
            alert('El email es válido.');
            addTelefonField();
        } else {
            alert('El email debe tener al menos 3 caracteres.');
        }
    }

    function handleValidationTelefon() {
        var telefonValue = $('#telefon').val();

        if (validateConfirmPassword(telefonValue)) {
            alert('El teléfono es válido.');
        } else {
            alert('El teléfono debe tener al menos 2 caracteres.');
        }
    }

    // Inicialización de la página
    addUsernameField();
});
