@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="flash-message" id="mensaje">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <br>


                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="font-italic font-weight-bold m-0"> Realizar Compra</h2>
                    </div>
                </div>

                
                <form class="form" action="{{ url('guardar_compra') }}"
                method="POST">
                        @csrf
                <div class="form-group col-12 col-md-12">
                    <div class="form-group">
                        <label for="producto_id" class="col-form-label font-weight-bold">Productos:</label>
                        <select name="producto_id" id="producto_id" class="form-control" >
                            @foreach($records as $record)
                                <option value="{{$record->id}}">
                                    {{$record->nombre}} / Precio:  {{$record->precio}}/ Impuesto:  {{$record->impuesto}}
                                </option>
                            @endforeach
                        </select>
                     </div>
                </div>


                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 text-center">                
                        <button title="Guardar" type="submit" class="btn btn-primary">
                            Generar Compra
                        </button>
                    </div>
                </div>
 
            </form>
 
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $('#table').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    </script>
@endsection
