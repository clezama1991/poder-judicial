<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compras;
use App\Models\Productos;
use DB;
use Auth;

class ComprasController extends Controller
{ 
      
    public function index()
    {
        $records = Productos::get();

        return View('compras.index', compact('records'));

    }
 
    
    public function guardar_compra(Request $request)
    {

        try {

            DB::beginTransaction();

                $newRecord = new Compras;
                $newRecord->user_id = Auth::user()->id;
                $newRecord->producto_id = $request->producto_id;
                $newRecord->factura = 0;
                $newRecord->save();

            DB::commit();
        }
        catch (\Throwable $e) {    

            DB::rollback();   

            return redirect()->back()->with('flag', 'Ha ocurrido un error durante la ejecución del proceso. '.$e->getMessage());
        }

        $request->session()->flash('alert-success', 'Tu Compra se ha realizado correctamente!!!');
       
        return redirect()->to('compras');

    }
    
}