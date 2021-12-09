<?php

namespace App\Http\Controllers;

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
        if(!isset($user)){
            return view('public.index');
        }
        elseif ($user['usertype'] == 0){
            $datap = Project::all();
            return view('public.landing', ['datap' => $datap,'ses' => $user]);
        } else {
            $datau = User::all();
            return view('public.landing', ['datau' => $datau,'ses' => $user]);
        }
    }
}
