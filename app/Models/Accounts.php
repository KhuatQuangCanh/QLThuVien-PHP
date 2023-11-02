<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accounts extends Model
{
    use HasFactory;


    public function login($taikhoan, $matkhau)
    {
        // $account = DB::select('SELECT * FROM taikhoan WHERE TenTK = ? and MatKhau = ?', [$taikhoan, $matkhau]);

        $account = DB::table('taikhoan')->where('TenTK', $taikhoan)->where('MatKhau', $matkhau)->get();

        return $account;

        // if ($account[0]->soluong == 1) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
