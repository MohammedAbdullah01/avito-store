<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Supplier;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationAsRead
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
        $notification_id = $request->query('notification_id');

        if ($notification_id) {

            if (Auth::guard('supplier')->check()) {
                $this->getUser('supplier', $notification_id);
            }
            if (Auth::guard('web')->check()) {
                $this->getUser('web', $notification_id);
            }
            if (Auth::guard('admin')->check()) {
                $this->getUser('admin', $notification_id);
            }
        }
        return $next($request);
    }

    private function getUser($guardName, $notification_id)
    {
        $user         = Auth::guard($guardName)->user();
        $notification = $user->notifications()->findOrFail($notification_id);
        if ($notification) {
            $notification->markAsRead();
        }
    }
}
