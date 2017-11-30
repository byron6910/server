<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservaRequest;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
         $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
      }

    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
        $reservas=DB::table('reserva as r')
        ->join('clientes as c','c.ci','=','r.ci')
        ->join('viaje as v','v.id_viaje','=','r.id_viaje')
        ->join('users as u','u.id','=','r.id')
        
        ->select('r.id_reserva','r.fecha_reserva','r.estado','r.cantidad','r.asiento',DB::raw('CONCAT(c.nombre," ",c.apellido) as Nombre') ,'c.telefono as telefono','v.id_viaje as id_viaje','u.name as id')
        ->where('r.estado','like','%'.$query.'%')
         
        ->orderBy('id_reserva','desc')
        ->paginate(8);
        return view('reserva.index',['reservas'=>$reservas,'searchText'=>$query]);
        
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viajes=DB::table('viaje')->where('estado','=','1')->get();
        $reservas=DB::table('reserva')->where('estado','=','1')->get();
        $clientes=DB::table('clientes')->get();
        $users=DB::table('users')->get();
        return view('reserva.create',['viajes'=>$viajes,'reservas'=>$reservas,'clientes'=>$clientes,'users'=>$users]);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaRequest $request)
    {
        $reserva=new Reserva();
        $reserva->id_reserva=$request->get('id_reserva');
        $reserva->fecha_reserva=$request->get('fecha_reserva');        
        $reserva->estado=$request->get('estado');
        $reserva->cantidad=$request->get('cantidad');
        $reserva->asiento=$request->get('asiento');
        
        $reserva->ci=$request->get('ci');
        $reserva->id_viaje=$request->get('id_viaje');        
        $reserva->id=auth()->user()->id;
       
        
        $reserva->save();

        return Redirect::to('reserva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva=reserva::find($id);
        
        $response=['reserva'=>$reserva];
        

        if(!$reserva){
            return response()->json(['mensaje'=>'no se encontro el reserva'],404);
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
        
        $reserva=Reserva::findOrFail($id);
        $clientes=DB::table('clientes')->get();
        $viajes=DB::table('viaje')->get();
        $users=DB::table('users')->get();
        
        return view('reserva.edit',['reserva'=>$reserva,'clientes'=>$clientes,'viajes'=>$viajes,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservaRequest $request, $id)
    {
        $reserva=reserva::findOrFail($id);
        $reserva->fecha_reserva=$request->get('fecha_reserva');        
        $reserva->estado=$request->get('estado');
        $reserva->cantidad=$request->get('cantidad');
        $reserva->asiento=$request->get('asiento');
        
        $reserva->ci=$request->get('ci');
        $reserva->id_viaje=$request->get('id_viaje');             
        $reserva->id=auth()->user()->id;
   
        $reserva->update();
        
        return Redirect::to('reserva');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::findOrFail($id);
        $reserva->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('reserva');


    }
}
