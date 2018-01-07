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

    public function usersPage() 
    {
        return view('v1.administrators.pages.users');
    }

    public function examPage() 
    {
        $cat = $this->category;
        $task = $this->task->index();
        return view('v2.administrators.pages.exam',['category' => $cat->index(), 'task' => $task]);
    }
}
