<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    // public function __construct(CategoryController $category)
    // {
    //     $this->category = $category;
    // }
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
        $cat = new \App\Http\Controllers\API\V1\CategoryController;
        return view('v2.administrators.pages.exam',['category' => $cat->index()]);
    }
}
