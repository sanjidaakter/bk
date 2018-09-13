<?php

namespace App\Http\Controllers;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Respositories\TaskRepository;
use App\Policies\TaskPolicy;
class TaskController extends Controller
{
    //
    protected $tasks;
    public function __construct(TaskRepository $tasks)
    {
    	$this->middleware('auth');
    	$this->tasks = $tasks;
    }


    public function index(Request $request)
	{
		$task = $request->user()->tasks()->get();
		return response()->json($task);
	}

    

    public function store(Request $request)
	{
    	$this->validate($request, [
        'name' => 'required|max:255',
    	]);

    	$request->user()->tasks()->create([
        'name' => $request->name,
    ]);

    return redirect('/');

    
}

    public function destroy($id)

   {
     $task = Task::findOrFail($id);
     $task->delete();	
     return redirect('/');



  }


}
