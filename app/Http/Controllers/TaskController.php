<?php

namespace App\Http\Controllers;

use App\Task;
use Session;
use Illuminate\Http\Request;


use App\Http\Requests;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
        $tasks = Task::orderBy('id','desc')->paginate(6);
        return view('tasks.index')->with('storedTasks',$tasks);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'newTask'=>'required|min:5|max:255'
        ]);
        $task = new task;
        $task->name = $request->newTask;
        $task->save();
        Session::flash('succsess','New task has been succsessfully added!');

       //  $request->user()->tasks()->create([
       // 'name' => $request->name,
       //  ]);


        return redirect()->route('tasks.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task =Task::find($id);

        return view('tasks.edit')->with('taskUnderEdit',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'updatedTaskName'=>'required|min:5|max:255'
        ]);
        $task = Task::find($id);
        $task->name = $request->updatedTaskName;
        $task->save();
        Session::flash('succsess','Task No.'.$id.' has been succsessfully updatted!');
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        $task->delete();
        Session::flash('succsess','Task No.'.$id.' has been succsessfully deleted!');
        return redirect()->route('tasks.index');
    }
}
