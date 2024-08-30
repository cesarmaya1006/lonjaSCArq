<div class="row">
    @if (session('rol_principal_id') < 3)
        <div class="col-12 col-md-3 form-group" id="caja_empresas">
            <label for="clinica_id">Clínica</label>
            <select id="clinica_id" name="clinica_id" class="form-control form-control-sm"
                data_url="{{ route('areas.getAreas') }}" required>
                <option value="">Elija clínica</option>
                @foreach ($clinicas as $clinica)
                    <option value="{{ $clinica->id }}"
                        {{ isset($unidad_edit) ? ($unidad_edit->clinica_id == $clinica->id ? 'selected' : '') : '' }}>
                        {{ $clinica->clinica }}
                    </option>
                @endforeach
            </select>
        </div>
    @else
        <input type="hidden" name="clinica_id" id="clinica_id" value="{{ session('clinica_id') }}">
    @endif
    <div class="col-12 col-md-3 form-group" id="caja_unidad_nueva">
        <label class="requerido" for="unidad">Nombre de la unidad</label>
        <input type="text" class="form-control form-control-sm"
            value="{{ old('unidad', $unidad_edit->unidad ?? '') }}" name="unidad" id="unidad">
    </div>
</div>
