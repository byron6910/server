<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conductor;
use App\Http\Requests\ConductorRequest;
use DB;
use Illuminate\Support\Facades\Redirect;

class ConductorController extends Controller
{
    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
        $conductores=DB::table('conductor as c')
        ->join('bus as b','c.id_bus','=','b.id_bus')
        ->select('c.id_conductor','c.nombre','c.apellido','c.telefono','c.correo','c.direccion','b.id_bus as placa')
        ->where('c.nombre','like','%'.$query.'%')
                
        ->orderBy('id_conductor','desc')
        ->paginate(8);
        return view('conductor.index',['conductores'=>$conductores,'searchText'=>$query]);
        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses=DB::table('bus')->where('condicion','=','1')->get();
        return view('conductor.create',["buses"=>$buses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConductorRequest $request)
    {
        $conductor=new Conductor();
        $conductor->id_conductor=$request->get('id_conductor');
        $conductor->nombre=$request->get('nombre');
        $conductor->apellido=$request->get('apellido');
        $conductor->telefono=$request->get('telefono');        
        $conductor->direccion=$request->get('direccion');
        $conductor->correo=$request->get('correo');
        $conductor->direccion=$request->get('direccion');
        $conductor->id_bus=$request->get('id_bus');
        
        $conductor->save();

        return Redirect::to('conductor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conductor=Conductor::find($id);
        
        $response=['conductor'=>$conductor];
        

        if(!$conductor){
            return response()->json(['mensaje'=>'no se encontro el conductor'],404);
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
        
        $conductor=Conductor::findOrFail($id);
        $buses=DB::table('bus')->where('condicion','=','1')->get();
        return view('conductor.edit',['conductor'=>$conductor,'buses'=>$buses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConductorRequest $request, $id)
    {
        $conductor=Conductor::findOrFail($id);

        $conductor->nombre=$request->get('nombre');
        $conductor->apellido=$request->get('apellido');
        $conductor->telefono=$request->get('telefono');        
        $conductor->direccion=$request->get('direccion');
        $conductor->correo=$request->get('correo');
        $conductor->direccion=$request->get('direccion');
        $conductor->id_bus=$request->get('id_bus');
        
   
        $conductor->update();
        
        return Redirect::to('conductor');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conductor=Conductor::findOrFail($id);
        $conductor->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('conductor');


    }
}
