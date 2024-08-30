<div class="row">
    <div class="col-12 col-md-3 form-group" id="caja_unidad_nueva">
        <label class="requerido" for="tiempo">Nombre de la unidad de tiempo</label>
        <input type="text" class="form-control form-control-sm"
            value="{{ old('tiempo', $tiempo_edit->tiempo ?? '') }}" name="tiempo" id="tiempo">
    </div>
</div>
