<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($cuota->nombre) ? $cuota->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre de la cuota'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('precio') ? 'has-error' : ''}}">
        {{ Form::label('precio', __('Precio/Duración'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-8 col-md-8 col-lg-8">
                {{ Form::number('precio', isset($cuota->precio) ? $cuota->precio : "", array('class' => 'form-control', 'placeholder' => __('Coste de la cuota'), 'id' => 'precio', 'step' => 'any')) }}
                {!! $errors->first('precio', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4" id="altura-peso">
                {{ Form::number('meses_suscripcion', isset($cuota->meses_suscripcion) ? $cuota->meses_suscripcion : "", array('class' => 'form-control', 'placeholder' => __('Duracion (Meses)'), 'id' => 'meses_suscripcion')) }}
                {!! $errors->first('meses_suscripcion', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>

@push('js')
    <script>
        function inputSize(){
            if($(window).width() < 575){
                $('#meses_suscripcion').css('margin-left','auto');
                $('#meses_suscripcion').css('margin-top','calc(0.375rem + 1px)');
            }else{
                $('#meses_suscripcion').css('margin-left','0.8rem');
                $('#meses_suscripcion').css('margin-top','auto');
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
