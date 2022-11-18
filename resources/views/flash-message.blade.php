@if ($message = Session::get('success'))
    <div class="alert alert-dark alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p class="font-weight-bold mb-1">{{ __('Correcto.') }}</p>
        <p>{!! $message !!}</p>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p class="font-weight-bold mb-1">{{ __('Error:') }}</p>
        <p>{!! $message !!}</p>
    </div>
@endif
