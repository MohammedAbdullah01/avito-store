<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierProfile;

class HomeController extends Controller
{

    public function __construct(
        private ProductRepository  $products,
        private SupplierProfile    $supplierRepo,
        private CategoryRepository $categoryRepo,
        private CommentRepository  $commentRepository,
    ) {
        $this->products           = $products;
        $this->supplierRepo       = $supplierRepo;
        $this->categoryRepo       = $categoryRepo;
    }


    public function index()
    {
        $search       = request('search');

        return view(
            'front.pages.index',
            [
                'categories'    => $this->categoryRepo->getAll(),
                'products'      => $this->products->getAll($search),
                'top_products'  => $this->products->getTopProductsOrderCount()
            ]
        );
    }


    public function showProductsInCategory($slug)
    {
        $category = $this->categoryRepo->showData($slug);
        $products = $category->products()->latest()->paginate();
        return view('front.pages.products.c_products', compact('category', 'products'));
    }


    // public function getSuppliers()
    // {
    //     return $this->products->show($slug);
    // }

    public function showProduct($slug)
    {
        return view(
            'front.pages.products.single-product',
            [
                'product' => $this->products->showData($slug),
                'products' => $this->products->getRelatedProducts($slug),
                'comments' => $this->commentRepository->getCommentsToProduct($slug),
                'categories' => $this->categoryRepo->getAll(),
            ]
        );
    }
}
