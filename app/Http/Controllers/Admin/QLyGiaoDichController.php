<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

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
            } catch (Exception $e) {
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
        $user = DB::table('taikhoan')
            ->join('dondat', 'taikhoan.MaTk', '=', 'dondat.MaTk')
            ->where('dondat.MaDonDat', '=', $orderId)
            ->get()
            ->toArray();
        $dondat = DB::table('dondat')
            ->join('chitietdondat', 'chitietdondat.MaDonDat', '=', 'dondat.MaDonDat')
            ->where('chitietdondat.MaDonDat', '=', $orderId)
            ->get()
            ->toArray();
        $list=[];
        foreach($dondat as $key => $item){
            if($item->MaTap == NULL){
                $ttsach = DB::table('chitietdondat')
                    ->join('dondat','dondat.MaDonDat','=','chitietdondat.MaDonDat')
                    ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
                    ->where('sach.MaSach','=',$item->MaSach)
                    ->where('dondat.MaTK','=',$user[0]->MaTK)
                    ->get()
                    ->toArray();
                    foreach($ttsach as $k => $it1){
                        if(in_array($it1,$list) == false){
                            $list[]= $it1;
                        }
                    }

            }
            else if($item->MaTap != NULL){
                $ttsach = DB::table('chitietdondat')
                ->join('dondat','dondat.MaDonDat','=','chitietdondat.MaDonDat') 
                ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
                ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                ->where('sach_tap.MaTap','=',$item->MaTap)
                ->where('dondat.MaTK','=',$user[0]->MaTK)
                ->get()
                ->toArray();
                foreach ($ttsach as $k => $it1) {
                    if (in_array($it1, $list) == false) {
                        $list[] = $it1;
                    }
                }
            }
            
        }
        foreach($list as $key => $item){
            $phieumuon = DB::table('phieumuon')->where('MaChiTiet','=',$item->MaChiTiet)->get()->toArray();
            if(count($phieumuon) == 0){
                break;
            }
            $item->PhieuMuon = $phieumuon[0];
            $bansao =DB::table('bansaosach')->where('MaPhieu','=',$phieumuon[0]->MaPhieu)->get()->toArray();
            if(count($bansao) > 0){
                $item->MaBanSao=$bansao[0]->MaBanSaoSach;
            }
        }
        // dd($list);
        return view('admin.layout.cart.orderDetail', compact('user', 'list'));
    }

    public function updateStatus($orderId, Request $request)
    {
        $a = DB::table('dondat')
        ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
        ->where('dondat.MaDonDat','=',$orderId)->get()->toArray();

        $trangthai = $request->input('trangthai');

        if($a[0]->TrangThaiDonDat == $trangthai){
            return redirect()->route('admin.order.get-view-order');
        }

        if($trangthai == 'Đã chuẩn bị sách'){
            foreach($a as $key=> $item){
                $id = DB::table('phieumuon')->insertGetId([
                    'NgayMuon'=>NULL,
                    'ThoiHan'=> $item->ThoiGianMuon,
                    'TrangThai'=>'Chờ lấy sách',
                    'NgayHenTra'=>NULL,
                    'MaChiTiet'=>$item->MaChiTiet
                ]);
                if($item->MaTap == null){
                    $bansao = DB::table('bansaosach')
                    ->where('MaSach','=',$item->MaSach)
                    ->get()
                    ->toArray();
                    foreach($bansao as $key1=> $item1){
                        if($item1->MaPhieu == null){
                            DB::table('bansaosach')->where('MaBanSaoSach','=',$item1->MaBanSaoSach)->update(['MaPhieu'=>$id]);
                            break;
                        }
                        else{
                            return redirect()->route('admin.order.get-view-order')->with('msg-order','Không đủ số lượng. Vui lòng kiểm tra lại!');
                        }
                    }
                }
                else{
                    $bansao = DB::table('bansaosach')
                    ->where('MaSach','=',$item->MaSach)
                    ->where('MaTap','=',$item->MaTap)
                    ->get()
                    ->toArray();
                    foreach($bansao as $key1=> $item1){
                        if($item1->MaPhieu == null){
                            DB::table('bansaosach')->where('MaBanSaoSach','=',$item1->MaBanSaoSach)->update(['MaPhieu'=>$id]);
                            break;
                        }
                        else
                        {
                            return redirect()->route('admin.order.get-view-order')->with('msg-order','Không đủ số lượng. Vui lòng kiểm tra lại!');
                        }
                    }
                }
            }   
            DB::table('dondat')->where('MaDonDat','=',$orderId)->update(['TrangThaiDonDat'=>$trangthai]);
        }
        else if($trangthai == 'Đã nhận sách'){
            foreach($a as $key => $item){
                if($a[0]->TrangThaiDonDat == 'Chờ xác nhận'){
                    return redirect()->route('admin.order.get-view-order')->with('msg-order','Đơn chưa được chuẩn bị sách. Vui lòng kiểm tra lại!');
                }
                DB::table('phieumuon')->where('MaChiTiet','=',$item->MaChiTiet)->update([
                    'NgayMuon' => (new DateTime())->format('Y-m-d H:i:s'),
                    'TrangThai' => 'Đang Mượn',
                    'NgayHenTra' => Carbon::parse(new DateTime())->addDays($item->ThoiGianMuon),
                ]);
            }
            DB::table('dondat')->where('MaDonDat','=',$orderId)->update(['TrangThaiDonDat'=>$trangthai]);
        }
        else if($trangthai == 'Đã trả'){
            // DB::table('dondat')->where('MaDonDat','=',$orderId)->update(['TrangThaiDonDat'=>$trangthai ]);
            $a = Db::table('chitietdondat')
                ->join('phieumuon','phieumuon.MaChiTiet','=','chitietdondat.MaChiTiet')
                ->join('bansaosach','bansaosach.MaPhieu','=','phieumuon.MaPhieu')
                ->where('chitietdondat.MaDonDat','=',$orderId)
                ->get()
                ->toArray();
                
            // dd($a);
            DB::table('bansaosach')->where('MaBanSaoSach','=',$a[0]->MaBanSaoSach)->update(['MaPhieu'=> NULL ]);
            DB::table('phieumuon')->where('MaPhieu','=',$a[0]->MaPhieu)->update(['TrangThai'=> $trangthai ,'MaBSKhiTra'=> $a[0]->MaBanSaoSach ,'NgayTra'=> (new DateTime())->format('Y-m-d H:i:s')]);
            DB::table('dondat')->where('MaDonDat','=',$orderId)->update(['TrangThaiDonDat'=>$trangthai ]);
        }


        return redirect()->route('admin.order.get-view-order')->with('msg-order','Đã duỵệt đơn!');
    }

    public function getViewBorrow()
    {
        $list = DB::table('dondat')
            ->join('taikhoan', 'taikhoan.MaTk', '=', 'dondat.MaTk')
            ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
            ->join('phieumuon','phieumuon.MaChiTiet','=','chitietdondat.MaChiTiet')
            ->orderByRaw('CONVERT(ThoiGianTao, DATE) DESC, CONVERT(ThoiGianTao, TIME) DESC') // Sắp xếp theo trường 'ThoiGianTao'
            ->paginate(100);
        // dd($list);
        return view('admin.layout.cart.borrow', compact('list'));
    }
    public function getViewHistory()
    {
        $info = DB::table('');
        return view('admin.layout.cart.history', compact('info'));
    }
}
