<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conductor;
use App\Http\Requests\ConductorRequest;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

//use Intervention\Image\ImageManagerStatic as Image;
use Image;
class ConductorController extends Controller
{

    public function __construct(){
       $this->middleware('admin1',['only'=>['index','store','update','destroy']]);
     }
     
    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
        $conductores=DB::table('conductor as c')
        ->join('bus as b','c.id_bus','=','b.id_bus')
        ->select('c.id_conductor','c.nombre','c.apellido','c.telefono','c.correo','c.direccion','c.foto','b.id_bus as placa')
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
        $conductor->foto=$request->get('foto');
        
        // if($request->hasFile('foto')){
        // $extension=$request->file('foto')->getClientOriginalExtension();
        
        // $file_name=$conductor->id_conductor.'.'.$extension;
        
        // Image::make($request->file('foto'))
        // ->resize(300,200)
        // ->save('/imagenes/conductores/fotos');
        // $conductor->foto=$extension;
        // }
        
        $conductor->id_bus=$request->get('id_bus');
        
        if($request->hasFile('foto')){
            
            $foto=$request->file('foto');
            $extension=time().'.'.$foto->getClientOriginalExtension();
            Image::make($foto)->resize(200,200)->save(public_path('imagenes/conductores/fotos/'.$extension));
         
            $conductor->foto=$extension;
            $conductor->save();
        }
        
      /*  if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/conductores/fotos',$file->getClientOriginalName());
            $conductor->foto=$file->getClientOriginalName();
        }*/


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
        $conductor->foto=$request->get('foto');        
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
