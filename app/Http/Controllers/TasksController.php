<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        return view('tasks.create',['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post') && $request->file('image')) {

            $file = $request->file('image');
            $upload_folder = 'public/images';
            $image = Storage::putFile($upload_folder, $file);
            $request->validate([
                'taskname'  => 'required|max:255'
            ]);

            $task = Tasks::create(['taskname' => $request->taskname,'image'=>$image]);
            DB::insert('insert into tags_tasks (tags_id, tasks_id) values (?, ?)', [$request->tags, $task->id]);
            DB::insert('insert into users_tasks (users_id, tasks_id) values (?, ?)', [Auth::id(), $task->id]);

        } else {
            echo "Error";
        }
        return response('Задача сохраненина');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::find($id);
        $out_tags = [];
            $tags = Tasks::find($task->id);
            foreach ($tags->tags as $tag){
                $out_tags[$task->id][] = $tag;
            }
        return view('tasks.show',['task'=>$task,'out_tags'=>$out_tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);

        foreach ($task->tags as $tag){
            $out_tags[$task->id][] = $tag;
        }

        $tags = Tags::all();
        return view('tasks.edit',['task'=>$task,'tags'=>$tags,'out_tags'=>$out_tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Tasks::find($id);

        if ($request->isMethod('patch') && $request->file('updateimage')) {

            $file = $request->file('updateimage');
            $upload_folder = 'public/images';
            $image = Storage::putFile($upload_folder, $file);
            $task->image = $image;

            $request->validate([
                'updatetaskname'  => 'required|max:255'
            ]);
            $task->taskname = $request->updatetaskname;
            $task->save();

            DB::insert('insert into tags_tasks (tags_id, tasks_id) values (?, ?)', [$request->updatetags, $task->id]);
            //DB::insert('insert into users_tasks (users_id, tasks_id) values (?, ?)', [Auth::id(), $task->id]);

        } else {
            echo "Error";
        }
        return response('Задача изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $task = Tasks::find($id);
        $task->delete();

        return response('Задача удалена');
    }
}
