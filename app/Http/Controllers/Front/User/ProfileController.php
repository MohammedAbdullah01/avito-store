<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserProfile;
use Illuminate\Http\Request;

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
                'products'  => $this->profileRepo->getMemberProduct(),
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

    public function edit()
    {
        return view(
            'front.pages.users.editProfile',
            [
                'user' => $this->profileRepo->getUser()
            ]
        );
    }

    public function update(Request $request)
    {
        $this->profileRepo->updateProfile($request);
        return redirect()->back()->with('success', 'Successfully Updated Profile');
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

    public function changePassword(Request $request)
    {
        return $this->profileRepo->changePassword($request);
    }
}
