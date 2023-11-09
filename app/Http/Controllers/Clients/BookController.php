<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function getAllBook()
    {
        $list_book = DB::table('sach')
            ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
            ->get();
        return $list_book;
    }
    public function getBooksByGenre($idTL)
    {
        if ($idTL == 'all') {
            $list_TL = DB::table('theloai')
                ->take(5)
                ->orderBy('TenTL', 'asc')
                ->get();
            $all_book = DB::table('sach')
                ->join('tacgia_sach', 'tacgia_sach.MaSach', '=', 'sach.MaSach')
                ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
                ->orderBy('TenSach', 'asc')
                ->take(4)
                ->get();
            return view('clients.layout.home', compact('all_book', 'list_TL'));
        } else {
            $list_TL = DB::table('theloai')
                ->take(5)
                ->orderBy('TenTL', 'asc')
                ->get();
            $all_book = DB::table('sach')
                ->join('tacgia_sach', 'tacgia_sach.MaSach', '=', 'sach.MaSach')
                ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
                ->where('sach.MaTL', '=', $idTL)
                ->orderBy('TenSach', 'asc')
                ->take(4)
                ->get();
            return view('clients.layout.home', compact('all_book', 'list_TL'));
        }
    }
    public function getBooksByGenreForBookCase($idTL)
    {
        if ($idTL == 'all') {
            $list_TL = DB::table('theloai')
                ->take(5)
                ->orderBy('TenTL', 'asc')
                ->get();
            $list_books = DB::table('sach')
                ->join('tacgia_sach', 'tacgia_sach.MaSach', '=', 'sach.MaSach')
                ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
                ->orderBy('TenSach', 'asc')
                ->paginate(12);
            return view('clients.layout.bookcase', compact('list_books', 'list_TL'));
        } else {
            $list_TL = DB::table('theloai')
                ->take(5)
                ->orderBy('TenTL', 'asc')
                ->get();
            $list_books = DB::table('sach')
                ->join('tacgia_sach', 'tacgia_sach.MaSach', '=', 'sach.MaSach')
                ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                ->join('tacgia', 'tacgia.MaTG', '=', 'tacgia_sach.MaTG')
                ->where('sach.MaTL', '=', $idTL)
                ->orderBy('TenSach', 'asc')
                ->paginate(12);
            return view('clients.layout.bookcase', compact('list_books', 'list_TL'));
        }
    }

    public function getBookById($MaSach)
    {
        $sach = DB::table('sach')->where('MaTap', $MaSach)->get();
        return $sach;
    }
}
