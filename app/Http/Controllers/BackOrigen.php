<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Origen_Destino;
use App\Http\Middleware\onceAuth;

class OrigenDestinoController extends Controller
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
        $origen=Origen_Destino::all();
                
        $response=['horarios'=>$origen];
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
    public function store(Request $request) //otra forma de enviar datos post diferente a usuarios y cooperativa
    {
        if(!$request->get('origen')||!$request->get('destino')||!$request->get('precio')){

        return response()->json(['mensaje'=>'Datos incompletos'],202);
        
        }
        Origen_Destino::create($request->all());

        return response()->json(['datos'=>'Origen Destino Creado'],202);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $origen=Origen_Destino::find($id);
        
        $response=['origen_destino'=>$origen];
        

        if(!$origen){
            return response()->json(['mensaje'=>'no se encontro el origen y destino'],404);
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
        return View('origen_destino/edit',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//=== igualar en metodo y tipo
        $metodo=$request->method();
        $origen_destino=Origen_Destino::find($id);
        $flag=false;//para ver si editaron los campos
        if($metodo==="PATCH"){
            
            $origen=$request->get('origen');
            if($origen!=null &&$origen!=''){
                $origen_destino->origen=$origen;
                $flag=true;
            }

            $destino=$request->get('destino');            
            if($destino!=null &&$destino!=''){
                $origen_destino->destino=$destino;
                $flag=true;
            }

            $precio=$request->get('precio');            
            if($precio!=null &&$precio!=''){
                $origen_destino->precio=$precio;
                $flag=true;
            }

            if($flag){
                $origen_destino->save();
                return response()->json(['mensaje'=>'editado origen y destino'],202);
            }
            return response()->json(['mensaje'=>'no se ha guardado los cambios'],202);

        }

        $origen=$request->get('origen');
        $destino=$request->get('destino');   
        $precio=$request->get('precio');            
          if(!$origen||!$destino||!$precio){ 
                    return response()->json(['mensaje'=>'error'],404);
        }
        $origen_destino->origen=$origen;
        $origen_destino->destino=$destino;
        $origen_destino->precio=$precio;
        $origen_destino->save();
        

        return response()->json(['mensaje'=>'editado con put'],202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $origen_destino=Origen_Destino::find($id);
        if(!$origen_destino){
            return response()->json(['mensaje'=>'Origen y destino no encotnora'],404);
        }    
        $horario=$origen_destino->horarios;
        if(sizeof($horario)>0){
            return response()->json(['mensaje'=>'Origen destino posse horarios y no se puede eliminar, elimina hoarios primer'],404);
            
        }
        $origen_destino->delete();
        return response()->json(['mensaje'=>'Origne DEsstino eliminiado'],404);
        
    }
}
