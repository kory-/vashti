<?php

namespace App\Http\Controllers;

use Log;
use App\Http\Controllers\Controller;
use App\Jobs\LogSomethingJob;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function sayHello(Request $req) {
        $person = $req->get('person', 'No one!');
        return "Good morning to $person!";
    }

    public function dispatchJob() {
        Log::info("Hello world, going to dispatch job from the controller!");
        $this->dispatch(new LogSomethingJob);
    }

    public function seeHostname() {
        return gethostname();
    }
}