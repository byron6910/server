<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//utilizo web para obtener errores
Route::get('/', function () {
    return view('welcome');
});


Route::resource('bus', 'BusController');
Route::resource('conductor', 'ConductorController');
Route::resource('cooperativa', 'CooperativaController');




Route::resource('reserva', 'ReservaController');
Route::resource('cliente', 'ClienteController');
Route::resource('viaje', 'ViajeController');

Route::resource('origen_destino', 'OrigenDestinoController');
//Route::resource('origen_destino.horarios', 'OrigenDestinoHorariosController', ['except'=>['show']]);

//Route::resource('origen_destino.horarios', 'OrigenDestinoHorariosController');
//Route::resource('cooperativa.bus', 'CooperativaBusController');




Route::resource('horario','HorariosController');


//para el login

 Route::post('/usuarios/signin',['uses'=>'UsuarioController@signin']);
// Route::get('/usuarios',['uses'=>'UsuarioController@index']);


Route::post('/cooperativa/form',['uses'=>'CooperativaController@form']);
//Route::match(['get','post'],'cooperativa/form','CooperativaController@form');
//Route::get('cooperativa/form','CooperativaController@create');


Route::get('sendermail',function(){

    $data=array('name'=>"App Bus");

    Mail::send('email.mail',$data,function($message){

        $message->from('bralvarezm@gmail.com','Prueba');
        $message->to('bralvarezm@gmail.com')->subject('test email');
        
    });
    return "Tu correo ha sido enviado";

});

