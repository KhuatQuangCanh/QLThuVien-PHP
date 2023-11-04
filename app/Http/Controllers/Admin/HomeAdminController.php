<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.layout.block.home');
    }

    public function table()
    {
        return view('admin.layout.template-table');
    }
}
