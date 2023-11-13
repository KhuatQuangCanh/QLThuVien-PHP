<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckRuleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('loaiTk') && (Session::get('loaiTk') == 'Admin,Nhân viên' || Session::get('loaiTk')=='Admin' || Session::get('loaiTk')=='Nhân viên')) {
            return $next($request);
        }
        return redirect()->route('clients.homeClient')->with('err-rule', 'Bạn không có quyền truy cập. Hãy liên hệ với quả quản lý để biết thêm thông tin chi tiết.');
    }
}
