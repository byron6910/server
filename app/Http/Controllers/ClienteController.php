<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;
use DB;

use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;//subir imagen
//use App\Http\Requests\UsuarioRequest;




class ClienteController extends Controller
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
            $clientes=DB::table('clientes')
            ->where('nombre','like','%'.$query.'%')
            ->orwhere('ci','like','%'.$query.'%')
            //->where ('condicion','=','1')        
            ->orderBy('ci','desc')
            ->paginate(8);
            return view('cliente.index',['clientes'=>$clientes,'searchText'=>$query]);
            
            }
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('cliente.create');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(ClienteRequest $request)
        {
            $cliente=new Cliente();
            $cliente->ci=$request->get('ci');
            $cliente->nombre=$request->get('nombre');
            $cliente->apellido=$request->get('apellido');
            $cliente->telefono=$request->get('telefono');        
            $cliente->ciudad=$request->get('ciudad');
            $cliente->calle=$request->get('calle');
            $cliente->postal=$request->get('postal');            
            $cliente->correo=$request->get('correo');
            $cliente->usuario=$request->get('usuario');
            $cliente->password=$request->get('password');
            //
            
            if(Input::hasFile('foto')){
                $file=Input::file('foto');
                $file->move(public_path().'/imagenes/cliente/fotos',$file->getClientOriginalName());
                $cliente->foto=$file->getClientOriginalName();
            }//subir archivo de foto al servidor
            
            $cliente->save();
    
            return Redirect::to('cliente');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $cliente=Cliente::find($id);
            
            $response=['cliente'=>$cliente];
            
    
            if(!$cliente){
                return response()->json(['mensaje'=>'no se encontro el cliente'],404);
            }
    
            return Redirect::to('cliente.show');
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            return view('cliente.edit',["cliente"=>Cliente::findOrFail($id)]);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(ClienteRequest $request, $id)
        {
            $cliente=Cliente::findOrFail($id);
        
            $cliente->nombre=$request->get('nombre');
            $cliente->apellido=$request->get('apellido');
            $cliente->telefono=$request->get('telefono');        
            $cliente->ciudad=$request->get('ciudad');
            $cliente->calle=$request->get('calle');
            $cliente->postal=$request->get('postal');            
            $cliente->correo=$request->get('correo');
            $cliente->foto=$request->get('foto');            
            $cliente->usuario=$request->get('usuario');
            $cliente->password=$request->get('password');

            if(Input::hasFile('foto')){
                $file=Input::file('foto');
                $file->move(public_path().'/imagenes/clientes/fotos',$file->getClientOriginalName());
                $cliente->foto=$file->getClientOriginalName();
            }//subir archivo de foto al servidor

            
            $cliente->update();
            
            return Redirect::to('cliente');
            
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $cliente=Cliente::findOrFail($id);
            $cliente->delete();
            //  $bus->condicion='0';
            //  $bus->update();
            return Redirect::to('cliente');
    
    
        }
    }
    