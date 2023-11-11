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


    public function deleteFromCart()
    {
    }
}
