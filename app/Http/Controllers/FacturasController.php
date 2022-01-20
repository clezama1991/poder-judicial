<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturas;
use App\Models\Compras;
use DB;

class FacturasController extends Controller
{ 
      
    public function index()
    {
        $records = Facturas::get();
        $Compras = Compras::where('factura',false)->get();
        $pendientes = $Compras->count();
        return View('facturas.index', compact('records','pendientes'));

    }
    
    public function generar_facturas_pendientes(Request $request)
    { 
        $Compras = Compras::where('factura',false)->get();
        
        foreach ($Compras as $key => $value) {

            $precio = ($value->producto)?$value->producto->precio:0;
            $impuesto = ($value->producto)?$value->producto->impuesto:0;
            $IVA=($precio*$impuesto)/100;

            $newRecord = new Facturas;
            $newRecord->compra_id = $value->id;
            $newRecord->total_compra = $precio;
            $newRecord->total_impuesto = $IVA;
            $newRecord->total_pagar = $precio + $IVA;
            $newRecord->save();
 
            $value->factura = true;
            $value->save();
        }
 
        return redirect()->to('facturas');

    }

    public function create()
    {

        $modulos = Facturas::get();

        return View('facturas.create', compact('modulos'));

    }   
    
    
    public function show ($id)
    {
        $record = Facturas::where('id', $id)->first();
  
        return View('facturas.show', compact('record'));

    }

      
    public function destroy(Request $request, $id)
    {
        
        try {

            DB::beginTransaction(); 
                
                $record = Facturas::find($id)->delete();
            
            DB::commit();
        }
        catch (\Throwable $e) {
            
            DB::rollback();
            
            return redirect()->back()->with('flag', 'Ha ocurrido un error durante la ejecución del proceso. '.$e->getMessage());
        }

        $request->session()->flash('alert-success', 'El registro se ha eliminado correctamente!!!');
        return redirect()->to('facturas');
    }


}