<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cooperativa;

class CooperativaBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }

    public function index($id)
    {
        $cooperativa=Cooperativa::find($id);
        $bus=$cooperativa->buses;


        $response=['cooperativaBuses'=>$bus];
        if(!$bus){
            return response()->json(['mensaje'=>'no se encontro el bus'],404);
        }

        return response()->json($response,200);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     function store(Request $request)
    {
        if(!$request->get('capacidad')||!$request->get('nombre')||!$request->get( 'id_cooperativa')){
            
                    return response()->json(['mensaje'=>'Datos incompletos'],202);
                    
                    }
                    $cooperativa=Cooperativa::find($request->get('id_cooperativa'));
                    if(!$cooperativa){
                        return response()->json(['mensaje'=>'Cooperativa no existe'],404);
                    }
                    
                    Bus::create($request->all());
            
                    return response()->json(['datos'=>'Bus insertado'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function edit($id)
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
     function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     function destroy($id)
    {
        //
    }

