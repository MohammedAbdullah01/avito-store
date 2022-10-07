<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        $user = $request->user();
        $notifiy_id = $request->query('notifiy_id');

        // if ($notifiy_id) { 
        //     $notification = $user->unreadNotifications()->findOrFail($notifiy_id);

        //     if ($notification) {
        //         $notification->markAsRead();
        //     }
        // }
        return $next($request);
    }
}
