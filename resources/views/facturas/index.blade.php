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
                        <h2 class="font-italic font-weight-bold m-0"> Administrar Facturas</h2>
                    </div>
                </div>



                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 text-center">
                        
                        <form class="form" action="{{ url('generar_facturas_pendientes') }}"
                        method="POST">
                                @csrf
                                <button title="Eliminar" type="submit" class="btn btn-primary">
                                    Generar Factutas Pendientes ( {{$pendientes}} )
                                </button>
                        </form>
 
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Num Factura</th>
                                    <th>Compra</th>
                                    <th>Impuesto</th>
                                    <th>Total a Pagar</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        <td>{{ $record->total_compra }}</td>
                                        <td>{{ $record->total_impuesto }}</td>
                                        <td>{{ $record->total_pagar }}</td>
                                        <td>
                                            <a href="{{ url('facturas/' . $record->id) }}"
                                                class="btn btn-success">
                                                Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
