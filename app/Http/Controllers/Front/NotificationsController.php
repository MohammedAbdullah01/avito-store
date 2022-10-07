<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{


    public function notifications()
    {
        $search = request('search');
        $supplier      = Supplier::findOrFail(Auth::guard('supplier')->user()->id);

        $notifications =  $supplier->notifications()->when($search, function ($query, $search) {
            $query->where('data', 'LIKE', '%' . $search . '%');
        })->latest()->paginate();

        return view('front.pages.suppliers.notifications_all', compact('notifications'));
    }

    public function show($id)
    {
        $supplier     = Supplier::findOrFail(Auth::guard('supplier')->user()->id);

        $notification =  $supplier->notifications()->findOrFail($id);
        $notification->markAsRead();

        return view('front.pages.suppliers.show_notifiy', compact('notification'));
    }


    public function destory($id)
    {
        $user = Supplier::firstOrFail(Auth::guard('supplier')->user()->id);
        $user->notifications()->findOrFail($id)->delete();

        Toastr::success('Successfully Deleted Notification');
        return redirect()->back();
    }
}
