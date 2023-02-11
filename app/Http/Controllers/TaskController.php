<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Tags;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Показать главную страницу.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $tasks =Tasks::all();
        $out_tags = [];
        foreach ($tasks as $task){
            $tags = Tasks::find($task->id);
                foreach ($tags->tags as $tag){
                    $out_tags[$task->id][] = $tag;
                }
        }
        return view('index',['tasks'=>$tasks,'out_tags'=>$out_tags]);
    }
}
