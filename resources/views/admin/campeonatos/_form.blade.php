<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($campeonato->nombre) ? $campeonato->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre del campeonato'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('direccion') ? 'has-error' : ''}}">
        {{ Form::label('direccion', __('Direccion'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('direccion', isset($campeonato->direccion) ? $campeonato->direccion : "", array('class' => 'form-control', 'placeholder' => __('Direccion del campeonato'), 'id' => 'direccion')) }}
            {!! $errors->first('direccion', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('fecha_ini') ? 'has-error' : ''}}">
        {{ Form::label('fecha_ini', __('Fecha ini. / fin'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::date('fecha_ini', isset($campeonato->fecha_ini) ? $campeonato->fecha_ini : "", array('class' => 'form-control', 'placeholder' => __('Fecha inicio'), 'id' => 'fec_ini', 'step' => 'any')) }}
                {!! $errors->first('fecha_ini', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" id="altura-peso">
                {{ Form::date('fecha_fin', isset($campeonato->fecha_fin) ? $campeonato->fecha_fin : "", array('class' => 'form-control', 'placeholder' => __('Fecha fin'), 'id' => 'fecha_fin')) }}
                {!! $errors->first('fecha_fin', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('hora_ini') ? 'has-error' : ''}}">
        {{ Form::label('hora_ini', __('Hora ini. / fin'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::time('hora_ini', isset($campeonato->hora_ini) ? date('H:i',strtotime($campeonato->hora_ini)) : "", array('class' => 'form-control', 'placeholder' => __('Hora inicio'), 'id' => 'hora_ini')) }}
                {!! $errors->first('hora_ini', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" id="altura-peso">
                {{ Form::time('hora_fin', isset($campeonato->hora_fin) ? date('H:i',strtotime($campeonato->hora_fin)) : "", array('class' => 'form-control', 'placeholder' => __('Hora fin'), 'id' => 'hora_fin')) }}
                {!! $errors->first('hora_fin', '<p class="help-block" id="error-hora_fin" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('reglamento_id') ? 'has-error' : ''}}">
        {{ Form::label('reglamento_id', __('Reglamento'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('reglamento_id', $reglamentos, isset($campeonato->reglamento_id) ? $campeonato->reglamento_id : null, ['class' => 'form-control select2','aria-hidden' => 'true', 'id' => 'reglamento_id', 'placeholder' => __('Selecciona un reglamento')]) }}
                {!! $errors->first('reglamento_id', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('arbitros') ? 'has-error' : ''}}">
        {{ Form::label('arbitros', __('Arbitros'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('arbitros[]', $listaArbitros, isset($campeonato->arbitros) ? $campeonato->arbitros()->pluck('arbitros.id') : null, ['class' => 'form-control select2','aria-hidden' => 'true', 'multiple' => 'multiple', 'id' => 'arbitrosMultiple']) }}
                {!! $errors->first('arbitros', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('descripcion') ? 'has-error' : ''}}">
        {{ Form::label('descripcion', __('Descripcion'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::textarea('descripcion', isset($campeonato->descripcion) ? $campeonato->descripcion : "", array('class' => 'form-control', 'placeholder' => __('Descripcion del campeonato'), 'id' => 'descripcion')) }}
            {!! $errors->first('descripcion', '<p class="help-block" style="color:red;">:message *</p>') !!}
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
        function inputSize() {
            if ($(window).width() < 575) {
                $('#fecha_fin,#hora_fin,#error-hora_fin').css({'margin-left': 'auto', 'margin-top': 'calc(0.375rem + 1px)'});
            } else {
                $('#fecha_fin,#hora_fin,#error-hora_fin').css({'margin-left': '0.8rem', 'margin-top': 'auto'});

            }
        }

        $('#arbitrosMultiple').multiselect({
            nonSelectedText: '{{('Selecciona')}}',
            filterPlaceholder: '{{('Buscar')}}',
            selectAllText: '{{__('Seleccionar todos')}}',
            allSelectedText: 'Todo seleccionado',
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '100%'
        });

        $(document).ready(function(){
            inputSize();

            $(window).resize(function(){
                inputSize();
            });
        });
    </script>
@endpush
