<?php

namespace App\Http\Controllers\Front\Product;

use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(private ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return view(
            'front.pages.products.products_all',
            [
                'products' => $this->product->getAll(request('search'))
            ]
        );
    }

    public function store(Request $request)
    {
        $this->product->storeData($request);
        return redirect()->back()->with('success', 'The Product Has Been Successfully Stored');
    }

    public function update(Request $request, Product $product)
    {
        if ($product->supplier_id <> Auth::guard('supplier')->id()) {

            return redirect()->back()->with('error', 'You Cannot Update The Product');
        }
        $this->product->updateData($request, $product->id);
        return redirect()->back()->with('success', 'The Product Has Been Successfully Updated');
    }

    public function destroy(Product $product)
    {
        if ($product->supplier_id <> Auth::guard('supplier')->id()) {

            return redirect()->back()->with('error', 'You Cannot Delete The Product');
        }
        $this->product->destroyData($product->id);
        return redirect()->back()->with('success', 'The Product Has Been Successfully Deleted');
    }
}
