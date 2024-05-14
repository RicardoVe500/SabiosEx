$(function(){
    $("#task-result").hide()
    fecthData()
    let edit = false;

    $("#search").keyup(()=>{
        if($("#search").val()){
            let search = $("#search").val();
            $.ajax({
                url:"co",
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

    $(document).ready(function() {
        // Llenar el select con datos de movimientos al cargar la página
        $.ajax({
            url: "controllers/subcuentas/select.php",
            type: "GET",
            success: function(response) {
                try {
                    // Intenta analizar la respuesta como JSON
                    let movimientos = JSON.parse(response);
                    console.log(response)
    
                    // Variable para acumular opciones del select
                    
                    let options = "";
    
                    // Iterar sobre cada movimiento y construir las opciones
                    movimientos.forEach(movimiento => {
                        options += `<option value="${movimiento.movimientoId}">${movimiento.movimiento}</option>`;
                    });
    
                    // Asignar todas las opciones al select una sola vez
                    $('#selectsubcuentas').html(options);
    
                } catch (error) {
                    console.error("Error al procesar la respuesta JSON:", error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error al obtener los movimientos:", textStatus, errorThrown);
            }
        });
    }),

   $("#insertmodal").submit(e => {
    e.preventDefault();
    const postData = {
        numeroCuenta: $("#numeroCuenta").val(),
        nombreCuenta: $("#nombreCuenta").val(),
    }
    $.ajax({
        url: "controllers/catalogo/insertsubcuenta.php",
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
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    if (id) { 
        $.ajax({
            url: "controllers/subcuentas/listarcatalogosub.php",
            data: { id },
            type: "GET",
            success: function(response) {
                const tasks = JSON.parse(response); 
                let template = ``;
                tasks.forEach(task =>
                {
                    template += `
                    <tr taskId="${task.cuentaId}">
                        <td>${task.nombreCuenta}</td>
                        <td>${task.numeroCuenta}</td>
                        <td>${task.cuentaDependiente}</td>
                        <td>${task.nivelCuenta}</td>
                        <td>${task.movimientoId}</td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm edit-modal" data-toggle="modal" data-target="#editmodalcatalogo"><i class="fas fa-edit"></i> Modificar</button>
                        <button type="button" class="btn btn-danger btn-sm delete-catalogo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </td>
                    </tr>
                    `;
                })
                $("#datoscuerpo").html(template);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores si la solicitud AJAX falla
                console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
            }
        })
    
    } else{
        console.error("ID no encontrado en la URL.");
    }
    
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



