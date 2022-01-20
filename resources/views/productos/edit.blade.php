@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('productos.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 


                        <div class="row mb-3">
                            <div class="col-12 blue_header rounded py-3">
                                <h2 class="font-italic font-weight-bold m-0"> Tipos de Recurso - Editar</h2>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="id_nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="id_nombre"
                                    value="{{ $record->nombre }}" required="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_precio">Precio</label>
                                <input type="number" step="any" class="form-control" name="precio" id="id_precio"
                                    value="{{ $record->precio }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="id_impuesto">Impuesto % </label>
                                <input type="number" class="form-control" name="impuesto" id="id_impuesto"
                                    value="{{ $record->impuesto }}">
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-12 d-flex justify-content-end">

                                <a class="btn btn-info mr-3" href="{{ url('productos') }}">Regresar</a>
                                <button type="submit" class="btn btn-success ">Actualizar</button>

                            </div>
                        </div> 
                </form>
            </div>
        </div>
    </div>
@endsection
