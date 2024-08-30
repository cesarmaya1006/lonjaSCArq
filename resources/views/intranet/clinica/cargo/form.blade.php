<div class="row">
    <div class="col-12 col-md-3 form-group" id="caja_clinicas">
        <label for="clinica_id" id="label_clinica_id">Clínica </label>
        <select id="clinica_id" class="form-control form-control-sm" data_url="{{ route('areas.getAreas') }}">
            <option value="">Elija clínica</option>
            @foreach ($clinicas as $clinica)
                <option value="{{ $clinica->id }}" {{isset($cargo_edit)?($cargo_edit->area->clinica_id==$clinica->id? 'selected':''):''}}>
                    {{ $clinica->clinica }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-3 form-group {{isset($cargo_edit)?'':'d-none'}}" id="col_caja_areas">
        <label for="area_id" id="label_area_id">Área</label>
        <select id="area_id" name="area_id" class="form-control form-control-sm">
            @if (isset($cargo_edit))
                <option value="">Elija un área</option>
                @foreach ($cargo_edit->area->clinica->areas as $area)
                    <option value="{{ $area->id }}" {{$cargo_edit->area_id==$area->id? 'selected':''}}>
                        {{ $area->area }}
                    </option>
                @endforeach
            @else
                <option value="">Elija una empresa</option>
            @endif
        </select>
    </div>
    <div class="col-12 col-md-3 form-group {{isset($cargo_edit)?'':'d-none'}}" id="caja_cargo_nueva">
        <label class="requerido" for="cargo">Nombre del Cargo</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('cargo', $cargo_edit->cargo ?? '') }}" name="cargo" id="cargo" >
    </div>
</div>


