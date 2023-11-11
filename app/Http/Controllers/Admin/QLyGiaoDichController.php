<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QLyGiaoDichController extends Controller
{
    //
    public function getViewOrder(){
        $list = DB::table('dondat')
        ->join('taikhoan','taikhoan.MaTk','=','dondat.MaTk')
        ->orderBy('Fullname','asc')
        ->paginate(8);
        // dd($list);
        return view('admin.layout.cart.order',compact('list'));
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
    

   
    public function getViewOrderDetal($orderId) {
        $item = DB::table('taikhoan')
            ->join('dondat', 'taikhoan.MaTk', '=', 'dondat.MaTk')
            // ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
            // ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
            // ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
            ->where('dondat.MaDonDat', '=', $orderId)
            ->orderBy('Fullname', 'asc')
            ->first();
        $list = DB::table('chitietdondat')
            ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
            ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
            ->where('chitietdondat.MaDonDat', '=', $orderId)
            ->orderBy('TenSach', 'asc')
            ->get();
            
        return view('admin.layout.cart.orderDetal', compact('item','list'));
    }
    
    public function updateStatus($orderId, Request $request)
{
    $trangthai = $request->input('trangthai');

    // Cập nhật trạng thái đơn đặt
    DB::table('dondat')
        ->where('MaDonDat', $orderId)
        ->update(['TrangThaiDonDat' => $trangthai]);

    // Redirect hoặc trả về phản hồi thành công
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
