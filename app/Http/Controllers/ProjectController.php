<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function list(){
        $user = Auth::user();
        $lect = User::all();
        return view('public.addproject', ['lect' => $lect, 'ses' => $user]);
    }

    public function add(Request $req){
        $proj = new Project();

        $proj -> id = "0";
        $proj -> proj_name = $req -> proj_name;
        $proj -> leader = $req -> leader;
        $proj -> save();

        return redirect('/project');
    }
}
