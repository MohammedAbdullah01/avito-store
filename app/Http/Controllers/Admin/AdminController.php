<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public $admin;

    public function __construct( Admin $admin)
    {
        $this->admin = $admin;
    }


    public function adminLoginCheck(Request $request)
    {

        $admin = $request->only(['email', 'password']);

        if (!Auth::guard('admin')->attempt($admin)) {

            return redirect()->back()->with('error', "Incorrect Password Or Email");
        }
        $adminName = Auth::guard('admin')->user()->name;

        return redirect()->route('admin.dashboard')->with('success', "Welcome, Sir. [ $adminName ]");
    }


    public function getNotifications()
    {
        $admin         = $this->admin::findOrFail(Auth::guard('admin')->id());
        $notifications = $admin->notifications()->latest()->paginate();

        return view('admin.notifications', compact('notifications'));
    }


    public function show($id)
    {
        $admin        = $this->admin::findOrFail(Auth::guard('admin')->user()->id);

        $notification =  $admin->notifications()->findOrFail($id);
        $notification->markAsRead();

        return view('admin.show_notifiy', compact('notification'));
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
