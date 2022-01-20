<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Productos;
use DB;

class ProductosController extends Controller
{ 
      
    public function index()
    {
        $records = Productos::get();

        return View('productos.index', compact('records'));

    }

    public function create()
    {

        $modulos = Productos::get();

        return View('productos.create', compact('modulos'));

    }   
    
    public function store(Request $request)
    {

        try {

            DB::beginTransaction();

                $new_record = Productos::create($request->all());

            DB::commit();
        }
        catch (\Throwable $e) {    

            DB::rollback();   

            return redirect()->back()->with('flag', 'Ha ocurrido un error durante la ejecución del proceso. '.$e->getMessage());
        }

        $request->session()->flash('alert-success', 'Los datos se han agregado correctamente!!!');
       
        return redirect()->to('productos');

    }
    
    public function show ($id)
    {
        $record = Productos::where('id', $id)->first();
  
        return View('productos.show', compact('record'));

    }

    public function edit($id)
    {
        $record = Productos::where('id', $id)->first();
  
        return View('productos.edit', compact('record'));

    }

    public function update(Request $request, $id)
    { 
      
        try {

            DB::beginTransaction(); 
            
                $record = Productos::find($id)->update($request->all());

            DB::commit();
        }
        catch (\Throwable $e) {
            
            DB::rollback();
            
            return redirect()->back()->with('flag', 'Ha ocurrido un error durante la ejecución del proceso. '.$e->getMessage());
        }

        $request->session()->flash('alert-success', 'Los datos se han actualizado correctamente!!!');
        return redirect()->to('productos');

    } 
      
    public function destroy(Request $request, $id)
    {
        
        try {

            DB::beginTransaction(); 
                
                $record = Productos::find($id)->delete();
            
            DB::commit();
        }
        catch (\Throwable $e) {
            
            DB::rollback();
            
            return redirect()->back()->with('flag', 'Ha ocurrido un error durante la ejecución del proceso. '.$e->getMessage());
        }

        $request->session()->flash('alert-success', 'El registro se ha eliminado correctamente!!!');
        return redirect()->to('productos');
    }


}