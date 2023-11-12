<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
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
    public function getThemNhanVien()
    {
        $list_Tl = DB::table('theloai')->get();
        return view('admin.layout.user.themnhanvien', compact('list_Tl'));
    }
    public function postThemNhanVien(Request $request)
    {

        $request->validate([
            'MaTK' => 'required',
            'TenTk'  => 'required',
            'FullName'  => 'required',
            'MatKhau'  => 'required|min:0',
            'DiaChi'  => 'required',
            'Email'  => 'required',
            
        ], [
            'MaTK.required' => 'Bạn không thể để trống mã tài khoản!',
            'TenTK.required' => 'Bạn hãy nhập tên tài khoản!',
            'FullName.required' => 'Bạn hãy nhập FullName đi!!!',
            'MatKhau.required' => 'Bạn chưa nhập mật khẩu!!!',
            'Email.required' => 'Bạn chưa nhập email!!!',
        ]);
        // dd($request->hasFile('AnhSach'));
        // dd($request);
        if ($request->hasFile('AnhDaiDien')) {

            $file = $request->file('AnhĐaiien');
            $fileName = $file->hashName();
            $file->store('user', 'public');
        }
        $postdata = $request->all();
        if (isset($postdata['SoLuong']) == false) {
            $data = [
                'MaTK' => $postdata['MaTK'],
                'TenTK'  => $postdata['TenTK'],
                'FullName'  => $postdata['FullName'],
                'MatKhau'  => $postdata['MatKhau'],
                'DiaChi'  => $postdata['DiaChi'],
                'SDT'  => $postdata['SDT'],
                'LoaiTK'  => $postdata['LoaiTK'],
                'Dob'  => $postdata['Dob'],
                'GioiTinh'  => $postdata['GioiTinh'],
                'AnhDaiDien'  => $fileName,
            ];
            DB::table('taikhoan')->insert($data);
            return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Thêm tài khoản mới thành công');
        }
        if (isset($postdata['SoLuong']) == true) {
            $data = [
                'MaTK' => $postdata['MaTK'],
                'TenTK'  => $postdata['TenTK'],
                'FullName'  => $postdata['FullName'],
                'MatKhau'  => $postdata['MatKhau'],
                'DiaChi'  => $postdata['DiaChi'],
                'SDT'  => $postdata['SDT'],
                'LoaiTK'  => $postdata['LoaiTK'],
                'Dob'  => $postdata['Dob'],
                'GioiTinh'  => $postdata['GioiTinh'],
                'AnhDaiDien'  => $fileName,
                'existsEpisode'=>false
            ];
            DB::table('taikhoan')->insert($data);
            return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Thêm tài khoản mới thành công');
        }
    }

    public function getEditNhanVien($id)
    {

        $list_Tl = DB::table('taikhoan')->get();
        $edit_nv = DB::table('taikhoan')->Where('LoaiTK','=','Nhân viên')
        ->orWhere('LoaiTK', '=', 'Admin')
        ->orWhere('LoaiTK', '=', 'Admin,Nhân Viên');
        return view('admin.layout.user.suaNhanVien', compact('list_Tl', 'edit_nv'));
    }
    public function postEditNhanVien(Request $request){
        $request->validate([
            'MaTK' => 'required',
            'TenTk'  => 'required',
            'FullName'  => 'required',
            'MatKhau'  => 'required|min:0',
            'DiaChi'  => 'required',
            'Email'  => 'required',
            
        ], [
            'MaTK.required' => 'Bạn không thể để trống mã tài khoản!',
            'TenTK.required' => 'Bạn hãy nhập tên tài khoản!',
            'FullName.required' => 'Bạn hãy nhập FullName đi!!!',
            'MatKhau.required' => 'Bạn chưa nhập mật khẩu!!!',
            'Email.required' => 'Bạn chưa nhập email!!!',
        ]);
        $postdata = $request->all();

        if ($request->hasFile('AnhDaiDien')) {

            $file = $request->file('AnhDaiDien');
            $fileName = $file->hashName();
            $file->store('user', 'public');
            if (isset($postdata['SoLuong']) == false) {
                $data = [
                    'MaTK' => $postdata['MaTK'],
                    'TenTK'  => $postdata['TenTK'],
                    'FullName'  => $postdata['FullName'],
                    'MatKhau'  => $postdata['MatKhau'],
                    'DiaChi'  => $postdata['DiaChi'],
                    'SDT'  => $postdata['SDT'],
                    'LoaiTK'  => $postdata['LoaiTK'],
                    'Dob'  => $postdata['Dob'],
                    'GioiTinh'  => $postdata['GioiTinh'],
                    'AnhDaiDien'  => $fileName,
                ];
                DB::table('taikhoan')->where('MaTK', $request->id)->update($data);
                return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Cập nhật thông tin nhân viên thành công!');
            }
            if (isset($postdata['SoLuong']) == true) {
                $data = [
                    'MaTK' => $postdata['MaTK'],
                    'TenTK'  => $postdata['TenTK'],
                    'FullName'  => $postdata['FullName'],
                    'MatKhau'  => $postdata['MatKhau'],
                    'DiaChi'  => $postdata['DiaChi'],
                    'SDT'  => $postdata['SDT'],
                    'LoaiTK'  => $postdata['LoaiTK'],
                    'Dob'  => $postdata['Dob'],
                    'GioiTinh'  => $postdata['GioiTinh'],
                    'AnhDaiDien'  => $fileName,
                ];
                DB::table('taikhoan')->where('MaTK', $request->id)->update($data);
                return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Cập nhật thông tin nhân viên thành công!');
            }
        } else {
            if (isset($postdata['SoLuong']) == false) {
                $data = [
                    'MaTK' => $postdata['MaTK'],
                    'TenTK'  => $postdata['TenTK'],
                    'FullName'  => $postdata['FullName'],
                    'MatKhau'  => $postdata['MatKhau'],
                    'DiaChi'  => $postdata['DiaChi'],
                    'SDT'  => $postdata['SDT'],
                    'LoaiTK'  => $postdata['LoaiTK'],
                    'Dob'  => $postdata['Dob'],
                    'GioiTinh'  => $postdata['GioiTinh'],
                  
                ];
                DB::table('taikhoan')->where('MaTK', $request->id)->update($data);
                return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Cập nhật thông tin nhân viên thành công!');
            
            if (isset($postdata['SoLuong']) == true) {
                $data = [
                    'MaTK' => $postdata['MaTK'],
                    'TenTK'  => $postdata['TenTK'],
                    'FullName'  => $postdata['FullName'],
                    'MatKhau'  => $postdata['MatKhau'],
                    'DiaChi'  => $postdata['DiaChi'],
                    'SDT'  => $postdata['SDT'],
                    'LoaiTK'  => $postdata['LoaiTK'],
                    'Dob'  => $postdata['Dob'],
                    'GioiTinh'  => $postdata['GioiTinh'],
                  
                ];
                DB::table('taikhoan')->where('MaTK', $request->id)->update($data);
                return redirect()->route('admin.nhanvien.index')->with('msg-suc', 'Cập nhật thông tin nhân viên thành công!');
            }
        }
    }
        
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



    


