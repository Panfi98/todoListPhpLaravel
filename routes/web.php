<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('tasks.index');
});


Route::get('/tasks',function() {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->paginate(10)
    ]);
})->name('tasks.index');


Route::view('tasks/create', 'create')
    ->name('tasks.create');


Route::get('/tasks/{task}/edit', function (\App\Models\Task $task) {
    return view('edit',[
        'task'=>$task
    ]);
})->name('tasks.edit');


Route::get('/tasks/{task}', function (\App\Models\Task $task) {
    return view('show',[
        'task'=>$task
    ]);
})->name('tasks.show');


Route::post('/tasks', function (\App\Http\Requests\TaskRequest $request) {
    $task = \App\Models\Task::create($request->validated());

    return redirect()->route('tasks.show',['task' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.store');


Route::put('/tasks/{task}', function (\App\Models\Task $task, \App\Http\Requests\TaskRequest $request) {
    $data = $request -> validated();

    $task->update($request->validated());

    return redirect()->route('tasks.show',['task' => $task->id])
        ->with('success','Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(\App\Models\Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success','Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function(\App\Models\Task $task){
    $task->toggleComplete();

    return redirect() -> back()->with('success','Task updated successfully');
})->name('tasks.toggle.complete');



