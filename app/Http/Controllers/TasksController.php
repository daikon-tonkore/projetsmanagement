<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            
            $data += $this->counts($user);
        }
        
        return view('tasks.tasklists', $data);
    }
    
    public function create()
    {
        $task = new Task;

        return view('tasks.newtask', [
            'task' => $task,
        ]);
    }
    
    public function store(Request $request)
    {
        
        if (\Auth::check()) {
            $user = \Auth::user();
        }
        
        $task = new Task;
        $task->user_id = $user->id;
        $task->phase = $request->phase;
        $task->company_name = $request->company_name;
        $task->area = $request->area;
        $task->received_date = $request->received_date;
        $task->due_date = $request->due_date;
        $task->category = $request->category;
        $task->status = $request->status;
        $task->status_person_in_charge = $request->status_person_in_charge;
        $task->status_date = $request->status_date;
        $task->next = $request->next;
        $task->next_person_in_charge = $request->next_person_in_charge;
        $task->next_date = $request->next_date;
        
        $task->save();

        return redirect('/');
    }
    
}
