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
        $account = DB::select('SELECT COUNT(*) as soluong FROM taikhoan WHERE TenTK = ? and MatKhau = ?', [$taikhoan, $matkhau]);

        if ($account[0]->soluong == 1) {
            return true;
        } else {
            return false;
        }
    }
}
