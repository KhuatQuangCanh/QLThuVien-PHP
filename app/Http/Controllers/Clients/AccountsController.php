<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Auth\Events\Login;

class AccountsController extends Controller
{
    private $account;

    public function __construct()
    {
        $this->account = new Accounts();
    }
    //
    public function login()
    {
        return view('clients.layout.block.asset.login');
    }


    public function postLogin(Request $request)
    {

        $rules = [
            'TenTK' => 'required',
            'MatKhau' => 'required'
        ];
        $message = [
            'TenTK.required' => 'Vui lòng nhập tài khoản.',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu.',
        ];

        $request->validate($rules, $message);

        $user = DB::table('taikhoan')->where('TenTK', $request->TenTK)->get();
        if ($user->count() == 1) {
            $mk = $user[0]->MatKhau;
            if (Hash::check($request->MatKhau, $mk)) {
                Session::put('user', $user[0]->TenTK);
                Session::put('id', $user[0]->MaTK);
                return redirect()->route('clients.homeClient')->with('msg-login', 'Đăng nhập thành công.');
            } else {
                return redirect()->route('clients.homeClient')->with('error-login', 'Thông tin tài khoản hoặc mật khẩu chưa chính xác.Vui lòng kiểm tra lại.');
            }
        } else {
            return redirect()->route('clients.homeClient')->with('error-login', 'Thông tin tài khoản hoặc mật khẩu chưa chính xác.Vui lòng kiểm tra lại.');
        }
    }

    public function register()
    {
        return view('clients.layout.block.asset.registration');
    }
    public function postRegister(Request $request)
    {
        $rules = [
            'Fullname' => 'required',
            'Email' => 'required|unique:taikhoan,Email',
            'TenTK' => 'required|unique:taikhoan,TenTK',
            'MatKhau' => 'required|min:6',
            'confirmMK' => 'required|min:6',
        ];

        $message = [
            'Fullname.required' => 'Bạn chưa nhập Họ tên.',
            'Email.required' => 'Bạn chưa nhập Email.',
            'TenTK.required' => 'Bạn chưa nhập tên Tài khoản.',
            'MatKhau.required' => 'Bạn chưa nhập Mật khẩu.',
            'confirmMK.required' => 'Bạn cần nhập lại Mật khẩu để xác nhận.',
            'Email.unique' => 'Email này đã được đăng kí.',
            'TenTK.unique' => 'Tài khoản này đã tồn tại.',
            'MatKhau.min' => 'Độ dài tối thiểu >= 6.',
            'confirmMK.min' => 'Độ dài tối thiểu >= 6.',
        ];

        $request->validate($rules, $message);

        if ($request->MatKhau == $request->confirmMK) {
            User::create($request->only('TenTK', 'MatKhau', 'Fullname', 'Email'));
            return redirect()->route('clients.homeClient')->with('msg-regis', 'Đăng kí thành công.');
        } else {
            return back()->with('err-regis', 'Thông tin không phù hợp. Đăng kí thất bại.');
        }
    }


    public function logout()
    {
        Session::remove('user');
        Session::remove('id');
        Auth::logout();
        return redirect()->route('clients.homeClient');
    }


    public function profile(Request $request)
    {
        $info = DB::table('taikhoan')->where('MaTK', $request->id)->get();

        return view('clients.layout.users.profile', compact('info'));
    }
    public function cart()
    {
        return view('clients.layout.users.cart');
    }
}
