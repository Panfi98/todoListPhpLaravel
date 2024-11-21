<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks',function() use($tasks){
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    return view('show',['task'=>\App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

//Route::get('/hello', function(){
//    return 'hello';
//})->name('hello');
//
//Route::get('hallo', function(){
//    return redirect()->route('hello');
//});
//
//Route::get('/greet/{name}', function ($name) {
//    return 'Hello' . ' ' . $name . '!';
//});
//
//Route::fallback(function (){
//    return 'Still got somewhere';
//});

//GET
//POST
//PUT
//DELETE
