<?php

namespace App\Http\Controllers\Front\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ICartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    public function __construct(private ICartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->cartRepo->getCart()->count() == 0) {
            return view('front.pages.cart.emptyCart');
        }
        return view('front.pages.cart.cart', [
            'carts' => $this->cartRepo->getCart(),
            'subtotal'  => $this->cartRepo->totalCart()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->post('product_id'));
        $this->cartRepo->rules($request, $product->quantity);
        $this->cartRepo->addCart(
            $product,
            $request->post('product_quantity'),
            $request->post('size'),
            $request->post('color'),
        );
        return redirect()
            ->route('user.cart.index')
            ->with('success', 'The Product Has Been Stored From The Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, $id)
    {
        $product = Product::findOrFail($request->post('product_id'));
        $this->cartRepo->setCart(
            $product,
            $id,
            $request->post('product_quantity'),
        );
        return redirect()
            ->back()
            ->with('success', 'The Product Has Been Updated From The Cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->cartRepo->deleteProductInCart($id);
        return redirect()
            ->back()
            ->with('success', 'The Product Has Been Deleted From The Cart');
    }
    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function  destroy()
    {
        $this->cartRepo->emptyCart();
        return redirect()
            ->back()
            ->with('success', 'The Shopping Cart Has Been Completely Deleted');
    }
}
