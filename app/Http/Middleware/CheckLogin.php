<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::guard('web')->check())
        {
            $user = Auth::user();
            // check quyền admin && trạng thái hoạt động
            if ($user->is_active == 1 )
            {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error','Tài khoản hoặc mật khẩu không đúng!');
            }
        }

        return redirect()->route('admin.login');
    }
}
