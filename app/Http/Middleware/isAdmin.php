<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->input('id');

        // Kiểm tra xem email có đuôi '@admin.com'
        $isAdminId = DB::table('admin')->where('id', $id)->exists();
        if ($isAdminId) {
            return $next($request); // Cho phép tiếp tục nếu email có trong bảng 'admin'
        } else {
            return redirect()->route('login'); // Trả về lỗi 403 nếu không có trong bảng 'admin'
        }
    }
}
