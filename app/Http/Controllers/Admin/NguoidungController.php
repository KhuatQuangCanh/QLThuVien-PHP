<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NguoidungController extends Controller
{
    public function index(){
        $list = DB::table('taikhoan')
        ->Where('LoaiTK','=','Người dùng')
        ->paginate(10);
        // dd($list);
        return view('admin.layout.user.nguoidung',compact('list'));
    }
}
