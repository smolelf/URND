<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function view($id){
        $user = Auth::user();
        $data = ModelsUser::find($id);
        return view('public.edituser', ['data' => $data, 'ses' => $user]);
    }

    public function update(Request $req){
        $data = ModelsUser::find($req->id);

        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone_no = $req->phone_no;
        $data->dept = $req->dept;

        $data->save();

        return redirect('/user');
    }
}
