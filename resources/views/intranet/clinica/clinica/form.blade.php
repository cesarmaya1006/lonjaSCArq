<div class="row">
    <div class="col-12 col-md-4 form-group">
        <label for="clinica" class="requerido">Nombre Clínica</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('clinica', $clinica_edit->clinica ?? '') }}" name="clinica" id="clinica" required>
    </div>
    <div class="col-12 col-md-4 form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control form-control-sm" value="{{ old('email', $clinica_edit->email ?? '') }}" name="email" id="email" >
    </div>
    <div class="col-12 col-md-2 form-group">
        <label for="telefono">Teléfono</label>
        <input type="tel" class="form-control form-control-sm" value="{{ old('telefono', $clinica_edit->telefono ?? '') }}" name="telefono" id="telefono" >
    </div>
    <div class="col-12 col-md-4 form-group">
        <label for="direccion">Dirección</label>
        <input type="tel" class="form-control form-control-sm" value="{{ old('direccion', $clinica_edit->direccion ?? '') }}" name="direccion" id="direccion" >
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="contacto">Contacto</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('contacto', $clinica_edit->contacto ?? '') }}" name="contacto" id="contacto" >
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="cargo">Cargo contacto</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('cargo', $clinica_edit->cargo ?? '') }}" name="cargo" id="cargo" >
    </div>
    <div class="col-12 col-md-6 form-group">
        <div class="row">
            <div class="col-12 form-group">
                <label for="logo" >Logo Empresarial</label>
                <input type="file" class="form-control" id="logo" name="logo" placeholder="logo" accept="image/png,image/jpeg" onchange="mostrar()">
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-md-6">
                        <img class="img-fluid fotoEmpresa" id="fotoEmpresa" src="{{ isset($clinica_edit) ?($clinica_edit->logo!=null?asset('/imagenes/empresas/'.$clinica_edit->logo) : asset('/imagenes/empresas/clinica1.png')) : asset('/imagenes/empresas/clinica1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
