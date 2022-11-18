<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($curso->nombre) ? $curso->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre del curso'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('fecha_ini') ? 'has-error' : ''}}">
        {{ Form::label('fecha_ini', __('Fecha ini. / fin'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::date('fecha_ini', isset($curso->fecha_ini) ? $curso->fecha_ini : "", array('class' => 'form-control', 'placeholder' => __('Fecha inicio'), 'id' => 'fec_ini', 'step' => 'any')) }}
                {!! $errors->first('fecha_ini', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" id="altura-peso">
                {{ Form::date('fecha_fin', isset($curso->fecha_fin) ? $curso->fecha_fin : "", array('class' => 'form-control', 'placeholder' => __('Fecha fin'), 'id' => 'fecha_fin')) }}
                {!! $errors->first('fecha_fin', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>
    <div class="form-group row {{ $errors->has('hora_ini') ? 'has-error' : ''}}">
        {{ Form::label('hora_ini', __('Hora ini. / fin'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::time('hora_ini', isset($curso->hora_ini) ? date('H:i',strtotime($curso->hora_ini)) : "", array('class' => 'form-control', 'placeholder' => __('Hora inicio'), 'id' => 'hora_ini')) }}
                {!! $errors->first('hora_ini', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" id="altura-peso">
                {{ Form::time('hora_fin', isset($curso->hora_fin) ? date('H:i',strtotime($curso->hora_fin)) : "", array('class' => 'form-control', 'placeholder' => __('Hora fin'), 'id' => 'hora_fin')) }}
                {!! $errors->first('hora_fin', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('precio') ? 'has-error' : ''}}">
        {{ Form::label('precio', __('Precio'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::number('precio', isset($curso->precio) ? $curso->precio : "", array('class' => 'form-control', 'placeholder' => __('Precio del curso'), 'id' => 'precio')) }}
                {!! $errors->first('precio', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('gimnasio_id') ? 'has-error' : ''}}">
        {{ Form::label('gimnasio_id', __('Gimnasio'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('gimnasio_id', $gimnasios, isset($curso->gimnasio_id) ? $curso->gimnasio_id : null, ['class' => 'form-control select2',"placeholder" => __('Selecciona un gimnasio'),'aria-hidden' => 'true' ]) }}
            </div>
        </div>
        {!! $errors->first('gimnasio_id', '<p class="help-block offset-sm-3" style="color:red;">:message *</p>') !!}
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>

@push('js')
    <script>
        function inputSize(){
            if($(window).width() < 575){
                $('#fecha_fin,#hora_fin').css({'margin-left':'auto', 'margin-top':'calc(0.375rem + 1px)'});
            }else{
                $('#fecha_fin,#hora_fin').css({'margin-left':'0.8rem', 'margin-top':'auto'});
            }
        }

        $(document).ready(function(){
            inputSize();

            $(window).resize(function(){
                inputSize();
            });
        });
    </script>
@endpush
