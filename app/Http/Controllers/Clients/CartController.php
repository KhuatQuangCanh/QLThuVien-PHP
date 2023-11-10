<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $productId = $request->input('product_id');
            $productName = $request->input('product_name');
            $productIdtap = $request->input('productIdtap');
            $productTap = $request->input('product_tap');

            $cart_id = Session::get('cart-id');
            $cart_idtap = Session::get('cart-idtap');
            // dd($cart_id, $cart_idtap);
            if (empty($cart_idtap)) {
                if (empty($cart_id)) {
                    Session::remove('cart-id');
                    Session::remove('cart-idtap');
                    $cart_id[] = $productId;
                    $cart_idtap[] = $productIdtap;

                    Session::put('cart-id', $cart_id);
                    Session::put('cart-idtap', $cart_idtap);
                    return response()->json(['message' => 'Đã thêm ' . $productName . ' vào giỏ thành công !']);
                }
            }

            if (in_array($productId, $cart_id)) {
                if (in_array($productIdtap, $cart_idtap)) {
                    return response()->json(['message' => $productName . ' bạn đã thêm trong giỏ từ trước ! Vui lòng kiểm tra lại !']);
                } else {
                    return response()->json(['message' => $productName . '-' . $productTap . ' bạn đã thêm trong giỏ từ trước ! Vui lòng kiểm tra lại !']);
                }
            }

            Session::remove('cart-id');
            Session::remove('cart-idtap');

            $cart_id[] = $productId;
            $cart_idtap[] = $productIdtap;

            Session::put('cart-id', $cart_id);
            Session::put('cart-idtap', $cart_idtap);
            return response()->json(['message' => 'Đã thêm ' . $productName . ' vào giỏ thành công !']);
        } catch (Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['message' => 'Error adding to cart.'], 500);
        }
    }
}
