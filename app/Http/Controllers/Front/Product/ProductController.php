<?php

namespace App\Http\Controllers\Front\Product;

use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\CategoryRepository;

class ProductController extends Controller
{
    public function __construct(private ProductRepository $product, CategoryRepository $categoryRepo)
    {
        $this->product       = $product;
        $this->categoryRepo  = $categoryRepo;
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

    public function show($slug)
    {
        return view(
            'front.pages.suppliers.modal.edit',
            [
                'product'    => $this->product->showData($slug),
                // 'categories' => $this->categoryRepo->getAll(),

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
        return redirect()->route('supplier.profile' , Auth::guard('supplier')->user()->slug)->with('success', 'The Product Has Been Successfully Updated');
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
