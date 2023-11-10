<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accounts extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';

    public function getUserById($id)
    {
        return DB::table($this->table)->where('MaTK', $id)->get();
    }

    public function getUserByTK($tenTK)
    {
        return DB::table($this->table)->where('TenTK', $tenTK)->get();
    }
}
