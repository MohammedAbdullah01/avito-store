<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CheckOutRequest;
use App\Models\Order;
use App\Models\orderProduct;
use App\Repositories\Interfaces\ICartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckOutController extends Controller
{
    public function __construct(private ICartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function createCheckout()
    {
        if($this->cartRepo->getCart()->count() == 0)
        {
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
        $items = $this->cartRepo->getCart()->groupBy('product.supplier_id');
        // $items->groupBy('product.supplier_id');
        DB::beginTransaction();
        try {
            foreach($items as $supplier_id => $cart_items)
            {
            $order = Order::create([
                'supplier_id' => $supplier_id ,
                'user_id' => Auth::id(),
                'payment_method' => $request->post('payment_method'),
                'total' => $this->cartRepo->totalOneProduct($items),
            ]);

            foreach ($cart_items as $item) {
                $order->orderItems()->create([
                    'user_id' => $order->user_id,
                    'product_id' => $item->product_id,
                    // 'supplier_id' => '',
                    'product_name' => $item->product->title,
                    'price' => $item->product->purchase_price,
                    'quantity' => $item->product_quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                    // 'image' => '',
                ]);
            }
            foreach ($request->post('address') as $type => $address) {
                $address['type'] = $type;
                $order->addresses()->create($address);
            }
        }
        $this->cartRepo->emptyCart();
            DB::commit();
            return view('front.pages.cart.confirmation');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
