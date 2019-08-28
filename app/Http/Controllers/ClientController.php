<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Models\client;
use Illuminate\Support\Facades\Hash;
use Session;

class ClientController extends Controller
{
    public function __construct()
    {
         $this->middleware('guest:client')->except(['clientLogin','create','store']);    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function clientLogin()
    {
        return view('auth.client.clientlogin');
    }

    public function create()
    {
        return view('auth.client.clientsignup');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:4',
            'email' => 'required',
            'password' => 'required|between:4,255|confirmed',
        ]);

        $inserts = array();
         //
        $insert = new client();
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

        if (client::create($inserts)) {
            Session::put('email', $email);
            return redirect('/c/dashboard');
        } else {
            
            return redirect('/c/signup')->with('message', 'You have error while updating company profile.');
        }

        die;
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $id = base64_decode($id);
        $client = client::findOrFail($id);
        $data = array('client' => $client, );
        return view('client.edit', $data );
    }

    public function update(Request $request, $id)
    {
        $id = base64_decode($id); 
        $client = client::findOrFail($id);
        $this->validate($request, [
            'name'  => 'required|min:4',
            'email' => 'required',
        ]);

        $input = $request->all();

        $client->fill($input)->save();
        return redirect('/c/dashboard')->with('message', 'You have successfully updated company profile.');
    }

    public function destroy($id)
    {
        //
    }
}
