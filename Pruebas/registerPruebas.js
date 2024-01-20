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



  $(document).ready(function() {
    // Crear el formulario
    var form = $('<form/>', {
        id: 'dynamicForm'
    });

    // Crear el input para el nombre de usuario
    var usernameInput = $('<input/>', {
        type: 'text',
        name: 'username',
        id: 'username',
        placeholder: 'Nombre de usuario'
    });

    // Crear el botón "Siguiente"
    var nextButton = $('<button/>', {
        text: 'Siguiente',
        type: 'button',
        id: 'nextButton'
    });

    // Añadir el input y el botón al formulario
    form.append(usernameInput);
    form.append(nextButton);
    //form.append('<br/>'); // Añadir salto de línea

    // Añadir el formulario al cuerpo del documento
    $('body').append(form);

    // Manejador de eventos para el botón "Siguiente"
    $('#nextButton').click(function() {

        // Ocultar el botón "Siguiente"
        $(this).hide();

        // Crear el contenedor para el input de la contraseña y el segundo botón
        var passwordContainer = $('<div/>', {
            id: 'passwordContainer'
        });

        // Crear el input para la contraseña
        var passwordInput = $('<input/>', {
            type: 'password',
            name: 'password',
            id: 'password',
            placeholder: 'Contraseña'
        });

        // Crear el segundo botón "Siguiente"
        var nextButton2 = $('<button/>', {
            text: 'Siguiente',
            type: 'button',
            id: 'nextButton2'
        });

        // Añadir el input de la contraseña y el segundo botón al contenedor
        passwordContainer.append(passwordInput);
        passwordContainer.append(nextButton2);

        // Añadir el contenedor al formulario
        //form.append('<br/>'); // Añadir salto de línea
        form.append(passwordContainer);

        // Manejador de eventos para el input de nombre de usuario
        $('#username').on('input', function() {
            // Si el nombre de usuario está vacío, eliminar el contenedor de la contraseña
            if ($(this).val() === '') {
                $('#passwordContainer').remove();
                $('#repeatPassword').remove();
                $('#verifyButton').remove();
                // Mostrar el botón "Siguiente" original
                $('#nextButton').show();
            }
        });


        
        // Manejador de eventos para el segundo botón "Siguiente"
        $('#nextButton2').click(function() {
            // Ocultar el botón "Siguiente"
            $(this).hide();

            // Obtener el valor del input de la contraseña
            var password = $('#password').val();

            // Comprobar si la contraseña tiene al menos 8 caracteres
            if (password.length < 8) {
                showErrorPopup('La contraseña debe tener al menos 8 caracteres.');
                return;
            }

            // Comprobar si la contraseña contiene al menos un carácter numérico
            if (!/\d/.test(password)) {
                showErrorPopup('La contraseña debe contener al menos un carácter numérico.');
                return;
            }

            // Comprobar si la contraseña contiene al menos una mayúscula
            if (!/[A-Z]/.test(password)) {
                showErrorPopup('La contraseña debe contener al menos una mayúscula.');
                return;
            }

            // Comprobar si la contraseña contiene al menos una minúscula
            if (!/[a-z]/.test(password)) {
                showErrorPopup('La contraseña debe contener al menos una minúscula.');
                return;
            }

            // Comprobar si la contraseña contiene al menos un carácter especial
            if (!/[!@#$%^&*]/.test(password)) {
                showErrorPopup('La contraseña debe contener al menos un carácter especial.');
                return;
            }

            // Crear el input para repetir la contraseña
            var repeatPasswordInput = $('<input/>', {
                type: 'password',
                name: 'repeatPassword',
                id: 'repeatPassword',
                placeholder: 'Repetir contraseña'
            });

            // Crear el botón "Verificar"
            var verifyButton = $('<button/>', {
                text: 'Verificar',
                type: 'button',
                id: 'verifyButton'
            });

            // Añadir el input para repetir la contraseña y el botón "Verificar" al formulario
            form.append(repeatPasswordInput);
            form.append(verifyButton);

            // Manejador de eventos para el input de la contraseña
            $('#password').on('input', function() {
                // Si la contraseña está vacía, eliminar el input para repetir la contraseña y el botón "Verificar"
                if ($(this).val() === '') {
                    $('#repeatPassword').remove();
                    $('#verifyButton').remove();
                    // Mostrar el botón "Siguiente" original
                    $('#nextButton2').show();
                }
            });

            // Manejador de eventos para el botón "Verificar"
            $('#verifyButton').click(function() {
                // Obtener el valor del input de repetir contraseña
                var repeatPassword = $('#repeatPassword').val();

                // Comprobar si las contraseñas coinciden
                if (password !== repeatPassword) {
                    showErrorPopup('Las contraseñas no coinciden.');
                    return;
                }
             $(this).remove();
           // Si las contraseñas coinciden, continuar con el proceso
            if (password === repeatPassword) {
                // Crear el input para el correo electrónico
                var emailInput = $('<input/>', {
                    type: 'email',
                    name: 'email',
                    id: 'email',
                    placeholder: 'Correo electrónico'
                });

                // Crear el botón "Siguiente"
                var nextButton3 = $('<button/>', {
                    text: 'Siguiente',
                    type: 'button',
                    id: 'nextButton3'
                });

                // Añadir el input de correo electrónico y el botón "Siguiente" al formulario
               // form.append('<br/>'); // Añadir salto de línea
                form.append(emailInput);
                form.append(nextButton3);

                // Manejador de eventos para el botón "Siguiente"
                $('#nextButton3').click(function() {
                    // Obtener el valor del input de correo electrónico
                    var email = $('#email').val();

                    // Comprobar si el correo electrónico es válido
                    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
                        showErrorPopup('Por favor, introduce un correo electrónico válido.');
                        return;
                    }

                    $(this).remove();
                    // Si el correo electrónico es válido, continuar con el proceso de registro
                    // ...
                });
            }
            });
        });
    });
});