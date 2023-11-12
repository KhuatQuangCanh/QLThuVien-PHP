<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $fillable = [
        'TenTK',
        'MatKhau',
        'DiaChi',
        'SDT',
        'LoaiTK',
        'Fullname',
        'Email',
        'Dob',
        'AnhDaiDien',
        'GioiTinh',
    ];
}
