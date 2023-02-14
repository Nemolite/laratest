<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

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
        $tasks =Tasks::all();
        $out_tags = [];
        foreach ($tasks as $task){
            $tags = Tasks::find($task->id);
            foreach ($tags->tags as $tag){
                $out_tags[$task->id][] = $tag;
            }
        }
        return view('home',['tasks'=>$tasks,'out_tags'=>$out_tags]);
    }
}
