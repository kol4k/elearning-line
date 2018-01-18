<?php

namespace App\Http\Controllers\WEB\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Task;
use App\Http\Controllers\API\V1\TaskController as TC;
use App\Http\Controllers\API\V1\CategoryController as Cat;

class TaskController extends Controller
{
    /**
     * Construct API
     */
    public function __construct(TC $task, Cat $category)
    {
        $this->task = $task;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = $this->category;
        $task = $this->task->index();
        return view('v2.administrators.pages.task',['category' => $cat->index(), 'task' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v2.administrators.pages.taskstore', ['task' => $this->task->index(), 'category' => $this->category->index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->task->store($request);
        return redirect()->back()->with('update', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('v2.administrators.pages.taskedit', ['task' => $this->task->index(), 'data' => $this->task->show($id), 'category' => $this->category->index()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->task->update($request, $id);
        return redirect()->back()->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->task->destroy($id);
        return redirect()->back()->with('delete', 'success');
    }
}
