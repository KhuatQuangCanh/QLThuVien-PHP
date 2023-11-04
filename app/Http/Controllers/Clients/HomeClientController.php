<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{

    // private $account;
    // public function __construct()
    // {
    //     $this->account = new Accounts();
    // }

    //
    public function index()
    {
        return view('clients.layout.home');
    }
    public function about()
    {
        return view('clients.layout.about');
    }
    public function store()
    {
        return view('clients.layout.store');
    }
    public function contact()
    {
        return view('clients.layout.contact');
    }
}