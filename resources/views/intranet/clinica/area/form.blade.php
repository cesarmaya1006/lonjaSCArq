@if (session('rol_principal_id')< 3)
    <div class="row">
        <div class="col-12 col-md-3 form-group" id="caja_empresas">
            <label for="clinica_id">Clínica</label>
            <select id="clinica_id" name="clinica_id" class="form-control form-control-sm" data_url="{{ route('areas.getAreas') }}" required>
                <option value="">Elija clínica</option>
                    @foreach ($clinicas as $clinica)
                        <option value="{{ $clinica->id }}" {{isset($area_edit)?($area_edit->clinica_id==$clinica->id? 'selected':''):''}}>
                            {{ $clinica->clinica }}
                        </option>
                    @endforeach
            </select>
        </div>
    </div>
<hr class="{{isset($area_edit)?'':'d-none'}}" id="hr_cajaAreas">
<div class="row {{isset($area_edit)?'':'d-none'}}" id="row_caja_areas">
    <div class="col-12 col-md-3 form-group" id="caja_areas">
        <label for="area_id">Área Superior</label>
        <select id="area_id" class="form-control form-control-sm" name="area_id">
            <option value="">Elija área</option>
            @if (isset($area_edit))
                @foreach ($area_edit->clinica->areas as $area)
                    <option value="{{ $area->id }}" {{$area_edit->area_id==$area->id? 'selected':''}}>
                        {{ $area->area }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col-12 col-md-3 form-group" id="caja_area_nueva">
        <label class="requerido" for="area">Nombre del Área</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('area', $area_edit->area ?? '') }}" name="area" id="area" >
    </div>
</div>
@else
<input type="hidden" name="clinica_id" id="clinica_id" value="{{session('clinica_id')}}">
<div class="row" id="row_caja_areas">
    <div class="col-12 col-md-3 form-group" id="caja_areas">
        <label for="area_id">Área Superior</label>
        <select id="area_id" class="form-control form-control-sm" name="area_id">
            <option value="">Elija área</option>
            @foreach ($clinicas->areas as $area)
                <option value="{{ $area->id }}" {{isset($area_edit)?($area_edit->area_id==$area->id? 'selected':''):''}}>
                    {{ $area->area }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-3 form-group" id="caja_area_nueva">
        <label class="requerido" for="area">Nombre del Área</label>
        <input type="text" class="form-control form-control-sm" value="{{ old('area', $area_edit->area ?? '') }}" name="area" id="area" >
    </div>
</div>
@endif
