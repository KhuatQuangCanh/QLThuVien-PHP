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
        // ->Where('LoaiTK','=','Nhân viên')
        // ->orWhere('LoaiTK', '=', 'Admin')
        // ->orWhere('LoaiTK', '=', 'Admin,Nhân Viên')
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
    
        return redirect()->route('admin.nhanvien.index')->with('success', 'Thông tin tài khoản đã được lưu thành công.');
    }
    // public function postDeleteNhanVien($id){
    //     $nhanvien = DB::table('taikhoan')
    //     ->where('taikhoan.MaTK', $id)
    //     ->get();
    //     if($nhanvien->isEmpty()){
    //         DB::table('taikhoan')->where('MaTK', $id)->delete();
    //                 return back()->with('msg-suc', 'Xóa thành công !');
    //     }
    //     return back()->with('msg-err', 'Không thể xóa nhân viên này !');
    //   }

      public function postDeleteNhanVien($id)
      {
          // Xác nhận xóa tài khoản nhân viên
          $confirmed = request()->has('confirm');
  
          if ($confirmed) {
              // Xóa tài khoản nhân viên dựa trên ID
              DB::table('nhanvien')->where('MaTK', $id)->delete();
  
              return redirect()->route('admin.nhanvien.index')->with('success', 'Tài khoản nhân viên đã được xóa thành công.');
          }
  
          return redirect()->route('admin.nhanvien.index')->with('error', 'Xóa tài khoản nhân viên đã bị hủy.');
      }

      

      public function postXoaNhanVien($id)
      {
          DB::table('taikhoan')->where('MaTK', $id)->delete();
      
          return redirect()->route('admin.nhanvien.index')->with('success', 'Nhân viên đã được xóa thành công');
      }




      public function editNhanVien($id)
        {
            $info = DB::table('taikhoan')
                ->where('MaTK', $id)
                ->first();

            return view('admin.layout.user.editTK', compact('info'));
        }

        public function updateNhanVien(Request $request, $id)
        {
            $validatedData = $request->validate([
                'ten' => 'required',
                'email' => 'required|email',
                'TenTK' => 'required',
                'MatKhau' => 'required',
                'SDT' => 'required',
                'GioiTinh' => 'required',
                'LoaiTK' => 'required',
                'Dob' => 'required',
                'DiaChi' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = DB::table('taikhoan')->where('MaTK', $id);

            $user->update([
                'TenTK' => $request->input('TenTK'),
                'MatKhau' => $request->input('MatKhau'),
                'DiaChi' => $request->input('DiaChi'),
                'SDT' => $request->input('SDT'),
                'LoaiTK' => $request->input('LoaiTK'),
                'Fullname' => $request->input('ten'),
                'Email' => $request->input('email'),
                'Dob' => $request->input('Dob'),
                'GioiTinh' => $request->input('GioiTinh'),
            ]);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);

                $user->update(['AnhDaiDien' => $imageName]);
            }

            return redirect()->route('admin.nhanvien.index')->with('success', 'Thông tin tài khoản đã được cập nhật thành công');
        }

    

}