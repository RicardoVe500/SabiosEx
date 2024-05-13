<div class="modal fade" id="modalcatalogodelete<?php echo $row['cuentaId'];?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Catalogo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                <div class="modal-body">
           
                    <div class="container">
                        <input class="form-control" type="hidden" name="cuentaId"
                            value="<?php echo $row['cuentaId']; ?>">
                        <p>Quieres
                        <p class="font-weight-bold">ELIMINAR</p> Este archivo?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-danger as fa-save" type="submit" value="Eliminar" name="btndelete">
                </div>
          </div>
    
    </div>
</div>