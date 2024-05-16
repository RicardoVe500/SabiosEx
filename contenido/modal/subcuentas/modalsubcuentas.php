<div class="modal fade" id="modalsubcatalogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Subcuenta</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="insertsubmodal">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="form-control" type="hidden" name="taskId" id="taskId">
                                <input class="form-control" type="text" name="nivelCuenta" id="nivelCuenta">
                                <input class="form-control" type="hidden" placeholder="Numero Cuenta" id="numerosub">
                                <label for="Nombrecuenta" style="margin-top: 10px;">Nombre Cuenta:</label>
                                <input class="form-control" type="text" placeholder="Nombre Cuenta" id="nombresub">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="Nombrecuenta" style="margin-top: 10px;" >Movimientos:</label>
                                <select class="form-control" id="selectsubcuentas" name="selectsubcuentas">
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success as fa-save" type="submit" value="Guardar" name="btningresar">

                </div>
            </form>
        </div>
    </div>
</div>