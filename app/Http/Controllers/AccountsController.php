<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AccountsController extends Controller
{
    private $account;

    public function __construct()
    {
        $this->account = new Accounts();
    }
    //
    public function login()
    {
        return view('clients.layout.block.asset.login');
    }
    public function logout()
    {
        Session::remove('fullname');
        Session::remove('id');
        Session::remove('loaiTk');
        Auth::logout();
        return redirect()->route('clients.homeClient');
    }

    public function postLogin(Request $request)
    {

        $rules = [
            'TenTK' => 'required',
            'MatKhau' => 'required'
        ];
        $message = [
            'TenTK.required' => 'Vui lòng nhập tài khoản.',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu.',
        ];

        $request->validate($rules, $message);

        // $user = DB::table('taikhoan')->where('TenTK', $request->TenTK)->get();
        $user = $this->account->getUserByTK($request->TenTK);

        if ($user->count() == 1) {
            $mk = $user[0]->MatKhau;
            if (Hash::check($request->MatKhau, $mk)) {
                Session::put('fullname', $user[0]->Fullname);
                Session::put('id', $user[0]->MaTK);
                if ($user[0]->LoaiTK == 'Người dùng' || $user[0]->LoaiTK == NULL) {
                    return redirect()->route('clients.homeClient')->with('msg-login', 'Đăng nhập thành công.');
                }
                else if($user[0]->LoaiTK == 'Admin,Nhân viên' || $user[0]->LoaiTK == 'Admin'  || $user[0]->LoaiTK == 'Nhân viên' ){
                    Session::put('loaiTk',$user[0]->LoaiTK);
                    return redirect()->route('admin.home')->with('msg-login', 'Đăng nhập thành công.');
                }
            } else {
                return redirect()->route('clients.homeClient')->with('error-login', 'Thông tin tài khoản hoặc mật khẩu chưa chính xác.Vui lòng kiểm tra lại.');
            }
        } else {
            return redirect()->route('clients.homeClient')->with('error-login', 'Thông tin tài khoản hoặc mật khẩu chưa chính xác.Vui lòng kiểm tra lại.');
        }
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'Fullname' => 'required',
            'Email' => 'required|unique:taikhoan,Email',
            'TenTK' => 'required|unique:taikhoan,TenTK',
            'MatKhau' => 'required|min:6',
            'confirmMK' => 'required|min:6',
        ];

        $message = [
            'Fullname.required' => 'Bạn chưa nhập Họ tên.',
            'Email.required' => 'Bạn chưa nhập Email.',
            'TenTK.required' => 'Bạn chưa nhập tên Tài khoản.',
            'MatKhau.required' => 'Bạn chưa nhập Mật khẩu.',
            'confirmMK.required' => 'Bạn cần nhập lại Mật khẩu để xác nhận.',
            'Email.unique' => 'Email này đã được đăng kí.',
            'TenTK.unique' => 'Tài khoản này đã tồn tại.',
            'MatKhau.min' => 'Độ dài tối thiểu >= 6.',
            'confirmMK.min' => 'Độ dài tối thiểu >= 6.',
        ];

        $request->validate($rules, $message);

        if ($request->MatKhau == $request->confirmMK) {
            User::create([
                'Fullname' => $request->Fullname,
                'Email' => $request->email,
                'TenTK' => $request->TenTK,
                'MatKhau' => $request->MatKhau,
                'LoaiTK' => 'Người dùng',
            ]);

            return redirect()->route('clients.homeClient')->with('msg-regis', 'Đăng kí thành công.');
        } else {
            return back()->with('err-regis', 'Thông tin không phù hợp. Đăng kí thất bại.');
        }
    }



    public function profile(Request $request)
    {
        $info = $this->account->getUserById($request->id);
        $check = Db::table('dondat')
        ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
        ->where('MaTK','=',$request->id)
        ->get();
        // dd($check);

        $dondat = [];
        foreach($check as $key => $item){
            if($item->MaTap == null){
                $dondat1 = DB::table('dondat')
                ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
                ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
                ->where('sach.MaSach','=',$item->MaSach)
                ->get();
                // dd($dondat1);
                foreach($dondat1 as $k => $don){
                    if(empty($dondat)){
                        $dondat[] = $don;
                    }
                    else{
                        if(in_array($don,$dondat) == false){
                            $dondat[] = $don; 
                        }
                    }
                }
            }
            else{
                $dondat2 = DB::table('dondat')
                ->join('chitietdondat','chitietdondat.MaDonDat','=','dondat.MaDonDat')
                ->join('sach','sach.MaSach','=','chitietdondat.MaSach')
                ->join('sach_tap','sach_tap.MaTap','=','chitietdondat.MaTap')
                ->where('sach_tap.MaTap','=',$item->MaTap)
                ->get();
                // dd($dondat2);
                foreach($dondat2 as $key2 => $item2){
                    if(empty($dondat)){
                        $dondat[] = $item2;
                    }
                    if(in_array($item2,$dondat) == false){
                        $dondat[] =$item2;
                    }
                }
            }
        }
        // dd($dondat);
        return view('clients.layout.users.profile', compact('info','dondat'));
    }

    public function getEditProfile($id)
    {
        // $profile = DB::table('taikhoan')->where('MaTK', $id)->get();
        $profile = $this->account->getUserById($id);

        return view('clients.layout.users.editprofile', compact('profile'));
    }

    public function postEditProfile(Request $request)
    {
        // dd($request);
        $request->validate([
            'Fullname' => 'required',
        ], [
            'Fullname.required' => 'Cần phải nhập đầy đủ Họ tên.'
        ]);

        if ($request->hasFile('AnhDaiDien')) {

            $file = $request->file('AnhDaiDien');
            $fileName = $file->hashName();
            $file->store('avatars', 'public');

            DB::table('taikhoan')->where('MaTK', $request->id)->update([
                'AnhDaiDien' => $fileName
            ]);
        }
        DB::table('taikhoan')->where('MaTK', $request->id)->update([
            'Fullname' => $request->Fullname,
            'GioiTinh' => $request->GioiTinh,
            'SDT' => $request->SDT,
            'Email' => $request->Email,
            'DiaChi' => $request->DiaChi,
            'Dob' => $request->Dob
        ]);
        $info = DB::table('taikhoan')->where('MaTK', $request->id)->get();

        return redirect()->route('clients.user.profile', $request->id)->with('success-edit', 'Cập nhật thông tin thành công.');
    }


    public function postChangePassword(Request $request)
    {
        $request->validate([
            'currentpass' => 'min:6',
            'newpass' => 'required|min:6',
            'enterpass' => 'required|min:6'
        ], [
            'newpass.required' => 'Bạn chưa nhập mật khẩu mới.',
            'enterpass.required' => 'Bạn chưa nhập mật khẩu mới.',
            'newpass.min' => 'Độ dài mật khẩu >= 6 ký tự.',
            'enterpass.min' => 'Độ dài mật khẩu >= 6 ký tự.',
            'currentpass.min' => 'Độ dài mật khẩu >= 6 ký tự.',
        ]);

        $pass = DB::table('taikhoan')->where('MaTK', $request->id)->select('MatKhau')->get();
        // dd($pass);
        if (Hash::check($request->currentpass, $pass[0]->MatKhau)) {
            if ($request->newpass == $request->enterpass) {
                $data = ['MatKhau' => Hash::make($request->newpass)];

                DB::table('taikhoan')->where('MaTk', $request->id)->update($data);

                Session::remove('fullname');
                Session::remove('id');
                Auth::logout();
                return redirect()->route('clients.homeClient')->with('noti', 'Đổi mật khẩu thành công. Vui lòng đăng nhập lại.');
            } else {
                return back()->with('noti-err', 'Mật khẩu mới nhập lại không đúng. Vui lòng thử lại.');
            }
        } else {
            return back()->with('noti-err', 'Mật khẩu cũ không đúng. Vui lòng thử lại.');
        }
    }


    public function cart()
    {
        $list_id = Session::get('cart-id');
        $list_idtap = Session::get('cart-idtap');
        // dd($list_id,$list_idtap);
        $list_book = [];
        if (!empty($list_idtap)) {
            foreach ($list_idtap as $key => $idtap) {
                $book = Db::table('sach')->join('sach_tap','sach_tap.MaSach','=','sach.MaSach')->where('MaTap', $idtap)->get();
                // dd($book);
                if(empty($list_id)){
                    $list_book[] = $book->all();
                }
                else{
                    if(in_array($book[0]->MaSach,$list_id) == false){
                        $list_book[] = $book->all();
                    }
                }
                
            }
        }
        if(!empty($list_id)){
            foreach($list_id as $key => $id){
                $book = Db::table('sach')->where('MaSach','=',$id)->get();
                $list_book[] = $book->all();
            }
        }
        // dd($list_book);
        return view('clients.layout.users.cart',compact('list_book'));

    }
}
