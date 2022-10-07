<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Repositories\Interfaces\CrudRepository;
use App\Repositories\ProductRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        return view(
            'front.pages.products.products_all',
            [
                'products' => $this->productRepo->getAll()
            ]
        );
    }

    public function store(ProductStoreRequest $request)
    {
        return $this->productRepo->storeData($request);
    }

    public function update(Request $request, Product $product)
    {
        $x = $request->all();
        if (empty($x['main_picture'])) {
            $x = Arr::except($x, ['main_picture']);
        }
        dd($x);

        if ($product->supplier_id == Auth::guard('supplier')->id()) {

            return $this->product->update($request, $product->id,  Auth::guard('supplier')->id(), Null);
        } else {
            Toastr::error('You Cannot Modify The Product That Is Not Yours');
            return redirect()->back();
        }
    }

    public function destory(Product $product)
    {
        if ($product->supplier_id == Auth::guard('supplier')->id()) {

            return $this->product->destroy($product);
        } else {
            Toastr::error('You Cannot Delete The Product That Is Not Yours');
            return redirect()->back();
        }
    }
}
