<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function list()
    {
        return view('public.adduser');
    }

    public function add(Request $req)
    {   
        $chk_email = ModelsUser::where('email', '=', $req -> email)->first();
        $client = new ModelsUser();

        $pw = $req -> password;
        $cpw = $req -> password_confirmation;
        $hpw = Hash::make($pw);
        $msg_e = null;
        $msg_p = null;

        if ($chk_email != null){
            $msg_e = "Email existed!";
        }

        if ($pw != $cpw){
            $msg_p = "Password mismatch!";
        }

        if ($msg_p != null OR $msg_e != null){
            return back()->withErrors(['password' => $msg_p, 'email' => $msg_e]);
        }

        $client -> id = "0";
        $client -> name = $req -> name;
        $client -> email = $req -> email;
        $client -> password = $hpw;
        $client -> save();

        return redirect('/user');
    }

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

    function deluser($id){
        $data = ModelsUser::find($id);

        $data->delete();

        return redirect('/user');
    }

    public function self($id){
        $data = ModelsUser::find($id);
        return view('public.profile.show', ['data' => $data]);
    }

    public function updateself(Request $req){
        $data = ModelsUser::find($req->id);
        $chk_email = ModelsUser::where('email', '=', $req -> email)
                            ->wherenotin('id', [$req -> id])
                            ->first();
        $msg_e = null;

        if ($chk_email != null){
            $msg_e = "Email existed!";
        }

        if ($msg_e != null){
            return back()->withErrors(['email' => $msg_e]);
        }

        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone_no = $req->phone_no;
        $data->dept = $req->dept;

        $data->save();

        return redirect('/editself/'.$req->id);
    }

    public function updateselfpw(Request $req){
        $data = ModelsUser::find($req->id);

        $cpw = $req -> cpw;             // Current PW
        $pw_db = $data -> password;     //Current PW from DB
        $pw = $req -> pw;               // New PW
        $cfpw = $req -> cfpw;           // Confirm PW

        $msg_pw = null;         // Error: Wrong PW
        $msg_cfpw = null;       // Error: New PW not same

        if (Hash::check($cpw,$pw_db)){
        }else{
            $msg_pw = "Current password not match!";
        }

        if ($pw != $cfpw){
            $msg_cfpw = "New Password not match!";
        }

        if ($msg_pw != null OR $msg_cfpw != null){
            return back()->withErrors(['cpw' => $msg_pw, 'pw' => $msg_cfpw]);
        }

        $hpw = Hash::make($pw);

        $data->password = $hpw;

        $data->save();

        return redirect('/');
    }
}
