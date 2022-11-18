<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($marca->nombre) ? $marca->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre de la marca'), 'id' => 'nombre')) }}
            {!! $errors->first('nombre', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>

    <div class="form-group row {{ $errors->has('url_web') ? 'has-error' : ''}}">
        {{ Form::label('url_web', __('Direccion web'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('url_web', isset($marca->url_web) ? $marca->url_web : "", array('class' => 'form-control', 'placeholder' => __('Direccion web (URL)'), 'id' => 'url_web')) }}
            {!! $errors->first('url_web', '<p class="help-block" style="color:red;">:message *</p>') !!}
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>
