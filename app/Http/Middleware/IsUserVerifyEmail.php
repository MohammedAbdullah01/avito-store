<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserVerifyEmail
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
        if (Auth::guard('web')->check()) {

            if (!Auth::guard('web')->user()->email_verified) {

                Auth::guard('web')->logout();
                return redirect()->route('user.login')
                    ->with('info', 'You Need To Confirm Your Account. We Have Sent You An Activation Link , Please Check Your Email');
            }
        }

        if (Auth::guard('supplier')->check()) {

            if (!Auth::guard('supplier')->user()->email_verified) {

                Auth::guard('supplier')->logout();
                return redirect()->route('supplier.login')
                    ->with('info', 'You Need To Confirm Your Account. We Have Sent You An Activation Link , Please Check Your Email');
            }
        }


        return $next($request);
    }
}
