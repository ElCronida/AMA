<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($producto->nombre) ? $producto->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre del producto'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('precio') ? 'has-error' : ''}}">
        {{ Form::label('precio', __('Precio/Stock'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6 input-group">
                {{ Form::number('precio', isset($producto->precio) ? $producto->precio : "", array('class' => 'form-control', 'placeholder' => __('Precio del producto'), 'id' => 'precio')) }}
                {!! $errors->first('precio', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
            <div style="display:none;" class="col-1 row salto-movil"></div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::number('stock', isset($producto->stock) ? $producto->stock : "", array('class' => 'form-control', 'placeholder' => __('Stock del producto'), 'id' => 'stock')) }}
                {!! $errors->first('stock', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('marca_id') ? 'has-error' : ''}}">
        {{ Form::label('marca_id', __('Marcas'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('marca_id', $marcas, isset($producto->marca_id) ? $producto->marca_id : null, ['class' => 'form-control select2','aria-hidden' => 'true', 'id' => 'marca', 'placeholder' => 'Selecciona una marca']) }}
                {!! $errors->first('marca_id', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('categoria') ? 'has-error' : ''}}">
        {{ Form::label('categoria_id', __('Categorias'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="row col-sm-8 col-md-8 col-lg-8">
            <div class="col-sm-6 col-md-6 col-lg-6">
                {{ Form::select('categoria_id', $categorias, isset($producto->categoria_id) ? $producto->categoria_id : null, ['class' => 'form-control select2','aria-hidden' => 'true', 'id' => 'categoria', 'placeholder' => 'Selecciona una categoria']) }}
                {!! $errors->first('categoria_id', '<p class="help-block" style="color:red;">:message *</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group row {{ $errors->has('descripcion') ? 'has-error' : ''}}">
        {{ Form::label('descripcion', __('Descripcion'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::textarea('descripcion', isset($producto->descripcion) ? $producto->descripcion : "", array('class' => 'form-control', 'placeholder' => __('Descripcion del producto'), 'id' => 'descripcion')) }}
            {!! $errors->first('descripcion', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/css/bootstrap-multiselect.min.css" integrity="sha512-jpey1PaBfFBeEAsKxmkM1Yh7fkH09t/XDVjAgYGrq1s2L9qPD/kKdXC/2I6t2Va8xdd9SanwPYHIAnyBRdPmig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/js/bootstrap-multiselect.min.js" integrity="sha512-fp+kGodOXYBIPyIXInWgdH2vTMiOfbLC9YqwEHslkUxc8JLI7eBL2UQ8/HbB5YehvynU3gA3klc84rAQcTQvXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function inputSize(){
            if($(window).width() < 575){
                $('#stock').css('margin-left','auto');
                $('#stock').css('margin-top','calc(0.375rem + 1px)');
            }else{
                $('#stock').css('margin-left','0.8rem');
                $('#stock').css('margin-top','auto');
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
