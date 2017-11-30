<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViajeRequest;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Viaje;

class ViajeController extends Controller
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
        $viajes=DB::table('viaje as v')
        ->join('cooperativa as coo','coo.id_cooperativa','=','v.id_cooperativa')
        ->join('horarios as h','h.id_horario','=','v.id_horario')
        
        ->select('v.id_viaje','v.estado','coo.nombre as nombre','h.fecha_horario as fecha','h.hora as hora')
        ->where('v.estado','like','%'.$query.'%')
                
        ->orderBy('id_viaje','desc')
        ->paginate(8);
        return view('viaje.index',['viajes'=>$viajes,'searchText'=>$query]);
        
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
        $cooperativas=DB::table('cooperativa')->get();
        $horarios=DB::table('horarios')->get();
        
        return view('viaje.create',['viajes'=>$viajes,'horarios'=>$horarios,'cooperativas'=>$cooperativas]);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViajeRequest $request)
    {
        $viaje=new Viaje();
        $viaje->id_viaje=$request->get('id_viaje');
        $viaje->estado=$request->get('estado');
        $viaje->id_cooperativa=$request->get('id_cooperativa');
        $viaje->id_horario=$request->get('id_horario');        
        
       
        
        $viaje->save();

        return Redirect::to('viaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viaje=Viaje::find($id);
        
        $response=['viaje'=>$viaje];
        

        if(!$viaje){
            return response()->json(['mensaje'=>'no se encontro el viaje'],404);
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
        
        $viaje=Viaje::findOrFail($id);
        $cooperativas=DB::table('cooperativa')->get();
        $horarios=DB::table('horarios')->get();
        
        return view('viaje.edit',['viaje'=>$viaje,'horarios'=>$horarios,'cooperativas'=>$cooperativas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ViajeRequest $request, $id)
    {
        $viaje=Viaje::findOrFail($id);

        $viaje->estado=$request->get('estado');
        $viaje->id_cooperativa=$request->get('id_cooperativa');
        $viaje->id_horario=$request->get('id_horario');       
        
   
        $viaje->update();
        
        return Redirect::to('viaje');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viaje=Viaje::findOrFail($id);
        $viaje->delete();
        //  $bus->condicion='0';
        //  $bus->update();
        return Redirect::to('viaje');


    }
}
