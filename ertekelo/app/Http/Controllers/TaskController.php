<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('name')->get();
        return view('tasks.index', [ 'tasks' => $tasks]);
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statue  $statue
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return redirect('/', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statue  $statue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $adatok = $request->only(['rating', 'comment']);
        $task->fill($adatok);
        $task->save();
        return redirect('/') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}