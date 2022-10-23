<?php

namespace App\View\Components;

use App\Models\Admin;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $notifications;
    public $unreadCount;


    public function __construct()
    {
        //
        // $user = Auth::guard('supplier')->user();

        if (Auth::guard('supplier')->check()) {

            $user = Supplier::where('id', Auth::guard('supplier')->user()->id)->first();

            $notifications = $user->notifications()->latest()->limit(10)->get();
            $unreadCount   = $user->unreadNotifications()->count();
            
        } elseif (Auth::guard('web')->check()) {
            $user = User::where('id', Auth::guard('web')->user()->id)->first();

            $notifications = $user->notifications()->latest()->limit(10)->get();
            $unreadCount   = $user->unreadNotifications()->count();

        } elseif (Auth::guard('admin')->check()) {
            $user = User::where('id', Auth::guard('admin')->user()->id)->first();

            $notifications = $user->notifications()->latest()->limit(10)->get();

            $unreadCount   = $user->unreadNotifications()->count();
        }

        $this->unreadCount   = $unreadCount;
        $this->notifications = $notifications;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
