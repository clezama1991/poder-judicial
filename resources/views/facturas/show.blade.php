@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row mb-3">
                    <div class="col-12 blue_header rounded py-3">
                        <h2 class="font-italic font-weight-bold m-0">Facturas - Consulta</h2>
                    </div>

                </div>
            

                <div class="row mb-3">
                    <div class="col-6">

                        <div class="row mb-3">
                            <div class="col-12 blue_header rounded py-3">
                                <h4 class="font-italic font-weight-bold m-0">Datos de la Factura</h4>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id">Nro Factura</label>
                                <input type="text" class="form-control" value="{{ $record->id }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_nombre">Fecha</label>
                                <input type="text" class="form-control" value="{{ $record->created_at }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_nombre">Compra</label>
                                <input type="text" class="form-control" value="{{ $record->total_compra }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_precio">Impuesto</label>
                                <input type="text" class="form-control" value="{{ $record->total_impuesto }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_impuesto">Total a Pagar</label>
                                <input type="text" class="form-control" value="{{ $record->total_pagar }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="row mb-3">
                            <div class="col-12 blue_header rounded py-3">
                                <h4 class="font-italic font-weight-bold m-0">Datos del Cliente</h4>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_nombre">ID</label>
                                <input type="text" class="form-control" value="{{ $record->compra->usuario->id }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_nombre">Nombre</label>
                                <input type="text" class="form-control" value="{{ $record->compra->usuario->name }}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_nombre">Email</label>
                                <input type="text" class="form-control" value="{{ $record->compra->usuario->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        
                        <div class="row mb-3">
                            <div class="col-12 blue_header rounded py-3">
                                <h4 class="font-italic font-weight-bold m-0">Detalles de la compra</h4>
                            </div>

                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Impuesto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>{{ $record->compra->producto->id }}</td>
                                            <td>{{ $record->compra->producto->nombre }}</td>
                                            <td>{{ $record->compra->producto->precio }}</td>
                                            <td>{{ $record->compra->producto->impuesto }}</td>
                                           
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col col-md-2">
                    </div>

                    <div class="form-group col col-md-2 ">
                    </div>

                    <div class="form-group col col-md-8 d-flex justify-content-end">
                        <a class="btn btn-small btn-primary mr-3" href="{{ url('facturas') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
