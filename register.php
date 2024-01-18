<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>Registro de Usuarios</h2>

<form id="registrationForm"  method="post">
</form>

<script>
$(document).ready(function () {
    var form = $('#registrationForm');

    function addUsernameField() {
        var usernameField = $('<input>').attr({
            type: 'text',
            id: 'username',
            name: 'username',
            placeholder: 'Nombre de usuario'
        });

        var labelField = $('<label>').attr('for', 'username').text('Nombre de usuario');

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

        var labelField = $('<label>').attr('for', 'password').text('Contraseña');
        form.append('<br>'); 
        form.append(labelField);
        form.append(passwordField);
        form.append('<br>');
    }


    function addPasswordConfirmationField() {
        var passwordConfirmationField = $('<input>').attr({
            type: 'password',
            id: 'passwordConfirm',
            name: 'passwordConfirmation',
            placeholder: 'Contraseña'
        });

        var labelField = $('<label>').attr('for', 'passwordConfirmation').text('Contraseña');
        form.append('<br>'); 
        form.append(labelField);
        form.append(passwordConfirmationField);
        form.append('<br>');
    }





    function validateUsername(username) {
        // Validación simple: al menos 3 caracteres
        return username.length >= 3;
    }
    function validatePassword(password) {
        // Validación simple: al menos 3 caracteres
        return password.length >= 3;
    }
    

    function handleValidation(event) {
        event.preventDefault(); // Evitar que el formulario se envíe

        var usernameValue = $('#username').val();
       

        if (validateUsername(usernameValue)) {
            alert('Nombre de usuario válido.');
            addPasswordField();
        } else {
            alert('El nombre de usuario debe tener al menos 3 caracteres.');
        }

    }
    function handleValidationPassword(params) {
        event.preventDefault(); 
        var password= $('#password').val();
        if (validatePassword(password)) {
            alert('Contraseña válida.');
            addPasswordConfirmationField();
        }
        else{
            alert('La contraseña tiene menos de 3 caracteres.');
        }
    }

    function addValidationButton() {
        var validateButton = $('<button>').text('Validar Nombre de Usuario').click(handleValidation);

        form.append(validateButton);
    }

    addUsernameField();
    addValidationButton();
});


</script>

</body>
</html>
