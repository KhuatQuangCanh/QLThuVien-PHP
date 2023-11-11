<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $productId = $request->input('product_id');
            $productName = $request->input('product_name');
            $productIdtap = $request->input('product_idtap');
            $productTap = $request->input('product_tap');

            if ($productIdtap == null) {
                $cart_id = Session::get('cart-id');
                if (empty($cart_id)) {
                    $cart_id_new[] = $productId;
                    Session::remove('cart-id');
                    Session::put('cart-id', $cart_id_new);
                    return response()->json(['message' => 'Đã thêm ' . $productName . ' vào giỏ!']);
                } else {
                    foreach ($cart_id as $key => $item) {
                        if ($item == $productId) {
                            return response()->json(['message' => $productName . ' đã được thêm vào giỏ từ trước! Vui lòng kiểm tra lại!']);
                        }
                    }
                    $cart_id[] = $productId;
                    Session::remove('cart-id');
                    Session::put('cart-id', $cart_id);
                    return response()->json(['message' => 'Đã thêm ' . $productName . ' vào giỏ!']);
                }
            } else {
                $cart_idtap = Session::get('cart-idtap');
                if (empty($cart_idtap)) {
                    $cart_idtap_new[] = $productIdtap;
                    Session::remove('cart-idtap');
                    Session::put('cart-idtap', $cart_idtap_new);
                    return response()->json(['message' => 'Đã thêm ' . $productName . ' ' . $productTap . ' vào giỏ!']);
                } else {
                    foreach ($cart_idtap as $key => $item_tap) {
                        if ($item_tap == $productIdtap) {
                            return response()->json(['message' => $productName .' ' . $productTap . ' đã được thêm vào giỏ từ trước! Vui lòng kiểm tra lại!']);
                        }
                    }
                    $cart_idtap[]=$productIdtap;
                    Session::remove('cart-idtap');
                    Session::put('cart-idtap', $cart_idtap);
                    return response()->json(['message' => 'Đã thêm ' . $productName . ' ' . $productTap . ' vào giỏ!']);
                }
            }
        } catch (Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['message' => 'Error adding to cart.'], 500);
        }
    }


    public function deleteFromCart(Request $request)
    {
        $cart_id = Session::get('cart-id');
        $cart_idtap = Session::get('cart-idtap');
        if(isset($request->idTap)){
            foreach($cart_idtap as $key => $item){
                if($item == $request->idTap){
                    unset($cart_idtap[$key]);
                    Session::remove('cart-idtap');
                    Session::put('cart-idtap', $cart_idtap);
                    break;
                }
                $key++;
            }
        }
        if(isset($request->idSach)){
            if(!empty($cart_id)){
                foreach($cart_id as $key => $item){
                    if($item == $request->idSach){
                        unset($cart_id[$key]);
                        Session::remove('cart-id');
                        Session::put('cart-id', $cart_id);
                        break;
                    }
                    $key++;
                }
            }
            
        }
        return redirect()->route('clients.user.cart')->with('msg-suc-cart','Xóa thành công '.$request->tenSach.' '.$request->tenTap.' khỏi giỏ!');
    }

    public function xacNhanDat(Request $request){
        $list_idSach = $request->idSach;
        $list_idTap = $request->idTap;
        // dd($list_idSach,$list_idTap);

        $dataDonDat =[
            'ThoiGianTao' => (new DateTime())->format('Y-m-d H:i:s'),
            'TrangThaiDonDat' => 'Chờ xác nhận',
            'MaTK' => Session::get('id')
        ];
        $id = DB::table('dondat')->insertGetId($dataDonDat);


        if(!empty($list_idSach)){
            foreach($list_idSach as $key => $idSach){
                $dataChiTietDD = [
                    'SoLuongSach'=>1,
                    'MaDonDat' => $id,
                    'MaSach'=>$idSach
                ];
                DB::table('chitietdondat')->insert($dataChiTietDD);
            }
        }
        if(!empty($list_idTap)){
            foreach($list_idTap as $key => $idTap){
                $sach = DB::table('sach')->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')->where('MaTap','=',$idTap)->get();
                // dd($sach);
                $dataChiTietDD = [
                    'SoLuongSach'=>1,
                    'MaDonDat' => $id,
                    'MaSach'=>$sach[0]->MaSach,
                    'MaTap' => $idTap
                ];

                DB::table('chitietdondat')->insert($dataChiTietDD);
            }
        }
        
        Session::remove('cart-id');
        Session::remove('cart-idtap');
        return redirect()->route('clients.user.profile',['id'=>Session::get('id')])->with('msg-order-succ','Đăt thành công. Vui lòng chờ xác nhận!');
        
    }


}
