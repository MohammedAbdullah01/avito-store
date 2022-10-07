<?php

namespace App\View\Components;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminNotification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $notifications;
    public $unredcount;


    public function __construct()
    {
        $admin = Auth::guard('admin')->user();

        $notifications  = $admin->unreadNotifications()->Latest()->limit(6)->get();

        $unredcount    = $admin->unreadNotifications()->count();


        $this->unredcount    = $unredcount;
        $this->notifications = $notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-notification');
    }
}
