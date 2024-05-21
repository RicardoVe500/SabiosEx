//Registro en AJAX - Registro
$(function() {
    // Configurar un evento de click para un botón u otro elemento
    $("#enviarDatos").click(function(event) {
        event.preventDefault(); // Evitar el comportamiento por defecto (en este caso, la recarga de la página)

        // Validaciones
        if ($("#nombre").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar el nombre'
            });
        } else if ($("#apellidos").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar los apellidos'
            });
        } else if ($("#email").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar el correo'
            });
        } else if ($("#clave").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar la contraseña'
            });
        } else {
            // Si todas las validaciones pasan, enviar los datos a través de AJAX

            // Obtener los datos del formulario
            var nombre = $("#nombre").val();
            var apellidos = $("#apellidos").val();
            var email = $("#email").val();
            var clave = $("#clave").val();

            // Construir el objeto de datos que deseas enviar al servidor
            var datos = {
                nombre: nombre,
                apellidos: apellidos,
                email: email,
                clave: clave
            };

            // Enviar una solicitud AJAX al archivo "registro.php" en el backend
            $.ajax({
                type: 'POST',
                url: '../backend/register.php', // Asegúrate de que esta ruta sea correcta
                data: datos,
                success: function(response) {
                    // Manejar la respuesta del servidor
                    if (response.includes("El correo electronico ya está registrado")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Correo duplicado',
                            text: response
                        });
                    } else if (response.includes("Registro exitoso")) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registro exitoso',
                            text: response
                        }).then(() => {
                            
                            $("#nombre").val('');
                            $("#apellidos").val('');
                            $("#email").val('');
                            $("#clave").val('');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al procesar la solicitud. Por favor, inténtelo de nuevo.'
                    });
                }
            });
        }
    });
});

//Carga para iniciar sesion (Este boton se encuentra en register.php)
$(function() {
    $("#enviarLogin").click(function(event) {//Boton de click
        event.preventDefault();

        // Obtener el valor de inicio de sesión (nos ayuda a migrar nuestros datos de registro a login)
        var inicio = $("#login").val();

        $.ajax({
            type: 'POST',
            url: '../register/register.html',
            data: { inicio: inicio },
            success: function(response) {
                // Mostrar el mensaje de SW (carga)
                Swal.fire({
                    title: "Cambiando a Registro",
                    html: "Cargando...",
                    timer: 300, // Ajusta el tiempo en milisegundos si es necesario
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // Redirigir a la página de inicio de sesión después de que se cierre el SweetAlert
                        window.location.href = '../login/login.html';
                    }
                });
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al procesar la solicitud.'
                });
            }
        });
    });
});

//Boton de carga para registro AJAX (Esto se encuentra en login.php)
$(function() {
    $("#enviarLogin").click(function(event) {
        event.preventDefault(); // Evitar el comportamiento por defecto (en este caso, la recarga de la página)

        // Validaciones
        if ($("#email").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar el correo'
            });
        } else if ($("#clave").val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Debes ingresar la contraseña'
            });
        } else {
            // Si todas las validaciones pasan, enviar los datos a través de AJAX

            // Obtener los datos del formulario
            var email = $("#email").val();
            var clave = $("#clave").val();

            // Construir el objeto de datos que deseas enviar al servidor
            var datos = {
                email: email,
                clave: clave
            };

            // Enviar una solicitud AJAX al archivo "login.php" en el backend
            $.ajax({
                type: 'POST',
                url: '../backend/login.php', // Asegúrate de que esta ruta sea correcta
                data: datos,
                success: function(response) {
                    // Manejar la respuesta del servidor
                    if (response.includes("Login incorrecto!!")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Correo o contraseña incorrectos'
                        });
                    } else if (response.includes("Login exitoso")) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login exitoso',
                            text: response
                        }).then(() => {
                            // Redirigir a la página principal después del inicio de sesión exitoso
                            window.location.href = '../index.php';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error. Por favor, inténtelo de nuevo.'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al procesar la solicitud. Por favor, inténtelo de nuevo.'
                    });
                }
            });
        }
    });
});
