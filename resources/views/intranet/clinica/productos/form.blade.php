<div class="row">
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="producto">Tipo de producto / servicio</label>
        <select class="form-control form-control-sm" name="tipo" id="tipo" required>
            <option value="">Elija un tipo</option>
            <option value="DIETA" {{isset($producto_edit)?($producto_edit->tipo =='DIETA'?'selected':''):''}}>DIETA</option>
            <option value="NUEVES/ ONCES / REFR" {{isset($producto_edit)?($producto_edit->tipo =='NUEVES/ ONCES / REFR'?'selected':''):''}}>NUEVES/ ONCES / REFRIGERIOS</option>
            <option value="DESECHABLES" {{isset($producto_edit)?($producto_edit->tipo =='DESECHABLES'?'selected':''):''}}>DESECHABLES</option>
            <option value="ADICIONALES" {{isset($producto_edit)?($producto_edit->tipo =='ADICIONALES'?'selected':''):''}}>ADICIONALES</option>
        </select>
    </div>

    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="producto">Nombre del producto / servicio</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('producto', $producto_edit->producto ?? '') }}" name="producto" id="producto" required>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="costo">Costo del producto / servicio</label>
        <input type="number" min="0" step="1"  class="form-control form-control-sm text-right" value="{{ old('costo', $producto_edit->costo ?? '0') }}" name="costo" id="costo">
    </div>
</div>
