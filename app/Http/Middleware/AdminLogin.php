<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        $check = Auth::guard('admin')->check();
        if($check) {
            $user = Auth::guard('admin')->user();
            if($user->is_block == 1) {
                toastr()->error('Tài khoản của bạn vô hiệu hóa!');
                return redirect('/login');
            }
            return $next($request);
        } else {
            toastr()->error('Chức năng này yêu cầu phải đăng nhập!');
            return redirect('/login');
        }
    }
}
