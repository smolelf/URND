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
use Illuminate\Support\Facades\DB;

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
        return view('dashboard', ['ses' => $user]);
    }

    public function project(){
        $user = Auth::user();
        $test = Project::all();
        $data = DB::table('projects')
            ->leftJoin('users','projects.leader','=','users.id')
            ->leftJoin('proj_statuses','projects.proj_status','=','proj_statuses.id')
            ->leftJoin('proj_stages','projects.proj_stage','=','proj_stages.id')
            ->select('projects.*','users.name','proj_statuses.stat_desc AS stat','proj_stages.stage_desc AS stage')
            ->get();
        $check = DB::table('projects')
            ->leftJoin('users','projects.leader','=','users.id')
            ->leftJoin('proj_statuses','projects.proj_status','=','proj_statuses.id')
            ->leftJoin('proj_stages','projects.proj_stage','=','proj_stages.id')
            ->where('projects.leader', '=', $user['id'])
            ->select('projects.*','users.name','proj_statuses.stat_desc AS stat','proj_stages.stage_desc AS stage')
            ->get();
        if ($user['usertype'] == 1){
            return view('public.landings.projects', ['data' => $data,'ses' => $user]);
        }else{
            return view('public.landings.projects', ['check' => $check,'ses' => $user]);
        }
    }

    public function user(){
        $user = Auth::user();
        $data = User::all();
        return view('public.landings.users', ['data' => $data,'ses' => $user]);
    }

    public function client(){
        $user = Auth::user();
        $data = Client::where('id', '!=', '1')->orderBy('id')->get();
        return view('public.landings.clients', ['data' => $data,'ses' => $user]);
    }
}
