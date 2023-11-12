<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QLyGiaoDichController extends Controller
{
    //
    public function getViewOrder()
{
    $list = DB::table('dondat')
        ->join('taikhoan', 'taikhoan.MaTk', '=', 'dondat.MaTk')
        ->orderByRaw('CONVERT(ThoiGianTao, DATE) DESC, CONVERT(ThoiGianTao, TIME) DESC') // Sắp xếp theo trường 'ThoiGianTao'
        ->paginate(8);

    return view('admin.layout.cart.order', compact('list'));
}




public function deleteOrder($orderId)
{
    if (request()->isMethod('post')) {
        DB::beginTransaction();

        try {
            // Xóa các chi tiết đơn đặt liên quan
            DB::table('chitietdondat')
                ->where('chitietdondat.MaDonDat', '=', $orderId)
                ->delete();

            // Xóa đơn đặt
            DB::table('dondat')
                ->where('dondat.MaDonDat', '=', $orderId)
                ->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Đơn đặt đã được xóa thành công.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xóa đơn đặt.');
        }
    } else {
        // Xử lý khi phương thức không phải POST (ví dụ: GET)
        // ...
    }
}
    

   
public function getViewOrderDetail($orderId)
{
    $item = DB::table('taikhoan')
        ->join('dondat', 'taikhoan.MaTk', '=', 'dondat.MaTk')
        ->where('dondat.MaDonDat', '=', $orderId)
        ->orderBy('Fullname', 'asc')
        ->first();

        // existsEpisode

        $a = DB::table('sach')
        ->join('chitietdondat', 'chitietdondat.MaSach', '=', 'sach.MaSach')
        ->where('chitietdondat.MaDonDat', '=', $orderId)
        ->get();

    $isExistsEpisode = $a->contains('existsEpisode', 1);

    if ($isExistsEpisode) {
        // Các điều kiện khi existsEpisode = 1
        $list = DB::table('chitietdondat')
            ->join('sach', 'sach.MaSach', '=', 'chitietdondat.MaSach')
            ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
            ->where('chitietdondat.MaDonDat', '=', $orderId)
            ->orderBy('TenSach', 'asc')
            ->get();

        $listBanSaoSach = DB::table('bansaosach')
            ->whereIn('MaSach', $list->pluck('MaSach'))
            ->whereIn('MaTap', $list->pluck('MaTap'))
            ->get();
    } else {
        // Các điều kiện khác khi existsEpisode khác 1
        $list = DB::table('chitietdondat')
            ->join('sach', 'sach.MaSach', '=', 'chitietdondat.MaSach')
            ->where('chitietdondat.MaDonDat', '=', $orderId)
            ->orderBy('TenSach', 'asc')
            ->get();

        $listBanSaoSach = DB::table('bansaosach')
            ->whereIn('MaSach', $list->pluck('MaSach'))
            ->get();
    }

    return view('admin.layout.cart.orderDetail', compact('item', 'list', 'listBanSaoSach'));
}
    
    public function updateStatus($orderId, Request $request){
        $trangthai = $request->input('trangthai');
    
        DB::table('dondat')
            ->where('MaDonDat', $orderId)
            ->update(['TrangThaiDonDat' => $trangthai]);
    
        if ($trangthai == 'Đang mượn') {
            $maPhieu = DB::table('phieumuon')->insertGetId([
                'NgayMuon' => date('Y-m-d H:i:s'),
                'TrangThai' => 'Đang mượn',
                'NgayHenTra' => date('Y-m-d H:i:s', strtotime('+7 days')),
                'MaChiTiet' => DB::table('chitietdondat')
                    ->where('MaDonDat', $orderId)
                    ->value('MaChiTiet')
            ]);
    
            DB::table('chitietdondat')
                ->where('MaDonDat', $orderId)
                ->update(['MaDonDat' => NULL]);
    
            DB::table('dondat')
                ->where('MaDonDat', $orderId)
                ->delete();
    
            return redirect()->back()->with('success', 'Cập nhật trạng thái và xóa đơn đặt hàng thành công');
        }
    
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
    }

    public function getViewBorrow(){
        $list =DB::table('phieumuon');
        
        return view('admin.layout.cart.borrow',compact('list'));
    }
    public function getViewHistory(){
        $info =DB::table('');
        return view('admin.layout.cart.history',compact('info'));
    }
    

}
