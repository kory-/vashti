<?php

namespace App\Http\Controllers;

use Log;
use App\Http\Controllers\Controller;
use App\Task;
use App\Jobs\LogSomethingJob;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function tasks() {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function addTask(Request $req) {
        $task = new Task;
        $task->task_content = $req->get('task_content');
        $task->save();

        return redirect()->route('tasks');
    }

    public function markComplete($taskId) {
        $task = Task::find($taskId);
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks');
    }

    public function dispatchJob() {
        $msg = "Hello world, going to dispatch job from the controller!";
        Log::info($msg);
        $this->dispatch(new LogSomethingJob);
        
        return view('welcome');
    }

    public function seeHostname() {
        return gethostname();
    }
}