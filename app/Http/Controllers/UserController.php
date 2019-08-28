<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\user;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('guest:user')->except(['userLogin','create','store']);   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function userLogin()
    {
        return view('auth.user.userlogin');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.user.usersignup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:4',
            'email' => 'required',
            'password' => 'required|between:4,255|confirmed',
        ]);

        $inserts = array();
        $insert = new user();
        $data =  $request->all();
        foreach ($data as $key => $value) {
            if( $key == 'password'){
               $inserts[$key] = Hash::make(request($key));
            }  
            else{
               $inserts[$key] = request($key);
            }          
        }
        $email = $request->input('email'); 
        if (user::create($inserts)) {
            Session::put('email', $email);
            return redirect('/u/dashboard');
        } else {
            return redirect('/u/signup')->with('message', 'You have error while updating company profile.');
        }

        die;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //    return redirect('/client-dashboard')->with('message', 'You have successfully updated company profile.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
