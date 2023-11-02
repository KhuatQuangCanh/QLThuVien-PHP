<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    private $account;

    public function __construct()
    {
        $this->account = new Accounts();
    }
    //
    public function login(Request $request)
    {

        $rules = [
            'taikhoan' => 'required',
            'matkhau' => 'required'
        ];
        $message = [
            'taikhoan.required' => 'Vui lòng nhập tài khoản.',
            'matkhau.required' => 'Vui lòng nhập mật khẩu.',
        ];

        $request->validate($rules, $message);

        $result = $this->account->login($request->taikhoan, $request->matkhau);

        if ($result == true) {
            $request->session()->put('user', $request->taikhoan);
            return view('clients.layout.home');
        } else {
            dd($result);
        }
    }
}
