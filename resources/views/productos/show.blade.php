@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row mb-3">
                    <div class="col-12 blue_header rounded py-3">
                        <h2 class="font-italic font-weight-bold m-0">Productos - Consulta</h2>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="id_nombre">ID</label>
                        <input type="text" class="form-control" name="nombre" id="id_nombre"
                            value="{{ $record->id }}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="id_nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="id_nombre"
                            value="{{ $record->nombre }}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="id_precio">Precio</label>
                        <input type="number" class="form-control" name="precio" id="id_precio"
                            value="{{ $record->precio }}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="id_impuesto">Impuesto % </label>
                        <input type="number" class="form-control" name="impuesto" id="id_impuesto"
                            value="{{ $record->impuesto }}" readonly>
                    </div>
                </div>


                <div class="form-row">

                    <div class="form-group col col-md-2">
                    </div>

                    <div class="form-group col col-md-2 ">
                    </div>

                    <div class="form-group col col-md-8 d-flex justify-content-end">
                        <a class="btn btn-small btn-primary mr-3" href="{{ url('productos') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
