<?php

namespace App\Http\Middleware;

use App\Setting;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStudent
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
        if (Auth::guard('student')->check())
        {
            $student_at = Auth::guard('student')->user()->created_at;
            $now = Carbon::now('Asia/Ho_Chi_Minh');

            $setting = Setting::first();
            // SV được không chỉnh sửa ngành nếu now > deadline và created_at < $available
            $deadline = $setting->deadline;
            $available = $setting->available;

//            dd(Carbon::parse('2021-03-03 05:55','Asia/Ho_Chi_Minh'), Carbon::parse('2021-08-03 05:55','Asia/Ho_Chi_Minh'));

            if ($now->gte($deadline) || $student_at->lte($available)) {
                return redirect()->route('home.login')->with('error', 'Đã vượt quá thời gian chỉnh sửa ngành học!');
            }
            return $next($request);

        }

        return redirect()->route('home.login');
    }
}
