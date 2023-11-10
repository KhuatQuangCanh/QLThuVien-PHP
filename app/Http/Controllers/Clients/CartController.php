<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');

        // Lưu thông tin sản phẩm vào session hoặc database tùy thuộc vào yêu cầu của bạn
        // Ví dụ: sử dụng session
        $cart = Session::get('cart');
        if (in_array($productId, $cart)) {
            return response()->json(['message' => $productName . ' bạn đã thêm trong giỏ từ trước ! Vui lòng kiểm tra lại !']);
        }
        Session::remove('cart');
        $cart[] = $productId;
        Session::put('cart', $cart);
        // $a = Session::get('cart');
        return response()->json(['message' => 'Đã thêm ' . $productName . ' vào giỏ thành công !']);
    }
}
