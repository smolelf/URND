<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjStages;
use App\Models\ProjStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $lect = User::all();
        return view('public.addproject', ['lect' => $lect, 'ses' => $user]);
    }

    public function add(Request $req)
    {
        $proj = new Project();

        $proj -> id = "0";
        $proj -> proj_name = $req -> proj_name;
        $proj -> leader = $req -> leader;
        $proj -> proj_stage = "1";
        $proj -> proj_status = "1";
        $proj -> save();

        return redirect('/project');
    }

    public function view($id)
    {
        $user = Auth::user();
        $stage = ProjStages::all();
        $stat = ProjStatus::all();
        // $data = Project::find($id);
        $data = DB::table('projects')
        ->leftJoin('users','projects.leader','=','users.id')
        ->leftJoin('proj_stages','projects.proj_stage','=','proj_stages.id')
        ->leftJoin('proj_statuses','projects.proj_status','=','proj_statuses.id')
        ->where('projects.id', '=', $id)
        ->select('projects.*','users.name','proj_stages.id AS stageid', 'proj_statuses.id AS statusid', 'proj_stages.stage_desc', 'proj_statuses.stat_desc')
        ->first();
        return view('public.editproject', ['data' => $data, 'ses' => $user, 'stage' => $stage, 'stat' => $stat]);
    }
}
