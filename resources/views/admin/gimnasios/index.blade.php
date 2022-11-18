@extends('adminlte::page')

@section('title', __('Gimnasios'))

@section('content_header')
    <h1>{{ __('Gimnasios') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.gimnasios.create') }}" class="btn btn-dark btn-sm"><span class="fa fa-plus"></span><br>{{__('Nuevo')}}</a>
                </div>
            </div>
        </div>

        <div class="card-body">

            @include('flash-message')

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatable-gimnasios" style="width:100%">
                    <thead>
                        <th class="text-center" width="50px">#</th>
                        <th class="text-center">{{__('Nombre')}}</th>
                        <th class="text-center">{{__('Direccion')}}</th>
                        <th class="text-center">{{__('Email')}}</th>
                        <th class="text-center">{{__('Telefono')}}</th>
                        <th class="text-center" width="140px">{{__('Acciones')}}</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.gimnasios.modales._verUsuarios')
    @include('admin.gimnasios.modales._delete')
@stop

@section('js')
<script>
    function montarTabla() {
        return $('#datatable-gimnasios').DataTable({
            "order": [[0, "asc"]],
            "stateSave": true,
            "serverSide": true,
            "processing": true,
            "bJQueryUI": true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "{{__('Todos')}}"]],
            "ajax": {
                url: "{{ route('admin.gimnasios.indexAjax') }}",
                method: "get",
            },
            "columns": [
                {data: 'id', 'className': 'text-center'},
                {data: 'nombre', 'className': 'text-center'},
                {data: 'direccion', 'className': 'text-center'},
                {data: 'email', 'className': 'text-center'},
                {data: 'telefono', 'className': 'text-center'},
                {data: null,'className': 'text-center',
                    render: function(data,type,row,meta){
                        let url;
                        let button = "";
                        button += '<button type="button" id="gim-'+data.id+'" class="btn btn-dark ver-usuarios" title="{{__('Ver usuarios')}}" data-toggle="modal" data-target="#modalVerUsuarios"><i class="fa fa-users"></i></button> ';
                        url = '{{ url('admin/gimnasios/edit') }}/'+data.id;
                        button += '<a href="'+url+'" class="btn btn-dark" title="{{__('Editar')}}"><i class="fa fa-edit"></i></a> ';
                        button += '<button type="button" id="'+data.id+'" class="btn btn-danger eliminar-gimnasio" title="{{__('Eliminar')}}" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash"></i></button>';

                        return button;
                    }
                },
            ],
            "oLanguage": {
                "sProcessing": "{{__('Procesando...')}}",
                "sLengthMenu": "{{__('Mostrar _MENU_ registros')}}",
                "sZeroRecords": "{{__('No se encontraron resultados')}}",
                "sEmptyTable": "{{__('Ningún dato disponible en esta tabla')}}",
                "sInfo": "{{__('Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros')}}",
                "sInfoEmpty": "{{__('Mostrando registros del 0 al 0 de un total de 0 registros')}}",
                "sInfoFiltered": "{{__('(filtrado de un total de _MAX_ registros)')}}",
                "sInfoPostFix": "",
                "sSearch": "{{__('Buscar:')}}",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "{{__('Cargando...')}}",
                "oPaginate": {
                    "sFirst": "{{__('Primero')}}",
                    "sLast": "{{__('Último')}}",
                    "sNext": "{{__('Siguiente')}}",
                    "sPrevious": "{{__('Anterior')}}"
                },
                "oAria": {
                    "sSortAscending": "{{__(': Activar para ordenar la columna de manera ascendente')}}",
                    "sSortDescending": "{{__(': Activar para ordenar la columna de manera descendente')}}"
                },
                "buttons": {
                    "copy": "{{__('Copiar')}}",
                    "colvis": "{{__('Visibilidad')}}"
                }
            }
        });
    }
    $(document).ready(function(){
        montarTabla();

        $('#datatable-gimnasios tbody').on('click', '.eliminar-gimnasio', function () {
            let id = $(this).attr('id');
            let url = "{{ url('/admin/gimnasios/destroy') }}/" + id;
            $('#formularioEliminarGimnasio').attr('action', url);
        });

        $('#datatable-gimnasios tbody').on('click', '.ver-usuarios', function () {
            let id = $(this).attr('id').split('-')[1];

            $.ajax({
                type: "get",
                url: '{{ url('/admin/gimnasios/verUsuariosAjax') }}/'+id,
                success: function(response) {
                    let tbody = response.map(val =>{
                        let activo = val.activo == true ? "Si" : "No";
                        let nombre = val.apellido2 != null ? val.nombre+' '+val.apellido1+' '+val.apellido2 : val.nombre+' '+val.apellido1;
                        let fecha = val.fec_nac.split('-');
                        let fecha_nacimiento = fecha[2]+'/'+fecha[1]+'/'+fecha[0];
                        let resultado = '<tr>' +
                            '<td>'+val.usuario_id+'</td>'+
                            '<td>'+nombre+'</td>'+
                            '<td>'+fecha_nacimiento+'</td>'+
                            '<td>'+activo+'</td>'+
                            '</tr>';

                        return resultado;
                    });

                    if(tbody != null){
                        $('tbody#verUsuariosEnGimnasios').html(tbody);
                    }
                }
            });
        });
    });
</script>
@stop
