<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function list()
    {
        return view('public.addclient');
    }

    public function add(Request $req)
    {
        $client = new Client();

        $client -> id = "0";
        $client -> cl_name = $req -> cl_name;
        $client -> cl_email = $req -> cl_email;
        $client -> cl_phone_no = $req -> cl_phone_no;
        $client -> cl_address = $req -> cl_address;
        $client -> save();

        return redirect('/client');
    }
}
