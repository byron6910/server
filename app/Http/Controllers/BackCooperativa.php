<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use App\Cooperativa;
use App\Http\Requests\CooperativaFormRequest;


class CooperativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperativa=Cooperativa::all();
                
        $response=['cooperativa'=>$cooperativa];
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod("post")){
            $nombre = $request->get("nombre");
            $direccion = $request->get("direccion");
            $telefono = $request->get("telefono");
            $correo = $request->get("correo");
            
            $estado = $request->get("estado");//imput en vez de query probe
        }
        else
        {
            $nombre = "";
            $direccion = "";
            $telefono = "";
            $estado = "";            
            $correo = "";            
        }
       // return View('cooperativa.form',['nombre'=>$nombre,
        //'direccion'=>$direccion,'telefono'=>$telefono,'correo'=>$correo,
        //'estado'=>$estado]);

        return view('cooperativa.form')->with(['nombre'=>$nombre,
        'direccion'=>$direccion,'telefono'=>$telefono,'correo'=>$correo,
        'estado'=>$estado]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cooperativa=new Cooperativa;
        $cooperativa->id_cooperativa=$request->input('id_cooperativa');
        $cooperativa->nombre=$request->input('nombre');
  
        $cooperativa->telefono=$request->input('telefono');
        $cooperativa->direccion=$request->input('direccion');
        $cooperativa->correo=$request->input('correo');
        $cooperativa->estado=$request->input('estado');
        
  
        
        
        $cooperativa->save();

       // return response()->json(['cooperativa'=>$cooperativa],201);
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cooperativa=Cooperativa::find($id);
        
        $response=['cooperativa'=>$cooperativa];
        

        if(!$cooperativa){
            return response()->json(['mensaje'=>'no se encontro cooperativa'],404);
        }

        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cooperativa=Cooperativa::find($id);
        $cooperativa->delete();
        return response()->json(['message'=>'Dato Borrado'],200);
    }
    public function form(Request $request){

        if($request->isMethod("post")){
            $nombre = $request->input("nombre");
            $direccion = $request->input("direccion");
            $telefono = $request->input("telefono");
            $correo = $request->input("correo");
            
            $estado = $request->input("estado");
        }
        else
        {
            $nombre = "";
            $direccion = "";
            $telefono = "";
            $estado = "";            
            $correo = "";            
        }
        return View('cooperativa.form',['nombre'=>$nombre,
        'direccion'=>$direccion,'telefono'=>$telefono,'correo'=>$correo,
        'estado'=>$estado]);
    }
}
