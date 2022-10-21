<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IProfileRepository;
use App\Repositories\trait\Uploading;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserProfile implements IProfileRepository
{
    use Uploading;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function getProfile($slug)
    {
        $user  = $this->userModel::where('slug', $slug)
            ->with('favorite')
            ->withCount('favorite')
            ->firstOrFail();
        return $user;
    }

    public function getMemberProduct()
    {
        $user             = $this->getProfile(Auth::guard('web')->user()->slug);
        $favoriteProducts = $user->favorite()->latest()->paginate();
        return $favoriteProducts;
    }

    public function updateProfile($request)
    {
        $user = $this->getUser();

        $user->update([
            'firstName'  => $request->post('firstName'),
            'lastName'   => $request->post('lastName'),
            'email'    => $request->post('email'),
            'phone'    => $request->post('phone'),
            'city'    => $request->post('city'),
            'gander'   => $request->post('gander'),
            'location' => $request->post('location'),
        ]);

        $this->uploadFile($request->File('avatar'), 'users', $user, 'avatar', 'update');
        return $user;
    }

    public function changePassword($request)
    {
        $user = $this->getUser();
        if (!Hash::check($request->post('old_password'), $user->password)) {

            return redirect()->back()->with('error', 'The Old Password Is Incorrect');
        }
        $user->update([
            'password' => Hash::make($request->post('password'))
        ]);

        Auth::guard('web')->logout();
        return redirect()->route('user.login')->with('success', 'Successfully Changed Password');
    }


    public function getOrders()
    {
        $user = $this->getUser();
        $orders = $user->orders()->with('purchasedProducts')->withCount('purchasedProducts')->latest()->paginate();
        return $orders;
    }


    // public function getInvoices()
    // {
    //     $user = $this->getUser();
    //     $invoices = $user->orders()->with('purchasedProducts')->withCount('purchasedProducts')->latest()->paginate();
    //     return $invoices;
    // }

    // public function getSubTotalInvoice()
    // {
    //     return $this->getInvoices()->groupBy('purchasedProducts.total')->sum(function ($item) {
    //         return   $subtotal =  $item->purchasedProducts->quantity * $item->purchasedProducts->price;
    //     });
    //     // return $this->getInvoices()->purchasedProducts()->sum('total');
    // }

    // public function getTotalInvoice()
    // {
    //     return $this->getSubTotalInvoice() + 50;
    // }



    public function getDetailsOrder()
    {
        $user = $this->userModel::findOrFail(Auth::guard('web')->id());
        return $user;
    }
    public function getUser()
    {
        $user = $this->userModel::findOrFail(Auth::guard('web')->id());
        return $user;
    }
}
