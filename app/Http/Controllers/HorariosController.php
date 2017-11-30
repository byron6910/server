<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horarios;


use App\Http\Requests\HorarioRequest;
use DB;
use Illuminate\Support\Facades\Redirect;


class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
       $this->middleware('admin1',['only'=>['store','update','destroy']]);
     }
     public function index(Request $request)
     {
         if($request){
         $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
         $horarios=DB::table('horarios as h')
         ->join('origen_destino as od','h.id_origen_destino','=','od.id_origen_destino')
         ->select('h.id_horario','h.fecha_horario','h.hora','od.origen as origen','od.destino as destino','od.precio as precio','od.cantidad as cantidad')
         ->where('h.hora','like','%'.$query.'%')
                 
         ->orderBy('id_horario','desc')
         ->paginate(8);
         return view('horario.index',['horarios'=>$horarios,'searchText'=>$query]);
         
         }
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $origenes=DB::table('origen_destino')->where('cantidad','>','1')->get();
         return view('horario.create',["origenes"=>$origenes]);
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(HorarioRequest $request)
     {
         $horario=new Horarios();
         $horario->id_horario=$request->get('id_horario');
         $horario->fecha_horario=$request->get('fecha_horario');
         $horario->hora=$request->get('hora');
         $horario->id_origen_destino=$request->get('id_origen_destino');        
         
        
         
         $horario->save();
 
         return Redirect::to('horario');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $horario=Horarios::find($id);
         
         $response=['horario'=>$horario];
         
 
         if(!$horario){
             return response()->json(['mensaje'=>'no se encontro el horario'],404);
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
         
         $horario=Horarios::findOrFail($id);
         $origenes=DB::table('origen_destino')->where('cantidad','>','1')->get();
         return view('horario.edit',['horario'=>$horario,'origenes'=>$origenes]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(HorarioRequest $request, $id)
     {
         $horario=Horarios::findOrFail($id);
 
         $horario->fecha_horario=$request->get('fecha_horario');
         $horario->hora=$request->get('hora');
         $horario->id_origen_destino=$request->get('id_origen_destino');  
         
    
         $horario->update();
         
         return Redirect::to('horario');
         
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $horario=Horarios::findOrFail($id);
         $horario->delete();
         //  $bus->condicion='0';
         //  $bus->update();
         return Redirect::to('horario');
 
 
     }
 }
 