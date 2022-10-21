<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordProfileRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Repositories\UserProfile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(private UserProfile $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function profile($slug)
    {
        return view(
            'front.pages.users.profile',
            [
                'user'      => $this->profileRepo->getProfile($slug),

            ]
        );
    }

    // {
    //     $user                = User::where('slug', $name)->firstOrFail();

    //     $favourites_products = $user->favourites()->latest()->paginate();

    //     $number_of_purchases = $user->purchasedProducts()->sum('quantity');

    //     $orderuser           = $user->orders()->with('items')->withCount('items')->latest()->paginate();

    //     return view('front.pages.users.profile', compact('user', 'favourites_products', 'number_of_purchases', 'orderuser'));
    // }

    public function dashboard()
    {
        return view(
            'front.pages.users.dashboard'
        );
    }

    public function favorite()
    {
        return view(
            'front.pages.users.favorite',
            [
                'products'  => $this->profileRepo->getMemberProduct(),
            ]
        );
    }

    public function edit()
    {
        return view(
            'front.pages.users.editProfile',
            [
                'user' => $this->profileRepo->getUser()
            ]
        );
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->profileRepo->updateProfile($request);
        return redirect()->route('user.profile' , Auth::guard('web')->user()->slug)->with('success', 'Successfully Updated Profile');
    }

    public function editPassword()
    {
        return view(
            'front.pages.users.changePasswordProfile',
            [
                'user' => $this->profileRepo->getUser()
            ]
        );
    }

    public function changePassword(ChangePasswordProfileRequest $request)
    {
        return $this->profileRepo->changePassword($request);
    }

    public function orders()
    {
        return view(
            'front.pages.users.orders',
            [
                'orders' => $this->profileRepo->getOrders()
            ]
        );
    }

    public function invoices()
    {
        return view(
            'front.pages.users.invoices',
            [
                'orders' => $this->profileRepo->getOrders(),
                // 'subTotalInvoice' => $this->profileRepo->getSubTotalInvoice(),
                // 'TotalInvoice' => $this->profileRepo->getTotalInvoice(),
            ]
        );
    }

    public function showOrder()
    {
        return view(
            'front.pages.users.showOrder',
            [
                'user' => $this->profileRepo->getUser()
            ]
        );
    }
}
