<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookController extends Controller
{

    public function index()
    {
        $list = DB::table('sach')
            // ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
            ->join('theloai', 'theloai.MaTL', '=', 'sach.MaTL')
            ->orderBy('TenSach', 'asc')
            ->paginate(10);
        // dd($list);
        return view('admin.layout.books.danhmucsach', compact('list'));
    }
    public function getFormNhapSach()
    {
        $list_Tl = DB::table('theloai')->get();
        return view('admin.layout.books.formnhapsach', compact('list_Tl'));
    }
    public function postFormNhapSach(Request $request)
    {

        $request->validate([
            'TenSach' => 'required',
            'NoiDung'  => 'required',
            'TacGia'  => 'required',
            'SoTrang'  => 'required|min:0',
            'MaTL'  => 'required',
            'GiaSach'  => 'required|min:0',
            'SoLuong'  => 'min:0',
            'AnhSach'  => 'required'
        ], [
            'TenSach.required' => 'Bạn không thể để trống tến sách!',
            'NoiDung.required' => 'Bạn hãy ghi nội dung mô tả cho cuốn sách!',
            'TacGia.required' => 'Bạn cần điền tác giả cho cuốn sách!',
            'SoTrang.required' => 'Bạn chưa nhập số trang!',
            'SoTrang.min' => 'Số trang phải lơn hơn 0!',
            'MaTL.required' => 'Bạn chưa chọn thể loại!',
            'GiaSach.required' => 'Bạn cần nhập giá sách!',
            'GiaSach.min' => 'Giá sách phải lớn hơn 0!',
            'SoLuong.min' => 'Số lượng phải lơn hơn 0!',
            'AnhSach.required' => 'Bạn cần phải tải ảnh cho sách!',
        ]);
        // dd($request->hasFile('AnhSach'));
        // dd($request);
        if ($request->hasFile('AnhSach')) {

            $file = $request->file('AnhSach');
            $fileName = $file->hashName();
            $file->store('books', 'public');
        }
        $postdata = $request->all();
        if (isset($postdata['SoLuong']) == false) {
            $data = [
                'TenSach' => $postdata['TenSach'],
                'NoiDung'  => $postdata['NoiDung'],
                'TacGia'  => $postdata['TacGia'],
                'SoTrang'  => $postdata['SoTrang'],
                'MaTL'  => $postdata['MaTL'],
                'GiaSach'  => $postdata['GiaSach'],
                'SoLuong'  => NULL,
                'AnhSach'  => $fileName,
                'existsEpisode'=>true
            ];
            DB::table('sach')->insert($data);
            return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Thêm sách thành công');
        }
        if (isset($postdata['SoLuong']) == true) {
            $data = [
                'TenSach' => $postdata['TenSach'],
                'NoiDung'  => $postdata['NoiDung'],
                'TacGia'  => $postdata['TacGia'],
                'SoTrang'  => $postdata['SoTrang'],
                'MaTL'  => $postdata['MaTL'],
                'GiaSach'  => $postdata['GiaSach'],
                'SoLuong'  => $postdata['SoLuong'],
                'AnhSach'  => $fileName,
                'existsEpisode'=>false
            ];
            DB::table('sach')->insert($data);
            return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Thêm sách thành công');
        }
    }

    public function getEditSach($id)
    {

        $list_Tl = DB::table('theloai')->get();
        $edit_sach = DB::table('sach')->join('theloai', 'theloai.MaTL', '=', 'sach.MaTL')->where('MaSach', $id)->get();
        return view('admin.layout.books.editSach', compact('list_Tl', 'edit_sach'));
    }

    public function postEditSach(Request $request)
    {
        $request->validate([
            'TenSach' => 'required',
            'NoiDung'  => 'required',
            'TacGia'  => 'required',
            'SoTrang'  => 'required|min:0',
            'MaTL'  => 'required',
            'GiaSach'  => 'required|min:0',
            'SoLuong'  => 'min:0',
        ], [
            'TenSach.required' => 'Bạn không thể để trống tến sách!',
            'NoiDung.required' => 'Bạn hãy ghi nội dung mô tả cho cuốn sách!',
            'TacGia.required' => 'Bạn cần điền tác giả cho cuốn sách!',
            'SoTrang.required' => 'Bạn chưa nhập số trang!',
            'SoTrang.min' => 'Số trang phải lơn hơn 0!',
            'MaTL.required' => 'Bạn chưa chọn thể loại!',
            'GiaSach.required' => 'Bạn cần nhập giá sách!',
            'GiaSach.min' => 'Giá sách phải lớn hơn 0!',
            'SoLuong.min' => 'Số lượng phải lơn hơn 0!',
        ]);
        // dd($request);
        $postdata = $request->all();

        if ($request->hasFile('AnhSach')) {

            $file = $request->file('AnhSach');
            $fileName = $file->hashName();
            $file->store('books', 'public');
            if (isset($postdata['SoLuong']) == false) {
                $data = [
                    'TenSach' => $postdata['TenSach'],
                    'NoiDung'  => $postdata['NoiDung'],
                    'TacGia'  => $postdata['TacGia'],
                    'SoTrang'  => $postdata['SoTrang'],
                    'MaTL'  => $postdata['MaTL'],
                    'GiaSach'  => $postdata['GiaSach'],
                    'AnhSach'  => $fileName,
                ];
                DB::table('sach')->where('MaSach', $request->id)->update($data);
                return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Cập nhật thông tin sách thành công!');
            }
            if (isset($postdata['SoLuong']) == true) {
                $data = [
                    'TenSach' => $postdata['TenSach'],
                    'NoiDung'  => $postdata['NoiDung'],
                    'TacGia'  => $postdata['TacGia'],
                    'SoTrang'  => $postdata['SoTrang'],
                    'MaTL'  => $postdata['MaTL'],
                    'GiaSach'  => $postdata['GiaSach'],
                    'SoLuong'  => $postdata['SoLuong'],
                    'AnhSach'  => $fileName,
                ];
                DB::table('sach')->where('MaSach', $request->id)->update($data);
                return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Cập nhật thông tin sách thành công!');
            }
        } else {
            if (isset($postdata['SoLuong']) == false) {
                $data = [
                    'TenSach' => $postdata['TenSach'],
                    'NoiDung'  => $postdata['NoiDung'],
                    'TacGia'  => $postdata['TacGia'],
                    'SoTrang'  => $postdata['SoTrang'],
                    'MaTL'  => $postdata['MaTL'],
                    'GiaSach'  => $postdata['GiaSach'],
                ];
                DB::table('sach')->where('MaSach', $request->id)->update($data);
                return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Cập nhật thông tin sách thành công!');
            }
            if (isset($postdata['SoLuong']) == true) {
                $data = [
                    'TenSach' => $postdata['TenSach'],
                    'NoiDung'  => $postdata['NoiDung'],
                    'TacGia'  => $postdata['TacGia'],
                    'SoTrang'  => $postdata['SoTrang'],
                    'MaTL'  => $postdata['MaTL'],
                    'GiaSach'  => $postdata['GiaSach'],
                    'SoLuong'  => $postdata['SoLuong'],
                ];
                DB::table('sach')->where('MaSach', $request->id)->update($data);
                return redirect()->route('admin.danhmucsach.index')->with('msg-suc', 'Cập nhật thông tin sách thành công!');
            }
        }
    }

    public function postDeleteBook($id)
    {

        $sach1 = DB::table('sach')
            ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
            ->where('sach.MaSach', $id)
            ->get();
        if ($sach1->isEmpty()) {
            $sach2 = DB::table('sach')
                ->join('bansaosach', 'bansaosach.MaSach', '=', 'sach.MaSach')
                ->where('sach.MaSach', $id)
                ->get();
            if ($sach2->isEmpty()) {
                $sach3 = DB::table('sach')
                    ->join('chitietdondat', 'chitietdondat.MaSach', '=', 'sach.MaSach')
                    ->where('sach.MaSach', $id)
                    ->get();
                if ($sach3->isEmpty()) {
                    $sach4 = DB::table('sach')
                        ->join('chitietpnk', 'chitietpnk.MaSach', '=', 'sach.MaSach')
                        ->where('sach.MaSach', $id)
                        ->get();
                    if ($sach4->isEmpty()) {
                        DB::table('sach')->where('MaSach', $id)->delete();
                        return back()->with('msg-suc', 'Xóa thành công !');
                    }
                    return back()->with('msg-err', 'Không thể xóa sách này !');
                }
                return back()->with('msg-err', 'Không thể xóa sách này !');
            }
            return back()->with('msg-err', 'Không thể xóa sách này !');
        }
        return back()->with('msg-err', 'Không thể xóa sách này !');
    }
}
