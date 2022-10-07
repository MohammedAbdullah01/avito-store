<?php

namespace App\View\Components;

use App\Models\Admin;
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
    public $unredcount;


    public function __construct()
    {
        //
        $user = Auth::guard('supplier')->user();

        $notifications = $user->unreadNotifications()->latest()->limit(4)->get();

        $unredcount    = $user->unreadNotifications ()->count();

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
        return view('components.notification');
    }
}
