<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    Log::info("Hello World!!");
    return view('welcome');
});

Route::get('/dispatch_job', 'HomeController@dispatchJob');
Route::get('/hostname', 'HomeController@seeHostname');

Route::get('/tasks', ['uses' => 'HomeController@tasks', 'as' => 'tasks']);
Route::post('/tasks/new', ['uses' => 'HomeController@addTask', 'as' => 'add_new_task']);
Route::post('/tasks/{id}/complete', ['uses' => 'HomeController@markComplete', 'as' => 'mark_task_completed']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
