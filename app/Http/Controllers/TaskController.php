<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
  $tasks = Task::where('user_id', Auth::id())-> orderBy('created_at','desc')->paginate(5);
        return view('tasks', compact('tasks'));

    }




    public function store(Request $request){

        $validated = $request->validate([
    'name' =>'required|max:10',]);

     $task = new Task;
     $task->name = $request->name;
     $task->user_id = Auth::id();
     $task->save();
     return redirect()->back();




    }





    public function edit( $id ){

         $task= Task::all();
         $task= Task::find($id);
        return view('edit', compact('task'));

    }





 public function update(Request $request, $id)
    {

        $task = Task::find($id);
        $task->name = $request->name;
        $task->save();
        return redirect('/');



    }


    public function delete($id){



        $task= Task::find($id)->delete();
        return redirect()->back();
    }

}
