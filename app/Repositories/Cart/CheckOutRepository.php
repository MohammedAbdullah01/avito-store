<?php

namespace App\Repositories\Cart;


class CheckOutRepository
{
    public function addOrder()
    {
        $request->validate([
            
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


    //         foreach ($this->cart->all() as $cart) {
    //             $order->items()->create([
    //                 'product_id'   => $cart->product_id,
    //                 'user_id'      => Auth::guard('web')->id(),
    //                 'product_name' => $cart->product->title,
    //                 'price'        => $cart->product->purchaseprice,
    //                 'quantity'     => $cart->quantity,
    //                 'supplier_id'  => $cart->product->supplier_id,
    //                 'size'         => $cart->size,
    //                 'color'        => $cart->color,
    //                 'image'        => $cart->product->main_picture,
    //             ]);

    //             $supplier = Supplier::where('id', '=', $cart->product->supplier_id)->get();
    //             Notification::send($supplier, new NewOrderCreatedNotification(
    //                 $order,
    //                 $cart->product->title,
    //                 $cart->quantity,
    //                 $cart->size,
    //                 $cart->color,
    //                 $cart->product->main_picture,
    //                 $cart->product->purchaseprice,
    //             ));

    //             $admin = Admin::first();
    //             $admin->notify(new NewOrderCreatedNotification(
    //                 $order,
    //                 $cart->product->title,
    //                 $cart->quantity,
    //                 $cart->size,
    //                 $cart->color,
    //                 $cart->product->main_picture,
    //                 $cart->product->purchaseprice,
    //             ));
    //         }

    //         $this->cart->destory();

    //         DB::commit();

    //         Toastr::success(__('Successfully Order'));
    //         return redirect()->route('user.payment.create', $order->id);
    //     } catch (Throwable $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }
}
