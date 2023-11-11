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

        $all_book = [];
        $lis_book = DB::table('sach')
            ->orderBy('TenSach', 'asc')
            ->take(3)
            ->get()
            ->toArray();
        foreach ($lis_book as $key => $book) {
            if ($book->existsEpisode == 1) {
                $book1 = DB::table('sach')
                    ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                    ->get()
                    ->all();
                foreach ($book1 as $key => $item) {
                    if (in_array($item, $all_book) == false) {
                        $all_book[] = $item;
                    }
                }
            }
            else{
                if (in_array($book, $all_book) == false){
                    $all_book[] = $book;
                }
            }
            
        }
        // dd($all_book);
        return view('clients.layout.home', compact('list_TL', 'all_book'));
    }
    public function about()
    {
        return view('clients.layout.about');
    }

    public function bookcase()
    {
        $perPage = 12; // Number of items per page

        $list_books = [];
        $list_TL = DB::table('theloai')
            ->orderBy('TenTL', 'asc')
            ->get();

        $all_books = DB::table('sach')
            ->orderBy('TenSach', 'asc')
            ->get()
            ->toArray(); // Convert the collection to an array
        // dd($all_books);
        $currentPage = request()->get('page', 1);
        $totalItems = count($all_books);
        $lastPage = ceil($totalItems / $perPage);

        $offset = ($currentPage - 1) * $perPage;
        $currentItems = array_slice($all_books, $offset, $perPage);

        foreach ($currentItems as $key => $book) {
            if ($book->existsEpisode == 1) {
                $book1 = DB::table('sach')
                    ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                    ->get();

                foreach ($book1 as $key1 => $item) {
                    if (in_array($item, $list_books) == false) {
                        $list_books[] = $item;
                    }
                }
            } else {
                $list_books[] = $book;
            }
        }
        return view('clients.layout.bookcase', compact('list_books', 'list_TL', 'currentPage', 'lastPage'));
    }




    public function contact()
    {
        return view('clients.layout.contact');
    }
}
