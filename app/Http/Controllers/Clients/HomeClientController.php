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
        $lst_book =[];
        foreach ($all_books as $key => $book) {
            if ($book->existsEpisode == 1) {
                $book1 = DB::table('sach')
                    ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                    ->get();

                foreach ($book1 as $key1 => $item) {
                    if (in_array($item, $lst_book) == false) {
                        $lst_book[] = $item;
                    }
                }
            } else {
                $lst_book[] = $book;
            }
        }
        
        $currentPage = request()->get('page', 1);
        $totalItems = count($lst_book);
        $lastPage = ceil($totalItems / $perPage);

        $offset = ($currentPage - 1) * $perPage;
        $list_books = array_slice($lst_book, $offset, $perPage);
            
        // dd($list_books);

        // dd($list_books);
        return view('clients.layout.bookcase', compact('list_books', 'list_TL', 'currentPage', 'lastPage'));
    }
    public function contact()
    {
        return view('clients.layout.contact');
    }

    public function timSach(Request $request)
    {
        // dd($request->all());
        $tenSach=$request['tenSach'];
        $token = $request['_token'];

        $perPage = 12;
        $list_books = [];
        $ketqua = [];
        $list_sach = DB::table('sach')
        ->where('TenSach', 'like', '%' . $request['tenSach'] . '%')
            ->get();

        foreach ($list_sach as $key => $sach) {
            if ($sach->existsEpisode == 1) {
                $sach1 = DB::table('sach')
                        ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
                        ->where('sach.MaSach','=',$sach->MaSach)
                        ->get();
                foreach($sach1 as $k => $item){
                    if(in_array($item,$ketqua) == false){
                        $ketqua[] = $item;
                    }
                }
            } else {
                if(in_array($sach,$ketqua) == false){
                    $ketqua[] = $sach;
                }
            }
        }

        $currentPage = request()->get('page', 1);
        $totalItems = count($ketqua);
        $lastPage = ceil($totalItems / $perPage);

        $offset = ($currentPage - 1) * $perPage;
        $list_books = array_slice($ketqua, $offset, $perPage);

        return view('clients.layout.books.ketquatim',compact('list_books', 'currentPage', 'lastPage','tenSach','token'));
    }
    
}
