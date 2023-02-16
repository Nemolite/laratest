<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user_tasks_id = DB::table('users_tasks')->where('users_id', '=', Auth::id())->get();

        $tasks_id = [];
        foreach ($user_tasks_id as $user_task){
            $tasks_id[] = $user_task->tasks_id;
        }

        $tasks = Tasks::whereIn('id', $tasks_id)->get();

        $tasks_all =Tasks::all();
        $out_tags = [];
        foreach ($tasks_all as $task){
            $tags = Tasks::find($task->id);
            foreach ($tags->tags as $tag){
                $out_tags[$task->id][] = $tag;
            }
        }

        return view('home',['tasks'=>$tasks,'out_tags'=>$out_tags]);
    }
}
