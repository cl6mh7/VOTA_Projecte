


$(document).ready(function() {
    var form = $('.creacuentaRegister');

    // Agrega el campo de username y el botón Siguiente para el username
    form.append('<div class="datosUsuarioRegister">' +
                    '<input class="inputRegisterPHP" type="text" id="username" name="username" required>' +
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
                        '<input class="inputRegisterPHP" type="email" id="email" name="email" required>' +
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
                        '<input class="inputRegisterPHP" type="password" id="password" name="password" required>' +
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
        $('#siguienteBotonRegisterPassword').remove();

        form.append('<div class="datosUsuarioRegister">' +
                        '<input class="inputRegisterPHP" type="password" id="confirmPassword" required>' +
                        '<label for="confirmPassword">Repetir contraseña</label>' +
                    '</div>');
        form.append('<button id="siguienteBotonRegisterConfirmPassword" type="button">Validar</button>'); // Agrega el botón Siguiente para la confirmación de la contraseña
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

        // Si la contraseña confirmada es la misma que la contraseña original, elimina el botón Siguiente para la confirmación de la contraseña y agrega el campo de número de teléfono
        $(this).remove();
        form.append('<div class="datosUsuarioRegister">' +
                        '<input class="inputRegisterPHP" type="tel" id="telephone" name="telephone" required>' +
                        '<label for="telephone">Número de teléfono</label>' +
                    '</div>');
        form.append('<button id="siguienteBotonRegisterTelephone" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el número de teléfono
    });

    // Cuando se hace clic en el botón Siguiente para el número de teléfono, valida que el número de teléfono tenga 9 dígitos y que no contenga caracteres no permitidos
    // Cuando se hace clic en el botón Siguiente para el número de teléfono, valida que el número de teléfono tenga 9 dígitos y que no contenga caracteres no permitidos
    $(document).on('click', '#siguienteBotonRegisterTelephone', function() {
        var telephone = $('#telephone').val();

        // Si el número de teléfono no tiene 9 dígitos, muestra un mensaje de error
        if (telephone.length !== 9) {
            showErrorPopup('El número de teléfono debe tener 9 dígitos.');
            return;
        }

        // Si el número de teléfono contiene caracteres no permitidos, muestra un mensaje de error
        if (!/^[0-9]+$/.test(telephone)) {
            showErrorPopup('El número de teléfono no debe contener caracteres no permitidos.');
            return;
        }

        // Si el número de teléfono es válido, elimina el botón Siguiente para el número de teléfono y agrega el campo de selección de país
        $(this).remove();
        // Si el número de teléfono es válido, agrega el campo de selección de país
        form.append(countrySelectHTML);
        form.append('<button id="siguienteBotonRegisterCountry" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el país
    });

    $(document).on('click', '#siguienteBotonRegisterCountry', function() {
        $(this).remove();
        form.append('<div class="datosUsuarioRegister">' +
            '<input class="inputRegisterPHP" type="text" id="city" name="city" required>' +
            '<label for="city">Ciudad</label>' +
            '</div>');
        form.append('<button id="siguienteBotonRegisterCity" type="button">Siguiente</button>'); // Agrega el botón Siguiente para LA CIUDAD

    });

    $(document).on('click', '#siguienteBotonRegisterCity', function() {
        $(this).remove();
        form.append('<div class="datosUsuarioRegister">' +
            '<input class="inputRegisterPHP" type="text" pattern="[0-9]{5}" id="zipcode" name="zipcode" required>' +
            '<label for="zipcode">Código postal</label>' +
            '</div>');
    
        // Comprueba que el valor del input es numérico
        $('#zipcode').keyup(function() {
            var zipcode = $(this).val();
            var isNumeric = $.isNumeric(zipcode);
            if (!isNumeric || zipcode.length !== 5) {
                // Muestra un mensaje de error
                showErrorPopup('Por favor, introduce un código postal válido (solo números y de longitud 5).');
                
            } else {
                // Si no existe el botón de registro, lo agrega
                if ($('#siguienteBotonRegister').length === 0) {
                    form.append('<button id="siguienteBotonRegister" type="submit">REGÍSTRATE</button>'); // Agrega el botón PARA REGISTRARSE
                }
            }
        });
    });


    // Cuando el campo de username está vacío, borra los campos de abajo y agrega el botón Siguiente para el username
    $(document).on('input', '#username', function() {
        if (!$(this).val()) {
            $('#username').val('');
            
            $('#siguienteBotonRegisterUsername').remove(); // Elimina el botón Siguiente para el username
            $('#email').val('');
            $('#email').parent().remove(); // Elimina el campo de email
            $('#siguienteBotonRegisterEmail').remove(); // Elimina el botón Siguiente para el email
            $('#password').val('');
            $('#password').parent().remove(); // Elimina el campo de password
            $('#siguienteBotonRegisterPassword').remove(); // Elimina el botón Siguiente para el password
            $('#confirmPassword').val('');
            $('#confirmPassword').parent().remove(); // Elimina el campo de repetir password
            $('#siguienteBotonRegisterConfirmPassword').remove(); // Elimina el botón Siguiente del campo repetir password
            $('#telephone').val('');
            $('#telephone').parent().remove(); // Elimina el campo de tlf
            $('#siguienteBotonRegisterTelephone').remove(); // Elimina el botón Siguiente del campo tlf
            $('#country').val('');
            $('#country').parent().remove(); // Elimina el campo de PAIS
            $('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
            $('#city').val('');
            $('#city').parent().remove(); // Elimina el campo de city
            $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
            $('#zipcode').val('');
            $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
            $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
            form.append('<button id="siguienteBotonRegisterUsername" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
        }
    });


    // Cuando el campo de email está vacío, borra de abajo 
    $(document).on('input', '#email', function() {
        if (!$(this).val()) {
            $('#email').val('');
            $('#siguienteBotonRegisterEmail').remove(); // Elimina el botón Siguiente para el email
            $('#password').val('');
            $('#password').parent().remove(); // Elimina el campo de password
            $('#siguienteBotonRegisterPassword').remove(); // Elimina el botón Siguiente para el password
            $('#confirmPassword').val('');
            $('#confirmPassword').parent().remove(); // Elimina el campo de repetir password
            $('#siguienteBotonRegisterConfirmPassword').remove(); // Elimina el botón Siguiente del campo repetir password
            $('#telephone').val('');
            $('#telephone').parent().remove(); // Elimina el campo de tlf
            $('#siguienteBotonRegisterTelephone').remove(); // Elimina el botón Siguiente del campo tlf
            $('#country').val('');
            $('#country').parent().remove(); // Elimina el campo de PAIS
            $('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
            $('#city').val('');
            $('#city').parent().remove(); // Elimina el campo de city
            $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
            $('#zipcode').val('');
            $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
            $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
            form.append('<button id="siguienteBotonRegisterEmail" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
        }
    });


    // Cuando el campo de PASSWORD está vacío, borra de abajo 
    $(document).on('input', '#password', function() {
        if (!$(this).val()) {
            $('#password').val('');
            $('#siguienteBotonRegisterPassword').remove(); // Elimina el botón Siguiente para el password
            $('#confirmPassword').val('');
            $('#confirmPassword').parent().remove(); // Elimina el campo de repetir password
            $('#siguienteBotonRegisterConfirmPassword').remove(); // Elimina el botón Siguiente del campo repetir password
            $('#telephone').val('');
            $('#telephone').parent().remove(); // Elimina el campo de tlf
            $('#siguienteBotonRegisterTelephone').remove(); // Elimina el botón Siguiente del campo tlf
            $('#country').val('');
            $('#country').parent().remove(); // Elimina el campo de PAIS
            $('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
            $('#city').val('');
            $('#city').parent().remove(); // Elimina el campo de city
            $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
            $('#zipcode').val('');
            $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
            $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
            form.append('<button id="siguienteBotonRegisterPassword" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
        }
    });

    // Cuando el campo de CONFIRM PASSWORD está vacío, borra de abajo 
    $(document).on('input', '#confirmPassword', function() {
    if (!$(this).val()) {
        $('#confirmPassword').val('');
        $('#siguienteBotonRegisterConfirmPassword').remove(); // Elimina el botón Siguiente del campo repetir password
        $('#telephone').val('');
        $('#telephone').parent().remove(); // Elimina el campo de tlf
        $('#siguienteBotonRegisterTelephone').remove(); // Elimina el botón Siguiente del campo tlf
        $('#country').val('');
        $('#country').parent().remove(); // Elimina el campo de PAIS
        $('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
        $('#city').val('');
        $('#city').parent().remove(); // Elimina el campo de city
        $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
        $('#zipcode').val('');
        $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
        $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
        
        form.append('<button id="siguienteBotonRegisterConfirmPassword" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el username
    }
    });

     // Cuando el campo de TLF está vacío, borra de abajo 
     $(document).on('input', '#telephone', function() {
        if (!$(this).val()) {
            $('#telephone').val('');
            $('#siguienteBotonRegisterTelephone').remove(); // Elimina el botón Siguiente del campo tlf
            $('#country').val('');
            $('#country').parent().remove(); // Elimina el campo de PAIS
            $('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
            $('#city').val('');
            $('#city').parent().remove(); // Elimina el campo de city
            $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
            $('#zipcode').val('');
            $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
            $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
            
            form.append('<button id="siguienteBotonRegisterTelephone" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el TLF
        }
        });

    
        // Cuando el campo de CITY está vacío, borra de abajo 
     $(document).on('input', '#city', function() {
        if (!$(this).val()) {
            $('#city').val('');
            $('#siguienteBotonRegisterCity').remove(); // Elimina el botón Siguiente del campo city
            $('#zipcode').val('');
            $('#zipcode').parent().remove(); // Elimina el campo de codigo postal
            $('#siguienteBotonRegister').remove(); // Elimina el botón Siguiente del campo REGISTRARSE
            
            form.append('<button id="siguienteBotonRegisterCity" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el TLF
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


function showSuccesPopup(message) {
    // Crear la ventana flotante
    var errorPopup = $('<div/>', {
        id: 'errorPopup',
        text: message,
        style: 'position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: green; color: white; padding: 20px; border-radius: 5px;'
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