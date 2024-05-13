$(function(){
    $("#task-result").hide()
    fecthData()
    let edit = false;

    $("#search").keyup(()=>{
        if($("#search").val()){
            let search = $("#search").val();
            $.ajax({
                url:"controllers/catalogo/buscar.php",
                data: {search : search},
                type: "POST",
                success: function(response) {
                    let tasks = JSON.parse(response);
                    let template = ``;
                    tasks.forEach(task => {
                        template += `<li><a href="#" class="task-item">${task.nombreCuenta}</a></li>`
                    });
                    $("#task-result").show();
                    $("#container").html(template)
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejo de errores si la solicitud AJAX falla
                    console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                }
            })

        }

    })

   $("#insertmodal").submit(e => {
    e.preventDefault();
    const postData = {
        numeroCuenta: $("#numeroCuenta").val(),
        nombreCuenta: $("#nombreCuenta").val(),
    }
    $.ajax({
        url: "controllers/catalogo/insertcatalogo.php",
        data: postData,
        type: "POST",
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: '¡Cuenta Agregada!',
                text: 'La cuenta se agrego exitosamente.',
            });
            fecthData()
            $("#insertmodal").trigger("reset")
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Manejo de errores si la solicitud AJAX falla
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    })
   })

   function fecthData(){
    $.ajax({
        url: "controllers/catalogo/listarcatalogo.php",
        type: "GET",
        success: function(response) {
            const tasks = JSON.parse(response);
            let template = ``;
            tasks.forEach(task =>
            {
                template += `
                <tr taskId="${task.cuentaId}">
                    <td>${task.nombreCuenta}</td>
                    <td data-num="${task.numeroCuenta}">${task.numeroCuenta}</td>
                    <td>${task.movimientoId}</td>
                    <td>${task.nivelCuenta}</td>
                <td>

                    <button herf="subcuentas.php" type="button" class="btn btn-primary btn-sm subcuentas-btn" data-num="${task.numeroCuenta}"><i class="fas fa-layer-group"></i> SubCuentas</button>
                    <button type="button" class="btn btn-success btn-sm edit-modal" data-toggle="modal" data-target="#editmodalcatalogo"><i class="fas fa-edit"></i> Modificar</button>
                    <button type="button" class="btn btn-danger btn-sm delete-catalogo"><i class="fas fa-trash-alt"></i> Eliminar</button>

                </td>
                </tr>
                `;
            })
            $("#datoscuerpo").html(template);
            $("#datoscuerpo").on("click", "tr", function() {
                // Obtener el ID de la fila seleccionada
                const taskId = $(this).attr("taskId");
                // Redirigir a la página subcuentas.html con el ID como parámetro
                window.location.href = `subcuentas.php?id=${taskId}`;
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Manejo de errores si la solicitud AJAX falla
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    })

   }

   $(document).on("click", ".delete-catalogo", ()=>{
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const cuentaId = $(element).attr("taskId")
    Swal.fire({
        title: '¿Quieres eliminar este elemento?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            // El usuario confirmó la eliminación
            $.post("controllers/catalogo/deletecatalogo.php", { cuentaId }, () => {
                // Actualizar datos después de eliminar
                fecthData();
            });
        }
    });

   })

$(document).on("click", ".edit-modal", ()=>{
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const cuentaId = $(element).attr("taskId")  
    let url = "controllers/catalogo/obtenerdato.php";
    $.ajax({
        url,
        data: {cuentaId},
        type: "POST",
        success: function(response){
            const task = JSON.parse(response)
            $("#taskId").val(task.cuentaId)
            $("#editnumeroCuenta").val(task.numeroCuenta)
            $("#editnombreCuenta").val(task.nombreCuenta)
            edit = true
        },
        
    })

   }) 

   $(document).on("click", "#editarcat", ()=>{
    const pData = {
        cuentaId: $("#taskId").val(),
        numeroCuenta: $("#editnumeroCuenta").val(),
        nombreCuenta: $("#editnombreCuenta").val(),
    }
    console.log(pData)
    $.ajax({
        url: "controllers/catalogo/updatecatalogo.php",
        data: pData,
        type: "POST",
        success: function(response){
            fecthData()
            Swal.fire({
                icon: 'success',
                title: '¡Actualización exitosa!',
                text: 'Los cambios se han guardado correctamente.',
            });
            
        },
    })
    
   }) 

})



