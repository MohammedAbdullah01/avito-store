<?php

namespace App\Http\Controllers\Front\Cart;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ICartRepository;
use App\Http\Requests\Cart\CheckOutRequest;
use Symfony\Component\Intl\Countries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Supplier;
use Throwable;

class CheckOutController extends Controller
{
    public function __construct(private ICartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function createCheckout()
    {
        if ($this->cartRepo->getCart()->count() == 0) {
            return view('front.pages.cart.emptyCart');
        }
        return view('front.pages.cart.checkout', [
            'cart'      => $this->cartRepo,
            'user'      =>  Auth::user(),
            'countries' => Countries::getNames(App::getLocale())
        ]);
    }

    public function store(CheckOutRequest $request)
    {
        $items = $this->cartRepo->getCart();
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id'        => Auth::guard('web')->id(),
                'payment_method' => $request->post('payment_method'),
                'total'          => $this->cartRepo->totalCart(),
            ]);

            foreach ($items as  $cart_items) {

                $order->orderItems()->create([
                    'user_id'      => $order->user_id,
                    'product_id'   => $cart_items->product_id,
                    'supplier_id'  => $cart_items->product->supplier->id,
                    'product_name' => $cart_items->product->title,
                    'price'        => $cart_items->product->purchase_price,
                    'quantity'     => $cart_items->product_quantity,
                    'total'        => $cart_items->product_quantity * $cart_items->product->purchase_price,
                    'size'         => $cart_items->size,
                    'color'        => $cart_items->color,
                ]);
            }

            foreach ($request->post('address') as $type => $address) {
                $address['type'] = $type;
                $order->addresses()->create($address);
            }


            DB::commit();

            event(new OrderCreated($order));

            return view('front.pages.cart.confirmation');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
