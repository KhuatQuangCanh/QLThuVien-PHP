<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\LockAccountNotification;
use App\Mail\UnLockAccountNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class NguoidungController extends Controller
{
    public function index(){
        $list = DB::table('taikhoan')
        ->Where('LoaiTK','=','Người dùng')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
        // dd($list);
        return view('admin.layout.user.nguoidung',compact('list'));
    }

    public function LockAccount($idAccount){
        // dd($idAccount);

        DB::table('taikhoan')->where('MaTK','=',$idAccount)->update(['isLockAccount'=>1]);
        $a = DB::table('taikhoan')->where('MaTK','=',$idAccount)->get()->toArray();
        $userEmail = 'xuantientran662@gmail.com'; 
        Mail::to($userEmail)->send(new LockAccountNotification($a[0]->Fullname,$a[0]->TenTK));

        return redirect()->route('admin.nguoidung.index')->with('msg','Đã khóa tài khoản với MaTK ='.$idAccount);

    }
    public function unLockAccount($idAccount){
        // dd($idAccount);

        $newpass=random_int(111111,999999);
        // dd(Hash::make($newpass));

        DB::table('taikhoan')->where('MaTK','=',$idAccount)->update(['isLockAccount'=>0,'MatKhau'=>Hash::make($newpass)]);
        
        $a = DB::table('taikhoan')->where('MaTK','=',$idAccount)->get()->toArray();

        $userEmail = 'xuantientran662@gmail.com';
        Mail::to($userEmail)->send(new UnLockAccountNotification($a[0]->Fullname,$newpass,$a[0]->TenTK));
        return redirect()->route('admin.nguoidung.index')->with('msg','Đã mở khóa tài khoản với MaTK = '.$idAccount);
    }
}
