@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="font-italic font-weight-bold m-0"> Productos - Crear</h2>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 mt-4">
                        <form action="{{ url('productos') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="id_nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="id_nombre" placeholder=""
                                        required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_precio">Precio</label>
                                    <input type="number"  step="any" class="form-control" name="precio" id="id_precio" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="id_impuesto">Impuesto % </label>
                                    <input type="number" class="form-control" name="impuesto" id="id_impuesto"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col col-md-4">
                                </div>
                                <div class="form-group col col-md-8 d-flex justify-content-end">

                                    <a href="{{ url('productos') }}" class="btn btn-primary mr-3">Regresar</a>

                                    <button type="submit" class="btn btn-success mr-3">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
