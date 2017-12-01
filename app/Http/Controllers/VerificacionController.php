<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Authy\AuthyApi;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;

class VerificacionController extends Controller
{
    protected $authyApi;
    protected $client;

    public function __construct(){
        $this->middleware('auth');
        $this->authyApi=new AuthyApi(env('AUTHY_API_KEY'));
        $this->client=new Client(env('TWILIO_ACCOUNT_SID'),env('TWILIO_AUTH_TOKEN'));
    }
    

    public function requestSms(){
        
        $user=Auth::user();

        if($user->verified){
            return redirect('/home');//ya confirmado el sms
        }

        $authyUser=$this->authyApi->registerUser(
            $user->email,
            $user->phone_number,
            $user->code_number
        );

        if($authyApi->ok()){
            $user->authy_id=$authyUser->id();
            $user->save();

            $this->authyApi->requestSms($user->authy_id);
            return redirect('/register/phone')->with('notification','Te hemos enviado correo de confirmacion SMS');

        }else
        {
            $error=$this->getAuthyErrors($authyUser->errors());
            return redirect('/register/phone')->withErrors(new MessageBag($errors));

        }



    }

    public function get_Confirm_phone(){

        $user=Auth::user();
        if($user->verified){
            return redirect('/home');//ya confirmado el sms
        }
        return view('register.confirm_phone');
    }

        
    public function post_Confirm_phone(Request $request){

        $token=$request->input('token');
        $user=Auth::user();
        $verificacion=$this->authyApi->verifyToken($user->authy_id,$token);
        

    }
        
}
