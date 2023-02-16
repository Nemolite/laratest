<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Tags;
use Illuminate\Http\Request;

class FrontController extends Controller
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

        //$tasks = Tasks::whereIn('id', $tasks_id)->get();

        $tags = Tags::all();
        return view('index',['tasks'=>$tasks,'out_tags'=>$out_tags,'tags'=>$tags]);
    }

    public function search(Request $request){

        $value = $request->search;
        $search = Tasks::where('taskname', 'LIKE', '%'.$value.'%')->get();
        return view('search',['search'=>$search]);
    }

    public function seltags($id){
        // Создать запрос извлечение постов, которые относятся к данному тегу
    }
}
