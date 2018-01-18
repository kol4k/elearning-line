<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\CategoryController as Cat;
use App\Http\Controllers\API\V1\TaskController as Task;

class AdministratorController extends Controller
{
    public function __construct(Cat $category, Task $task)
    {
        $this->category = $category;
        $this->task = $task;
    }
    public function dashboard() 
    {
        return view('v1.administrators.pages.exam');
    }

    public function myProfile()
    {
        return view('v2.administrators.pages.myprofile');
    }

    public function usersPage() 
    {
        return view('v2.administrators.pages.user');
    }

    public function taskPage() 
    {
        $cat = $this->category;
        $task = $this->task->index();
        return view('v2.administrators.pages.task',['category' => $cat->index(), 'task' => $task]);
    }

    public function taskNew()
    {
        return view('v2.administrators.pages.taskstore', ['task' => $this->task->index(), 'category' => $this->category->index()]);
    }

    public function taskEdit($id)
    {
        return view('v2.administrators.pages.taskedit', ['task' => $this->task->index(), 'data' => $this->task->show($id), 'category' => $this->category->index()]);
    }

    public function categoryEdit($id)
    {
        return view('v2.administrators.pages.categoryedit',['category' => $this->category->index(), 'data' => $this->category->show($id)]);
    }
}
