$(document).ready(function() {
    var form = $('.creacuentaRegister');

    // Agrega el campo de username y el botón Siguiente para el username
    form.append('<div class="datosUsuarioRegister">' +
                    '<input class="inputRegisterPHP" type="text" id="username" required>' +
                    '<label for="username">Usuario</label>' +
                '</div>');
    form.append('<button id="siguienteBotonRegisterUsername" type="button">Siguiente</button>');

    // Cuando se hace clic en el botón Siguiente para el username, valida el campo de username y luego agrega el campo de email
    $(document).on('click', '#siguienteBotonRegisterUsername', function() {
        var username = $('#username').val();
        var regex = /^[a-zA-Z0-9]+$/; // Regex para validar que no hay caracteres especiales

        // Si el campo de username está vacío o contiene caracteres especiales, muestra un mensaje de error y no agrega el campo de email
        if (!username || !regex.test(username)) {
            showErrorPopup('Por favor, introduce un nombre de usuario válido (sin caracteres especiales).');
            return;
        }

        $(this).remove(); // Elimina el botón Siguiente para el username
        form.append('<div class="datosUsuarioRegister">' +
                        '<input class="inputRegisterPHP" type="email" id="email" required>' +
                        '<label for="email">Correo electrónico</label>' +
                    '</div>');
        form.append('<button id="siguienteBotonRegisterEmail" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el email
    });

    // Cuando se hace clic en el botón Siguiente para el email, valida el campo de email y luego agrega el campo de password
    $(document).on('click', '#siguienteBotonRegisterEmail', function() {
        var email = $('#email').val();
        var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Regex para validar que es una dirección de correo electrónico correcta

        // Si el campo de email no es una dirección de correo electrónico correcta, muestra un mensaje de error
        if (!regex.test(email)) {
            showErrorPopup('Por favor, introduce una dirección de correo electrónico válida.');
            return;
        }

        $(this).remove(); // Elimina el botón Siguiente para el email
        form.append('<div class="datosUsuarioRegister">' +
                        '<input class="inputRegisterPHP" type="password" id="password" required>' +
                        '<label for="password">Contraseña</label>' +
                    '</div>');
        form.append('<button id="siguienteBotonRegisterPassword" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el password
    });

    // Cuando se hace clic en el botón Siguiente para el password, valida el campo de password
    $(document).on('click', '#siguienteBotonRegisterPassword', function() {
        var password = $('#password').val();

        // Si la contraseña no tiene al menos 8 caracteres, muestra un mensaje de error
        if (password.length < 8) {
            showErrorPopup('La contraseña debe tener un mínimo de 8 carácteres.');
            return;
        }

        // Si la contraseña no contiene al menos un número, muestra un mensaje de error
        if (!/[0-9]/.test(password)) {
            showErrorPopup('La contraseña debe contener al menos un carácter numérico.');
            return;
        }

        // Si la contraseña no contiene al menos una mayúscula, muestra un mensaje de error
        if (!/[A-Z]/.test(password)) {
            showErrorPopup('La contraseña debe contener al menos una mayúscula.');
            return;
        }

        // Si la contraseña no contiene al menos una minúscula, muestra un mensaje de error
        if (!/[a-z]/.test(password)) {
            showErrorPopup('La contraseña debe contener al menos una minúscula.');
            return;
        }

        // Si la contraseña no contiene al menos un carácter especial, muestra un mensaje de error
        if (!/[!@#$%^&*]/.test(password)) {
            showErrorPopup('La contraseña debe contener al menos un carácter especial.');
            return;
        }

        // Si la contraseña es válida, elimina el botón Siguiente para el password y agrega el campo de confirmación de contraseña
        $(this).remove();
        form.append('<div class="datosUsuarioRegister">' +
                        '<input class="inputRegisterPHP" type="password" id="confirmPassword" required>' +
                        '<label for="confirmPassword">Repetir contraseña</label>' +
                    '</div>');
        form.append('<button id="siguienteBotonRegisterConfirmPassword" type="button">Siguiente</button>'); // Agrega el botón Siguiente para la confirmación de la contraseña
        });


        // Cuando se hace clic en el botón Siguiente para la confirmación de la contraseña, valida que la contraseña confirmada sea la misma que la contraseña original
        $(document).on('click', '#siguienteBotonRegisterConfirmPassword', function() {
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();

            // Si la contraseña confirmada no es la misma que la contraseña original, muestra un mensaje de error
            if (password !== confirmPassword) {
                showErrorPopup('Las contraseñas no coinciden. Por favor, confirma tu contraseña de nuevo.');
                return;
            }

            // Aquí puedes agregar más campos de entrada o realizar otras acciones después de validar la confirmación de la contraseña
        });





    // Cuando el campo de username está vacío, borra los campos de abajo y agrega el botón Siguiente para el username
    $(document).on('input', '#username', function() {
        if (!$(this).val()) {
            $('#email').val('');
            $('#email').parent().remove(); // Elimina el campo de email
            $('#siguienteBotonRegisterEmail').remove(); // Elimina el botón Siguiente para el email
            $('#password').val('');
            $('#password').parent().remove(); // Elimina el campo de password
            $('#siguienteBotonRegisterPassword').remove(); // Elimina el botón Siguiente para el password
            $('#confirmPassword').val('');
            $('#confirmPassword').parent().remove(); // Elimina el campo de repetir password
            $('#siguienteBotonRegisterConfirmPassword').remove(); // Elimina el botón Siguiente del campo repetir password
            form.append('<button id="siguienteBotonRegisterUsername" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
        }
    });


    // Cuando el campo de email está vacío, borra de abajo 
    $(document).on('input', '#email', function() {
        if (!$(this).val()) {
            $('#password').val('');
            $('#password').parent().remove(); // Elimina el campo de email
            $('#siguienteBotonRegisterPassword').remove(); // Elimina el botón Siguiente para el email
           
            form.append('<button id="siguienteBotonRegisterEmail" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
        }
    });
});



function showErrorPopup(message) {
    // Crear la ventana flotante
    var errorPopup = $('<div/>', {
        id: 'errorPopup',
        text: message,
        style: 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f44336; color: white; padding: 20px; border-radius: 5px;'
    });
  
    // Crear el botón "X"
    var closeButton = $('<button/>', {
        text: 'X',
        style: 'position: absolute; top: 0; right: 0; background-color: transparent; color: white; border: none; font-size: 20px; cursor: pointer;'
    });
  
    // Añadir el botón "X" a la ventana flotante
    errorPopup.append(closeButton);
  
    // Añadir la ventana flotante al cuerpo del documento
    $('body').append(errorPopup);
  
    // Manejador de eventos para el botón "X"
    closeButton.click(function() {
        errorPopup.remove();
    });
}