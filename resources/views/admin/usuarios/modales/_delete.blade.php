<div class="modal fade" id="modalEliminar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('Eliminar usuario') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('¿Estas seguro de que quieres eliminar a este Usuario?') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">{{ __('No') }}</button>
                {{ Form::open(array('method' => 'post', 'id' => 'formularioEliminarUsuario')) }}
                    {{ method_field('DELETE') }}
                    {{ Form::token() }}
                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
