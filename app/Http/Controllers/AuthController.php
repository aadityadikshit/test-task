<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;
use App\Http\APIHandlers;
use Session;

class AuthController extends Controller
{
    public function getregistration(){
        $page = "register";
        return view('getRegistration');
    }
    
    public function setregistration(Request $request){
         $validatedData = $request->validate([
            'registerName' => 'required|max:100',
            'registerEmail' => 'required|email',
            'registerAddress1' => 'required|max:50',
            'registerAddress2' => 'required|max:50',
            'registerCity' => 'required',
            'registerCountry' => 'required',
            'password'=>'required|confirmed|min:6',
            'gender'=>'required',
        ]);
        $user= Userdata::firstOrCreate([
            'email'=>$request->registerEmail,
        ], [
            'name'=> $request->registerName,
            'address_1'=>$request->registerAddress1,
            'address_2'=>$request->registerAddress2,
            'city'=>$request->registerCity,
            'country'=>$request->registerCountry,
            'gender'=>$request->gender,
            'status'=>'0',
            'password'=>$request->password
        ]);

        // Seeding the new user data to gorest api
        $url = "https://gorest.co.in/public/v2/users";
        $postData = [
            "name"  => $request->registerName,
            "gender" => $request->gender,
            "email" => $request->registerEmail,
            "status" => "inactive"
        ];
        $response = APIHandlers::seedData_to_api($url, $postData);

        
        if($user->wasRecentlyCreated == true){
            return 1;
        }else{
            return 0;
        }

        
    }

    public function getlogin(){
        $page = "login";
        return view('getlogin');
    }

    public function setlogin(Request $request){
        $login = Userdata::whereRaw('email = "'.$request->loginName.'" and password = "'.$request->loginPassword.'"')->get();
        $login_result = json_decode(json_encode($login), true);
        if(!empty($login_result)){
            Session::put('userdata', ['name' => $login_result[0]['name'], 'userid' => $login_result[0]['id'], 'email' => $login_result[0]['email'], 'status' => $login_result[0]['status']]);
            return redirect()->route('getdashboard');
        }else{
            return view('getLogin', ['message' => 'Login Failed']);
        }
    }

    public function getlogout(){
        Session::forget('userdata');
        return redirect()->route('login');
    }

}
