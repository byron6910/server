<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
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
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }
    
    public function index()
    {
        $cliente=Cliente::all();
        $response=['clientes'=>$cliente];
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  cliente::create(Request->all());
        // return "Dato guardado";

      
        $cliente=new Cliente;
           
        $cliente->ci=$request->input('ci');
        $cliente->nombre=$request->input('nombre');
        $cliente->apellido=$request->input('apellido');
        $cliente->telefono=$request->input('telefono');
        $cliente->ciudad=$request->input('ciudad');
        $cliente->calle=$request->input('calle');
        $cliente->postal=$request->input('postal');
        $cliente->correo=$request->input('correo');
        $cliente->cliente=$request->input('cliente');
        $cliente->password=$request->input('password');
        
        $cliente->foto=$request->input('foto');
        
        
        
        $cliente->save();

        ///decodificar el json recibido 
        $request->json()->all();

       
        //$mail=getElementById($cliente->correo).value;

        $data=array('ci'=>$cliente->ci,'cliente'=>$cliente->cliente,
        'nombre'=>$cliente->nombre,'apellido'=>$cliente->apellido,
        'password'=>$cliente->password,'mail'=>$cliente->correo);
        // $data=array('cliente'=>$cliente->ci);

            Mail::send('email.user',$data,function($message) use($data){
        
                $message->from('bralvarezm@gmail.com','Prueba');

                $message->to($data['mail'])->subject('Confirma datos');
                
            });



        return response()->json(['clientes'=>$cliente],201);
       
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
        $cliente=Cliente::find($id);
        if(!$cliente){
            return response()->json(['message'=>'Dato no encontrado'],404);
        }

        $cliente->ci=$request->input('ci');
        $cliente->nombre=$request->input('nombre');
        $cliente->apellido=$request->input('apellido');
        $cliente->telefono=$request->input('telefono');
        $cliente->ciudad=$request->input('ciudad');
        $cliente->calle=$request->input('calle');
        $cliente->postal=$request->input('postal');
        $cliente->correo=$request->input('correo');
        $cliente->cliente=$request->input('cliente');
        $cliente->password=$request->input('password');
        $cliente->foto=$request->input('foto');
        $cliente->save();

        return"Actualizado cliente #".$cliente->ci;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return response()->json(['message'=>'Dato Borrado'],200);
    }

   public function signup(Request $request ){

        $this->validate($request,[
        'ci'=>'required|unique:usuarios',
        'nombre'=>'required',
        'apellido'=>'required',
        'telefono'=>'required',
        'ciudad'=>'required',
        'calle'=>'required',
        'postal'=>'required',
        'foto'=>'required',
        'cliente'=>'required',
        'correo'=>'required|unique:usuarios',
        'password'=>'required'
        ]
        
        );

        $user=new Cliente([
            'ci'=>$request->input('ci'),
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'telefono'=>$request->input('telefono'),
            'direccion'=>$request->input('ciudad'),
            'direccion'=>$request->input('calle'),
            'direccion'=>$request->input('postal'),
            'cliente'=>$request->input('cliente'),
            'correo'=>$request->input('correo'),
            'password'=>bcrypt($request->input('password')),
            'foto'=>$request->input('foto'),
            
        ]);

        $user->save();
        return response()->json([
            'message'=>'cliente creado satisfactoriamente'
        ],201);
    }

//error devuelve nada 
    public function signin(Request $request ){
        
                $this->validate($request,[
                'ci'=>'required|unique:usuarios',
                'nombre'=>'required',
                'apellido'=>'required',
                'telefono'=>'required',
                'ciudad'=>'required',
                'calle'=>'required',
                'postal'=>'required',
                'foto'=>'required',
                'cliente'=>'required',
                'correo'=>'required|unique:usuarios',
                'password'=>'required'
                ]
                
                );
                $credientals=$request->only('cliente','password');
        
              try{

                if(!token==JWTAuth::attempt($credientals)){
                    return response()->json([
                        'error'=>'credenciales incorrectas'

                    ],401);
                }
                
              }catch (JWTException $e){

                    return response()->json([
                        'error'=>'No se puede crear el token'
                    ],500);
              }

              return response()->json(['token'=>$token],200);
            }

}
