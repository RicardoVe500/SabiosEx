<div class="modal fade" id="modalcatalogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Catalogo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="insertmodal">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="Nombrecuenta">Numero Cuenta:</label>
                                <input class="form-control" id="numero" type="text" placeholder="Numero Cuenta" id="numeroCuenta" maxlength="1" required onkeypress="return isNumberKey(event)">
                            </div>
                            <div class="col">
                                <label for="Nombrecuenta">Nombre Cuenta:</label>
                                <input class="form-control" type="text" placeholder="Nombre Cuenta" id="nombreCuenta">
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

<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>