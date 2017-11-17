<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Http\Requests\BusRequest;
use DB;
use Illuminate\Support\Facades\Redirect;


class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
        $buses=DB::table('bus')->where('nombre','like','%'.$query.'%')
        //->where ('condicion','=','1')        
        ->orderBy('id_bus','desc')
        ->paginate(8);
        return view('bus.index',['buses'=>$buses,'searchText'=>$query]);
        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
        $bus=new Bus();
        $bus->id_bus=$request->get('id_bus');
        $bus->nombre=$request->get('nombre');
        $bus->capacidad=$request->get('capacidad');
        $bus->condicion=$request->get('condicion');        
        $bus->id_cooperativa=$request->get('id_cooperativa');
        
        $bus->save();

        return Redirect::to('bus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus=Bus::find($id);
        
        $response=['bus'=>$bus];
        

        if(!$bus){
            return response()->json(['mensaje'=>'no se encontro el bus'],404);
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
        return view('bus.edit',["bus"=>Bus::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, $id)
    {
        $bus=Bus::findOrFail($id);
        $bus->nombre=$request->get('nombre');
        $bus->capacidad=$request->get('capacidad');
        $bus->condicion=$request->get('condicion');                
        $bus->id_cooperativa=$request->get('id_cooperativa');
        $bus->update();
        
        return Redirect::to('bus');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus=Bus::findOrFail($id);
        $bus->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('bus');


    }
}
