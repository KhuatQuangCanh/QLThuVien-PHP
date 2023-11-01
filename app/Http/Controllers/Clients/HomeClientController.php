<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
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
    public function profile(Request $request)
    {
        // dd($request->id);
        return view('clients.layout.users.profile');
    }
    public function cart()
    {
        // dd($request->id);
        return view('clients.layout.users.cart');
    }
}
