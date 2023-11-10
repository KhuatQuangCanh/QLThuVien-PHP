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
        ->join('theloai','theloai.MaTL','=','sach.MaTL')
        ->orderBy('TenSach','asc')
        ->paginate(10);
        // dd($list);
        return view('admin.layout.books.danhmucsach',compact('list'));
    }
    public function getFormNhapSach(){
        $list_Tl = DB::table('theloai')->get();
        return view('admin.layout.books.formnhapsach',compact('list_Tl'));
    }

}
