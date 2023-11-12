<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Taikhoan;

class QLyNhanVienController extends Controller
{
    public function index(){
        $list = DB::table('taikhoan')
        ->Where('LoaiTK','=','Nhân viên')
        ->orWhere('LoaiTK', '=', 'Admin')
        ->orWhere('LoaiTK', '=', 'Admin,Nhân Viên')
        ->paginate(10);
        // dd($list);
        return view('admin.layout.user.nhanvien',compact('list'));
    }
    public function nhapThongTinTaiKhoan()
    {
        return view('admin.layout.user.themnhanvien');
    }
    public function luuThongTinTaiKhoan(Request $request)
    {
        // Lấy thông tin từ request
        $TenTK = $request->input('TenTK');
        $MatKhau = $request->input('MatKhau');
        $DiaChi = $request->input('DiaChi');
        $SDT = $request->input('SDT');
        $LoaiTK = $request->input('LoaiTK');
        $Fullname = $request->input('Fullname');
        $Email = $request->input('Email');
        $Dob = $request->input('Dob');
        $AnhDaiDien = $request->file('img'); // Lấy file ảnh đại diện
        $GioiTinh = $request->input('GioiTinh');
    
        // Lưu thông tin vào cơ sở dữ liệu
        $data = [
            'TenTK' => $TenTK,
            'MatKhau' => $MatKhau,
            'DiaChi' => $DiaChi,
            'SDT' => $SDT,
            'LoaiTK' => $LoaiTK,
            'Fullname' => $Fullname,
            'Email' => $Email,
            'Dob' => $Dob,
            'AnhDaiDien' => $AnhDaiDien,
            'GioiTinh' => $GioiTinh,
        ];
    
        Taikhoan::create($data);
    
        return redirect()->route('nhanvien.index')->with('success', 'Thông tin tài khoản đã được lưu thành công.');
    }
    public function postDeleteNhanVien($id){
        $nhanvien = DB::table('taikhoan')
        ->where('taikhoan.MaTK', $id)
        ->get();
        if($nhanvien->isEmpty()){
            DB::table('taikhoan')->where('MaTK', $id)->delete();
                    return back()->with('msg-suc', 'Xóa thành công !');
        }
        return back()->with('msg-err', 'Không thể xóa nhân viên này !');
      }

}