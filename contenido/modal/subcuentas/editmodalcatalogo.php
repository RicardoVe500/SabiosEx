<div class="modal fade" id="editmodalcatalogo" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="editform">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="hidden" name="taskId" id="taskId" >
                                <input class="form-control" type="hidden" placeholder="Nombre Cuenta" id="editnumeroCuenta" maxlength="1">
                                <label for="Nombrecuenta">Nombre Cuenta:</label>
                                <input class="form-control" type="text" placeholder="Nombre Cuenta" id="editnombreCuenta">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-success" type="button" id="editarcat"><i class="fas fa-edit"></i> Editar</button>
                </div>


            </form>

        </div>
    </div>
</div>