<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileRepo;
    private $user;


    // public function __construct(ProfileRepository $profileRepo,  User $user)
    // {
    //     $this->profileRepo = $profileRepo;
    //     $this->user = $user;
    // }

    public function profile($name)
    {
        $user                = User::where('slug', $name)->firstOrFail();

        $favourites_products = $user->favourites()->latest()->paginate();

        $number_of_purchases = $user->purchasedProducts()->sum('quantity');

        $orderuser           = $user->orders()->with('items')->withCount('items')->latest()->paginate();

        return view('front.pages.users.profile', compact('user', 'favourites_products', 'number_of_purchases', 'orderuser'));
    }

    public function update(Request $request)
    {
        return $this->profileRepo->updateProfile('web', $request, "users", $this->user, 'users');
    }

    public function changePassword(Request $request)
    {
        return $this->profileRepo->changePassword($request, $this->user, 'web', 'user.login');
    }
}
