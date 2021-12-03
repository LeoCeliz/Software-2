<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;

class EmpresaController extends Controller
{
    public function inicio(){
        return view('empresa');
    }
    public function mostrarempresa(Request $request){
        if($request){
            $dato=trim($request->buscar);
            $empresas=Empresa::select('id','razonsocial','nit','telefono')
            ->where('razonsocial','LIKE','%'.$dato.'%')->get();
            
        }
        else{
            $empresas=Empresa::get();
           
        }
       
        return view('empresa',["data"=>$empresas]);
        //return $empresas;
    }

    public function guardarempresa(Request $data){
        $validated=$data->validate([
            'razonsocial'=>'required',
            'nit'=>'required',
            'telefono'=>'required'
        ]);
        $empresa=new Empresa();
        $empresa->razonsocial = $data->razonsocial;
        $empresa->nit = $data->nit;
        $empresa->telefono = $data->telefono;
        $empresa->save();

        return Redirect('/empresa');
    }
    public function updateempresa(Request $data, $id){
        $validated=$data->validate([
            'razonsocial'=>'required',
            'nit'=>'required',
            'telefono'=>'required'
        ]);
        $empresa= Empresa::findOrFail($id);
        $empresa->razonsocial = $data->razonsocial;
        $empresa->nit = $data->nit;
        $empresa->telefono = $data->telefono;
        $empresa->update();

        return Redirect('/empresa');
    }
    public function eliminar(Request $data){
        $empresa= Empresa::findOrFail($data->id);
        $empresa->delete();
        return Redirect('/empresa');
    }
    
}
