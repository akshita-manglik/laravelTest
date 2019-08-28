<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;
use Auth;


class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userLogin(Request $request)
    {
    	$this->validate($request, [
	        'email' => 'required',
	        'password' => 'required'
	    ]);

    	$password = $request->input('password'); 
    	$email = $request->input('email'); 

        if (Auth::guard('user')->attempt(array('email' => $email, 'password' => $password))){
             $data = array( 
                            'email' => $email,
                            'id' =>   Auth::guard('user')->user()->id,
                            'user' => Auth::guard('user')->user() ,
                    );
            session($data);
            return redirect('/u/dashboard');
        }
        else {        
            return redirect('/u/login')->with('message', 'Wrong Credentials.');
        }
        die;
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $password = $request->input('password'); 
        $email = $request->input('email'); 

        if (Auth::guard('client')->attempt(array('email' => $email, 'password' => $password))){
            // return "success"; 
            Session::put('email', $email);
            Session::put('id',  Auth::guard('client')->user()->id );
            Session::put('user',  Auth::guard('client')->user() );
            return redirect('/c/dashboard');
        }
        else {        
            return redirect('/c/login')->with('message', 'Wrong Credentials.');
        }
        die;
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
