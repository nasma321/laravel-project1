<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use GuzzleHttp\Client;

class MainController extends Controller
{
    function index()
    {
     return view('login');
    }

    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('main/successlogin');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }

    function successlogin()
    {
        return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('login');
    }

    public function userLoginProjectTwo(Request $request){

        $client = new Client();
        $res = $client->request('POST', 'http://localhost:8001/api/forceLogin', [
            'form_params' => [
                'email' => Auth::user()->email
            ]
        ]);

        if($res->getStatusCode() == 200){
            return redirect('http://localhost:8001/dashboard');
        }
    }
}
