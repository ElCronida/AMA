<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($federacion->nombre) ? $federacion->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre de la federacion'), 'id' => 'nombre')) }}
        </div>
        {!! $errors->first('nombre', '<p class="help-block offset-sm-3" style="color:red;">:message *</p>') !!}
    </div>

</div>
<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>
