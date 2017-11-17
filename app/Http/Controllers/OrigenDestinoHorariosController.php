<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Origen_Destino;
use App\Horarios;

class OrigenDestinoHorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function index($id)
    {
        $origen=Origen_Destino::find($id);
        $horario=$origen->horarios;


        $response=['origen_destino_horario'=>$horario];
        if(!$origen){
            return response()->json(['mensaje'=>'no se encontro el origen y destino'],404);
        }

        return response()->json($response,200);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create($id)
    {
        return "mostrando formulario para crear un horario con origen y destino"."$id";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function store(Request $request,$id)
    {
        
       
        if(!$request->get('fecha_horario')||!$request->get('hora')){
            
                    return response()->json(['mensaje'=>'Datos incompletos'],202);
                    
                    }
                    $origen=Origen_Destino::find($id);
                    if(!$origen){
                        return response()->json(['mensaje'=>'Fabricante no existe'],404);
                    }
                    //ya tengo el id por parametro debo enviarlo al metodo
                    Horarios::create([
                        'fecha_horario'=>$request->get('fecha_horario'),
                        'hora'=>$request->get('hora'),
                        'id_origen_destino'=>$id
                        
                        
                    ]);
            
                    return response()->json(['datos'=>'Horario insertado'],201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function show($idOrigenDestino,$idHorario)
    {
        return "mostrando Todos los  horario"."$idHorario"."con origen y destino"."$idOrigenDestino";
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function edit($idOrigenDestino,$idHorario)
    {
        return "mostrando formulario para editar un horario"."$idHorario"."con origen y destino"."$idOrigenDestino";
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $idOrigenDestino,$idHorario)
    {
        $metodo=$request->method();

        $origen_destino=Origen_Destino::find($idOrigenDestino);
        if(!$origen_destino){
            return response()->json(['mensaje'=>'no encunetraorigen y destino'],404);
            
        }
        $horario=$origen_destino->horarios()->find($idHorario);
        
        if(!$horario){
            return response()->json(['mensaje'=>'no encunetra horario'],404);
            
        }
        
      
        $fecha=$request->get('fecha_horario');
        $hora=$request->get('hora');   
       
        $flag=false;//para ver si editaron los campos

        if($metodo==="PATCH"){
            
            
            if($fecha!=null &&$fecha!=''){
                $horario->fecha_origen=$fecha;
                $flag=true;
        
            }
          
            if($hora!=null &&$hora!=''){
                $horario->hora=$hora;
                $flag=true;
        
            }

            if($flag){
                $horario->save();
                return response()->json(['mensaje'=>'editado horario con id origen'],202);
            }

            return response()->json(['mensaje'=>'no se ha guardado los cambios'],202);
            
           

        }

                 
          if(!$fecha||!$hora){ 
                    return response()->json(['mensaje'=>'error'],404);
        }
        $horario->fecha=$fecha;
        $horario->hora=$hora;
        
        $origen_destino->save();
        

        return response()->json(['mensaje'=>'editado horario con put'],202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($idOrigenDestino,$idHorario)
    {
        $origen_destino=Origen_Destino::find($idOrigenDestino);
        if(!$origen_destino){
            return response()->json(['mensaje'=>'Origen y destino no encotnora'],404);
        }        
        $horario=$origen_destino->horarios()->find($idHorario);
        if(!$horario){
            return response()->json(['mensaje'=>'Horario no asociado a origen destino'],404);
        }  

        $horario->delete();
        return response()->json(['mensaje'=>'eliminado horario'],202);
        
    }

