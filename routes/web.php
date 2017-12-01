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
    return view('auth.login');
});

Route::get('/error', function () {
    return view('Mensajes.permisos');
});

Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_profile');

//verificar correo
Route::get('/register/verify/{code}', 'Auth/RegisterController@verify');

//verificar telefono
Route::get('/register/verify/send', 'VerificacionController@requestSms');
Route::get('/register/verify/', 'VerificacionController@get_Confirm_phone');
Route::post('/register/verify/', 'VerificacionController@post_Confirm_phone');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::group(['middleware'=>'admin'],function(){


    Route::resource('bus', 'BusController');
    Route::resource('conductor', 'ConductorController');
    Route::resource('cooperativa', 'CooperativaController');
    Route::resource('origen_destino', 'OrigenDestinoController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('viaje', 'ViajeController');
    Route::resource('reserva', 'ReservaController');    
    Route::resource('horario','HorariosController');

//});


Route::get('sendermail',function(){
    
        $data=array('name'=>"App Bus");
    
        Mail::send('email.mail',$data,function($message){
    
            $message->from('bralvarezm@gmail.com','Prueba');
            $message->to('bralvarezm@gmail.com')->subject('test email');
            
        });
        return "Tu correo ha sido enviado";
    
    });
    

