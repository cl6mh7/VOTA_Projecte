


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
        var hasUppercase = /[A-Z]/.test(username); // Regex para validar que tiene al menos una letra mayúscula

        // Si el campo de username está vacío, contiene caracteres especiales, tiene menos de 5 letras o no tiene al menos una letra mayúscula, muestra un mensaje de error y no agrega el campo de email
        if (!username || !regex.test(username) || username.length < 5 || !hasUppercase) {
            showErrorPopup('Por favor, introduce un nombre de usuario válido (sin caracteres especiales, al menos 5 letras y al menos una letra mayúscula).');
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

        // Realizar la solicitud Fetch para verificar si el correo electrónico ya existe
        fetch('check_email.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'email=' + encodeURIComponent(email),
        })
        .then(response => response.text())
        .then(response => {
            if (response == 'exists') {
                showErrorPopup('El correo electrónico ya está en uso. Por favor, introduce otro.');
                return;
            }

            // Si el correo electrónico no existe, elimina el botón Siguiente para el email y agrega el campo de contraseña y el botón Siguiente
            $(this).remove();
            form.append('<div class="datosUsuarioRegister">' +
                            '<input class="inputRegisterPHP" type="password" id="password" name="password" required>' +
                            '<label for="password">Contraseña</label>' +
                        '</div>');
            form.append('<button id="siguienteBotonRegisterPassword" type="button">Siguiente</button>');
        });
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





        $(document).on('click', '#siguienteBotonRegisterConfirmPassword', function() {
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
        
            // Si la contraseña confirmada no es la misma que la contraseña original, muestra un mensaje de error
            if (password !== confirmPassword) {
                showErrorPopup('Las contraseñas no coinciden. Por favor, confirma tu contraseña de nuevo.');
                return;
            }
        
            // Si la contraseña confirmada es la misma que la contraseña original, elimina el botón Siguiente para la confirmación de la contraseña y agrega el campo de selección de país
            $(this).remove();
            form.append(countrySelectHTML);
            form.append('<button id="siguienteBotonRegisterCountry" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el país
        });
        
        $(document).on('click', '#siguienteBotonRegisterCountry', function() {
            // Elimina el botón Siguiente para el país y agrega el campo de número de teléfono
            $(this).remove();
            form.append('<div class="datosUsuarioRegister">' +
                            '<input class="inputRegisterPHP" type="tel" id="telephone" name="telephone" required>' +
                            '<label for="telephone">Número de teléfono</label>' +
                        '</div>');
            form.append('<button id="siguienteBotonRegisterTelephone" type="button">Siguiente</button>'); // Agrega el botón Siguiente para el número de teléfono
        
            // Obtiene el prefijo del país seleccionado
            var selectedCountryPrefix = $('#country option:selected').data('prefix');
        
            // Establece el valor del campo de número de teléfono al prefijo del país
            $('#telephone').val(selectedCountryPrefix);
        });


        
        // Cuando se hace clic en el botón Siguiente para el número de teléfono, valida que el número de teléfono tenga 9 dígitos y que no contenga caracteres no permitidos
        $(document).on('click', '#siguienteBotonRegisterTelephone', function() {
            var telephone = $('#telephone').val();
        
            // Check if the phone number starts with "+"
            if (!telephone.startsWith('+')) {
                showErrorPopup('Introduce el prefijo del número de teléfono.');
                return;
            }
        
            // Check if the phone number has a minimum length of 11 and a maximum length of 12
            if (telephone.length < 11 || telephone.length > 15) {
                showErrorPopup('Longitud del numero de teléfono incorrecta.');
                return;
            }
        
            // Check if the phone number contains only digits after the "+"
            if (!/^\+\d+$/.test(telephone)) {
                showErrorPopup('El número de teléfono no debe contener caracteres no permitidos.');
                return;
            }
        
            // Perform the Fetch request to check if the phone number already exists
            fetch('check_tlf.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'telephone=' + encodeURIComponent(telephone),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(response => {
                console.log(response); // Log the response
                if (response.trim() == 'exists') {
                    showErrorPopup('El número de teléfono ya está en uso. Por favor, introduce otro.');
                    return;
                }
        
                // If the phone number does not exist, remove the Next button for the phone number and add the city field
                $(this).remove();
                form.append('<div class="datosUsuarioRegister">' +
                    '<input class="inputRegisterPHP" type="text" id="city" name="city" required>' +
                    '<label for="city">Ciudad</label>' +
                    '</div>');
                form.append('<button id="siguienteBotonRegisterCity" type="button">Siguiente</button>'); // Agrega el botón Siguiente para LA CIUDAD
            });
        });
        
        $(document).on('click', '#siguienteBotonRegisterCity', function() {
            $(this).remove();
            form.append('<div class="datosUsuarioRegister">' +
                '<input class="inputRegisterPHP" type="text" pattern="[0-9]{5}" id="zipcode" name="zipcode" required>' +
                '<label for="zipcode">Código postal</label>' +
                '</div>');
            form.append('<button id="siguienteBotonRegister" type="submit">REGÍSTRATE</button>'); // Agrega el botón PARA REGISTRARSE
        });




    
    $(document).on('click', '#siguienteBotonRegister', function(e) {
        var zipcode = $('#zipcode').val();
        var isNumeric = $.isNumeric(zipcode);
        if (!isNumeric || zipcode.length !== 5) {
            // Muestra un mensaje de error
            showErrorPopup('Por favor, introduce un código postal válido (solo números y de longitud 5).');
            e.preventDefault();  // Previene la acción por defecto del botón (enviar el formulario)
        }
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
           // $('#country').val('');
            //$('#country').parent().remove(); // Elimina el campo de PAIS
            //$('#siguienteBotonRegisterCountry').remove(); // Elimina el botón Siguiente del campo PAIS
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
      style: 'position: fixed; top: 20%; left: 50%; transform: translate(-50%, -50%); background-color: #f44336; color: white; padding: 20px; border-radius: 5px;'
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
        style: 'position: fixed; top: 10%; left: 50%; transform: translate(-50%, -50%); background-color: green; color: white; padding: 20px; border-radius: 5px;'
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
