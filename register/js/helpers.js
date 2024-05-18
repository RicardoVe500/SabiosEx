//Registro en AJAX
$(function(){
    // Configurar un evento de click para un botón u otro elemento
    $("#enviarDatos").click(function(event){
        event.preventDefault(); // Evitar el comportamiento por defecto (en este caso, la recarga de la página)

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
            url: '../backend/register.php',
            data: datos,
            success: function(response){
                // Manejar la respuesta del servidor
                $("#frmRegistro").html(response); // Mostrar la respuesta en un elemento con el ID "mensaje"
            },
            error: function(xhr, status, error){
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
                $("#register").html("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });
});

