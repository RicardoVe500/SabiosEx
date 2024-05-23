$(function(){
    $("#task-result").hide()
    fecthData()


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
                        template += `
                        <tr tipoPartidaId="${task.tipoPartidaId}">
                            <td>${task.nombrePartida}</td>
                            <td>${task.descripcion}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm edit-tipopartida" data-toggle="modal" data-target="#editmodaltipopartida"><i class="fas fa-edit"></i> Modificar</button>
                            <button type="button" class="btn btn-danger btn-sm delete-tipopartida"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </td>
                        </tr>
                        `;
                    });
                    $("#datoscuerpo").html(template);  
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejo de errores si la solicitud AJAX falla
                    console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                }
            })

        }

    })

   $("#inserttipopartida").submit(e => {
    e.preventDefault();
    const postData = {
        nombrePartida: $("#nombrePartida").val(),
        descripcion: $("#descripcion").val(),
    }
    $.ajax({
        url: "controllers/tipopartidas/inserttipopartida.php",
        data: postData,
        type: "POST",
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: '¡Tipo de partida Agregada!',
                text: 'La cuenta se agrego exitosamente.',
            });
            fecthData()
            $("#inserttipopartida").trigger("reset")
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Manejo de errores si la solicitud AJAX falla
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    })
   })

   function fecthData(){
    $.ajax({
        url: "controllers/tipopartidas/listartipopartida.php",
        type: "GET",
        success: function(response) {
            const tasks = JSON.parse(response);
            let template = ``;
            tasks.forEach(task =>
            {
                template += `
                <tr tipoPartidaId="${task.tipoPartidaId}">
                    <td>${task.nombrePartida}</td>
                    <td>${task.descripcion}</td>
                <td>
                    <button type="button" class="btn btn-success btn-sm edit-tipopartida" data-toggle="modal" data-target="#editmodaltipopartida"><i class="fas fa-edit"></i> Modificar</button>
                    <button type="button" class="btn btn-danger btn-sm delete-tipopartida"><i class="fas fa-trash-alt"></i> Eliminar</button>
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

   }
   

   $(document).on("click", ".delete-tipopartida", ()=>{
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const tipoPartidaId = $(element).attr("tipoPartidaId")
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
            $.post("controllers/tipopartidas/deletetipopartida.php", { tipoPartidaId }, () => {
                // Actualizar datos después de eliminar
                fecthData();
            });
        }
    });

   })

$(document).on("click", ".edit-tipopartida", ()=>{
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const tipoPartidaId = $(element).attr("tipoPartidaId")  
    let url = "controllers/tipopartidas/obtenerdato.php";
    $.ajax({
        url,
        data: {tipoPartidaId},
        type: "POST",
        success: function(response){
            const task = JSON.parse(response)
            $("#tipoPartidaId").val(task.tipoPartidaId)
            $("#editnombretipo").val(task.nombrePartida)
            $("#editdescripciontipo").val(task.descripcion)
            
        },
        
    })

   }) 

   $(document).on("click", "#editartipopartida", ()=>{
    const pData = {
        tipoPartidaId: $("#tipoPartidaId").val(),
        nombrePartida: $("#editnombretipo").val(),
        descripcion: $("#editdescripciontipo").val(),
    }
    $.ajax({
        url: "controllers/tipopartidas/updatetipopartida.php",
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



