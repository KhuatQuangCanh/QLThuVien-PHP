<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accounts extends Model
{
    use HasFactory;


    // public function login($taikhoan)
    // {
    //     // $account = DB::select('SELECT * FROM taikhoan WHERE TenTK = ? and MatKhau = ?', [$taikhoan, $matkhau]);

    //     $account = DB::table('taikhoan')->where('TenTK', $taikhoan)->get();

    //     return $account;

    //     // if ($account[0]->soluong == 1) {
    //     //     return true;
    //     // } else {
    //     //     return false;
    //     // }
    // }


    // public function register($data)
    // {
    //     return DB::insert("INSERT INTO taikhoan (TenTK,MatKhau,DiaChi,SDT,LoaiTK,Fullname,Email,Dob,AnhDaiDien) VALUES (?,?,NULL,NULL,NULL,?,?,NULL,NULL)", $data);
    // }
}