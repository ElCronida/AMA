<div class="card-body">
    <div class="form-group row {{ $errors->has('nombre') ? 'has-error' : ''}}">
        {{ Form::label('nombre', __('Nombre'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::text('nombre', isset($estilo->nombre) ? $estilo->nombre : "", array('class' => 'form-control', 'placeholder' => __('Nombre del estilo'), 'id' => 'nombre')) }}
        </div>
        {!! $errors->first('nombre', '<p class="help-block offset-sm-3" style="color:red;">:message *</p>') !!}
    </div>

    <div class="form-group row {{ $errors->has('disciplina_id') ? 'has-error' : ''}}">
        {{ Form::label('disciplina_id', __('Disciplina'), array('class' => 'col-sm-2 offset-sm-1 col-form-label') ) }}
        <div class="col-sm-8 col-md-8 col-lg-8">
            {{ Form::select('disciplina_id', $disciplinas, isset($estilo->disciplina_id) ? $estilo->disciplina_id : null, ['class' => 'form-control select2',"placeholder" => __('Selecciona una disciplina'),'aria-hidden' => 'true' ]) }}
        </div>
        {!! $errors->first('disciplina_id', '<p class="help-block offset-sm-3" style="color:red;">:message *</p>') !!}
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-dark float-right">{{ __('Aceptar') }}</button>
</div>
