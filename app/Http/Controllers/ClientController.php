<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    // Get All Clients
    public function index(Request $request)
    {
        $clients = Client::all();
        return response()->json([
            "message" => $clients
        ], 200);

    }

    // Create Client Page
    public function create()
    {

    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required|string'
        ]);
    }

    // Added New Client
    public function register(Request $request)
    {
        $v = $this->validator($request->all());
        if ($v->fails()) {
            return response()->json([
                "message" => $v->errors()
            ], 400);
        }

        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->phone_number = $request->input('phone_number');
        $client->address = $request->input('address');
        $client->save();

        return response()->json([
            "message" => "record created successfully"
        ], 200);
    }

    protected function validateLogin(Request $request)
    {
       $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function login(Request $request)
    {
        $client = Client::where(['email' => $request->input('email')])->first();
        if(!$client) {
            return response()->json([
                "message" => "wrong email"
            ], 400);
        }
        if(Hash::check($request->input('password'), $client->password)) {
            return response()->json([
                "Client Name" => $client->name
            ], 400);
        }
        else{
            return response()->json([
                "message" => "wrong password"
            ], 400);
        }
    }

    // View One Client
    public function show($id)
    {

    }

    // Edit Client Page
    public function edit($id)
    {

    }

    // Update Client
    public function update(Request $request, $id)
    {

    }

    // Delete Client
    public function destroy($id)
    {

    }
}
