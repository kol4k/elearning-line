<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function dashboard() 
    {
        return view('v1.administrators.pages.dashboard');
    }

    public function usersPage() 
    {
        return view('v1.administrators.pages.users');
    }

    public function examPage() 
    {
        return view('v1.administrators.pages.exam');
    }
}
