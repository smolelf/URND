<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('public.index');
    }

    public function landing(){
        $user = Auth::user();
        // if ($user['usertype'] == 0){
        //     $datap = Project::all();
        //     return view('public.landing', ['datap' => $datap,'ses' => $user]);
        // } else {
        //     $datau = User::all();
        //     return view('public.landing', ['datau' => $datau,'ses' => $user]);
        // }
        return view('public.landing', ['ses' => $user]);
    }

    public function home(){
        $user = Auth::user();
        //$data = Project::all();
        return view('dashboard', ['ses' => $user]);
    }

    public function project(){
        $user = Auth::user();
        $data = Project::all();
        return view('public.landings.projects', ['data' => $data,'ses' => $user]);
    }

    public function user(){
        $user = Auth::user();
        $data = User::all();
        return view('public.landings.users', ['data' => $data,'ses' => $user]);
    }

    public function client(){
        $user = Auth::user();
        $data = Client::all();
        return view('public.landings.clients', ['data' => $data,'ses' => $user]);
    }
}
