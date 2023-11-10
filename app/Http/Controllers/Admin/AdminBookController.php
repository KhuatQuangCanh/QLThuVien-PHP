<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookController extends Controller
{
    public function index(){
        $list = DB::table('sach')
        ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
        ->paginate(10);
        // dd($list);
        return view('admin.layout.danhmucsach',compact('list'));
    }

}
