<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Ensure you have a view file at resources/views/admin/index.blade.php
    }
}
