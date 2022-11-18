<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($arbitro->nombre) ? $arbitro->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre del arbitro'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('apellido1') ? 'has-error' : ''}}">
        {{ Form::label('apellido1', __('Apellidos'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6 input-group">
                {{ Form::text('apellido1', isset($arbitro->apellido1) ? $arbitro->apellido1 : "", array('class' => 'form-control', 'placeholder' => __('1º Apellido'), 'id' => 'apellido1')) }}
                {!! $errors->first('apellido1', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div style="display:none;" class="col-1 row salto-movil"></div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::text('apellido2', isset($arbitro->apellido2) ? $arbitro->apellido2 : "", array('class' => 'form-control', 'placeholder' => __('2º Apellido'), 'id' => 'apellido2')) }}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
        {{ Form::label('email', __('Contacto'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::email('email', isset($arbitro->email) ? $arbitro->email : "", array('class' => 'form-control', 'placeholder' => __('Email del usuario'), 'id' => 'email')) }}
                {!! $errors->first('email', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::text('telefono', isset($arbitro->telefono) ? $arbitro->telefono : "", array('class' => 'form-control', 'placeholder' => __('Telefono de contacto'), 'id' => 'telefono')) }}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('fec_nac') ? 'has-error' : ''}}">
        {{ Form::label('fec_nac', __('Fecha nacimiento'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::date('fec_nac', isset($arbitro->fec_nac) ? $arbitro->fec_nac : "", array('class' => 'form-control', 'placeholder' => __('Fecha de nacimiento'), 'id' => 'fec_nac')) }}
                {!! $errors->first('fec_nac', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('nacionalidad') ? 'has-error' : ''}}">
        {{ Form::label('nacionalidad', __('Nacionalidad'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::text('nacionalidad', isset($arbitro->nacionalidad) ? $arbitro->nacionalidad : "", array('class' => 'form-control', 'placeholder' => __('Nacionalidad del arbitro'), 'id' => 'nacionalidad')) }}
            </div>
        </div>
        {!! $errors->first('nacionalidad', '<p class="help-block offset-sm-3" style="color:red;">:message *</p>') !!}
    </div>

    <div class="form-group row {{ $errors->has('disciplina') ? 'has-error' : ''}}">
        {{ Form::label('disciplina', __('Disciplina'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('disciplina[]', $disciplinas, isset($arbitro->disciplinas) ? $arbitro->disciplinas()->pluck('disciplinas.id') : null, ['class' => 'form-control select2','aria-hidden' => 'true', 'multiple' => 'multiple', 'id' => 'disciplinaMultiple']) }}
                {!! $errors->first('disciplina', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/css/bootstrap-multiselect.min.css" integrity="sha512-jpey1PaBfFBeEAsKxmkM1Yh7fkH09t/XDVjAgYGrq1s2L9qPD/kKdXC/2I6t2Va8xdd9SanwPYHIAnyBRdPmig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .multiselect-container {
            width: 100% !important;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/js/bootstrap-multiselect.min.js" integrity="sha512-fp+kGodOXYBIPyIXInWgdH2vTMiOfbLC9YqwEHslkUxc8JLI7eBL2UQ8/HbB5YehvynU3gA3klc84rAQcTQvXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function inputSize(){
            if($(window).width() < 575){
                $('#apellido2, #telefono, #cod_postal,#tipo,#repetir_password').css('margin-left','auto');
                $('#altura, #peso').css('margin-left','auto');
                $('#apellido2, #telefono, #cod_postal,#altura,#peso,#tipo,#repetir_password').css('margin-top','calc(0.375rem + 1px)');
            }else{
                $('#apellido2, #telefono, #cod_postal,#tipo,#repetir_password').css('margin-left','0.8rem');
                $('#altura, #peso').css('margin-left','1.8rem');
                $('#apellido2, #telefono, #cod_postal,#altura, #peso,#tipo,#repetir_password').css('margin-top','auto');
            }
        }

        $(document).ready(function(){
            inputSize();

            $('#disciplinaMultiple').multiselect({
                nonSelectedText: '{{('Selecciona')}}',
                filterPlaceholder: '{{('Buscar')}}',
                selectAllText: '{{__('Seleccionar todos')}}',
                allSelectedText: 'Todo seleccionado',
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%'
            });

            $(window).resize(function(){
                inputSize();
            });
        });
    </script>
@endpush
