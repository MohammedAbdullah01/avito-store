<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckOutRequest;
use App\Repositories\Interfaces\ICartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;

class CheckOutController extends Controller
{
    public function __construct(private ICartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function createCheckout()
    {
        return view('front.pages.cart.checkout', [

            'cart'      => $this->cartRepo,
            'user'      =>  Auth::user(),
            'countries' => Countries::getNames(App::getLocale())
        ]);
    }

    public function store(CheckOutRequest $request)
    {
    }
}
