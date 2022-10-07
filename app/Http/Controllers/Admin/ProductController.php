<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\TagsRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    private $productRepo;
    private $categoryRepo;
    private $TagRepo;

    public function __construct(ProductRepository $productRepo,  CategoryRepository $categoryRepo, TagsRepository $TagRepo)
    {
        $this->productRepo  = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->TagRepo      = $TagRepo;
    }


    public function index()
    {
        return view(
            'admin.pages.products.index',
            [
                'products'      => $this->productRepo->getAll(),
                'categories'    => $this->categoryRepo->getAll(),
                'tags'          => $this->TagRepo->getAll()
            ]
        );
    }

    public function store(Request $request)
    {
        $this->productRepo->storeData($request);
        return redirect()->back()->with('success', 'Product Created Successfully');
    }


    public function update(Request $request, Product $product)
    {
        // if ($product->admin->id === Auth::guard('admin')->id()) {
            $this->productRepo->updateData($request, $product);
            return redirect()->back()->with('success', 'Product Updated Successfully');
        // }
        // abort(404);
    }

    public function getAllInactiveProducts()
    {
        return view(
            'admin.pages.products.inactiveProducts',
            [
                'inactiveProducts' => $this->productRepo->getInactiveProducts()
            ]
        );
    }

    public function activate($id)
    {
        $this->productRepo->setProductActivate($id);
        return redirect()->back()->with('success', 'Product Activated Successfully ');
    }

    public function destroy($id)
    {
        $this->productRepo->destroyData($id);
        return redirect()->back()->with('success', 'Product Deleted Successfully ');
    }
}
