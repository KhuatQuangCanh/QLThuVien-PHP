<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeClientController extends Controller
{

    // private $account;
    // public function __construct()
    // {
    //     $this->account = new Accounts();
    // }

    //
    public function index()
    {
        $list_TL = DB::table('theloai')
            ->take(5)
            ->orderBy('TenTL', 'asc')
            ->get();
        $all_book = DB::table('sach')
            ->join('tacgia_sach', 'tacgia_sach.MaSach', '=', 'sach.MaSach')
            ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
            ->take(4)
            ->orderBy('TenSach', 'asc')
            ->get();
        // dd($list_TL);
        return view('clients.layout.home', compact('list_TL', 'all_book'));
    }
    public function about()
    {
        return view('clients.layout.about');
    }
    public function bookcase()
    {
        $list_TL = DB::table('theloai')
            ->take(5)
            ->orderBy('TenTL', 'asc')
            ->get();
        $list_books = DB::table('sach')
            ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
            ->join('tacgia_sach', 'tacgia_sach.Masach', '=', 'sach.MaSach')
            ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
            ->orderBy('sach.TenSach', 'asc')
            ->paginate(12); // You can adjust the number based on your needs

        return view('clients.layout.bookcase', compact('list_books', 'list_TL'));
    }


    public function contact()
    {
        return view('clients.layout.contact');
    }
}
