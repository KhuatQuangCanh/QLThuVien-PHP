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
    public function getBooksByGenreForHome($idTL)
    {
        // dd($idTL);
        if ($idTL == 'all') {
            return redirect()->route('clients.homeClient');
        } else {
            $list_TL = DB::table('theloai')
                ->take(5)
                ->orderBy('TenTL', 'asc')
                ->get()
                ->toArray();
            $theloai = DB::table('theloai')->where('TenTL','=',$idTL)->select(['MaTL'])->get()->toArray();
            $lst_sach = DB::table('sach')->where('sach.MaTL', '=',  $theloai[0]->MaTL)->get()->toArray();
            $list = [];
            $all_book=[];

            foreach($lst_sach as $key => $sach){
                if ($sach->existsEpisode == 1) {
                    $sach1 = DB::table('sach')
                    ->join('sach_tap', 'sach_tap.MaSach', '=', 'sach.MaSach')
                    ->where('sach.MaTL', '=', $theloai[0]->MaTL)
                    ->orderBy('TenSach', 'asc')
                    ->get()
                    ->toArray();
                    // dd($sach1);
                    foreach($sach1 as $key => $book){
                        $list[] = $book;
                    }
                }
                else if($sach->existsEpisode == 0){
                    $sach2 = DB::table('sach')
                        ->where('sach.MaTL', '=', $theloai[0]->MaTL)
                        ->orderBy('TenSach', 'asc')
                        ->get()
                        ->toArray();
                        // dd($sach2);
                        foreach($sach2 as $key => $book){
                            $list[] = $book;
                        }
                }
            }
            // dd($list);
            foreach($list as $key => $book){
                    if(count($all_book) >= 4){
                        break;
                    }
                    $all_book[]=$book;
            }
            // dd($all_book);
            return view('clients.layout.home', compact('all_book', 'list_TL'));
        }
    }
    public function getBooksByGenreForBookCase($idTL)
    {
        if ($idTL == 'all') {
            return redirect()->route('clients.bookcase');
        } else {
            $perPage = 12; // Number of items per page
            $list_books = [];

            $list_TL = DB::table('theloai')
                ->orderBy('TenTL', 'asc')
                ->get()
                ->toArray();
            $theloai = DB::table('theloai')->where('TenTL','=',$idTL)->select(['MaTL'])->get();
            // dd($theloai);
            $all_books = DB::table('sach')
                ->where('sach.MaTL', '=', $theloai[0]->MaTL)
                ->orderBy('TenSach', 'asc')
                ->get()
                ->toArray();
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
    }

    public function getChitietSach(Request $request)
    {
        if(isset($request->tap)){
            $sach = DB::table('sach')
            ->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')
            ->where('TenSach','=',$request->ten)
            ->where('TenTap','=',$request->tap)
            ->get();
        }
        else{
            $sach = DB::table('sach')
            ->where('TenSach','=',$request->ten)
            ->get();
        }
        return view('clients.layout.books.detailbook',compact('sach'));
    }



}
