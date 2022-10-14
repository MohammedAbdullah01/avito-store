<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\User;
use App\Notifications\NewOrderCreatedNotification;
use App\Repositories\Interfaces\CartRepository as InterfacesCartRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Throwable;
use Symfony\Component\Intl\Countries;

// use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
class CartController extends Controller
{
    protected $cart;
    public function __construct(InterfacesCartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $tax_ratio = 14;
        $tax = $this->cart->total() * $tax_ratio / 100;
        $totals = $this->cart->total() + $tax;

        return view('front.pages.cart.cart', [
            'carts'     => $this->cart->all(),
            'subtotal'  => $this->cart->total(),
            'tax_ratio' => $tax_ratio,
            'tax'       => $tax,
            'totals'    => $totals,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity'   => ['integer', 'min:1', 'max:15'],
            'size'       => ['required'],
            'color'      => ['required', 'string'],
        ]);
        $item = $this->cart->add(
            $request->post('product_id'),
            $request->post('quantity', 1),
            $request->post('supplier_id'),
            $request->post('size'),
            $request->post('color'),
        );
        Toastr::success('Successfully Added To Cart');
        return redirect()->back();
    }


    public function createCheckout()
    {
        return view('front.pages.cart.checkout', [

            'cart'      => $this->cart,
            'user'      => Auth::check() ? Auth::user() : new User(),
            'countries' => Countries::getNames(App::getLocale())
        ]);
    }


    public function storeCheckout(Request $request)
    {
        $request->validate([
            'first_name'  => 'required|string|between:6,max',
            'email'       => 'required|email',
            'phone'       => 'required',
            'address'     => 'required',
            'city'        => 'required',
            'post_alcode' => 'required',
            'country'     => 'required'
        ]);
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id'     => Auth::guard('web')->id(),
                'total'       => $this->cart->total(),
                'first_name'  => $request->post('first_name'),
                'last_name'   => $request->post('last_name'),
                'email'       => $request->post('email'),
                'phone'       => $request->post('phone'),
                'address'     => $request->post('address'),
                'city'        => $request->post('city'),
                'post_alcode' => $request->post('post_alcode'),
                'country'     => $request->post('country')
            ]);


            foreach ($this->cart->all() as $cart) {
                $order->items()->create([
                    'product_id'   => $cart->product_id,
                    'user_id'      => Auth::guard('web')->id(),
                    'product_name' => $cart->product->title,
                    'price'        => $cart->product->purchaseprice,
                    'quantity'     => $cart->quantity,
                    'supplier_id'  => $cart->product->supplier_id,
                    'size'         => $cart->size,
                    'color'        => $cart->color,
                    'image'        => $cart->product->main_picture,
                ]);

                $supplier = Supplier::where('id', '=', $cart->product->supplier_id)->get();
                Notification::send($supplier, new NewOrderCreatedNotification(
                    $order,
                    $cart->product->title,
                    $cart->quantity,
                    $cart->size,
                    $cart->color,
                    $cart->product->main_picture,
                    $cart->product->purchaseprice,
                ));

                $admin = Admin::first();
                $admin->notify(new NewOrderCreatedNotification(
                    $order,
                    $cart->product->title,
                    $cart->quantity,
                    $cart->size,
                    $cart->color,
                    $cart->product->main_picture,
                    $cart->product->purchaseprice,
                ));
            }

            $this->cart->destory();

            DB::commit();

            Toastr::success(__('Successfully Order'));
            return redirect()->route('user.payment.create', $order->id);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }


    public function destroy()
    {
        $this->cart->destory();
        Toastr::success('The Successfully Removed The Cart');
        return redirect()->back();
    }

    public function productcartDestory($id)
    {
        $this->cart->cartProductDestory($id);
        Toastr::success('The Product Has Been Successfully Removed From The Cart');
        return redirect()->back();
    }
}
