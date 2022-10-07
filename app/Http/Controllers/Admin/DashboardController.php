<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CrudRepository;
use App\Repositories\Interfaces\DashboardRepository;
use App\Repositories\ProductRepository;

class DashboardController extends Controller
{
    private $productRepo;
    private $DashboardRepo;

    public function __construct(ProductRepository $productRepo, DashboardRepository $DashboardRepo)
    {
        $this->productRepo = $productRepo;
        $this->DashboardRepo    = $DashboardRepo;
    }


    public function dashboard()
    {
        return view('admin.dashboard', [
            'count_users'              => $this->DashboardRepo->getCountUsers(),
            'count_suppliers'          => $this->DashboardRepo->getCountActivateSupplier(),
            'count_suppliers_notactiv' => $this->DashboardRepo->getCountNotActivateSupplier(),
            'count_products_notactiv'  => $this->DashboardRepo->getCountProductsNotActivate(),
            'count_categories'         => $this->DashboardRepo->getCountCategories(),
            'count_products'           => $this->DashboardRepo->getCountProductsActivate(),
            'count_comments'           => $this->DashboardRepo->getCountComments(),
            // 'count_tags'               => $this->DashboardRepo->getCountTags(),

            'all_users'                 => $this->DashboardRepo->getAllUsers(),
            'all_suppliers'             => $this->DashboardRepo->getAllSuppliers(),
            'products_Not_Activate'     => $this->DashboardRepo->getSuppliersNotActivate(),
            'all_comments'              => $this->DashboardRepo->getAllComments(),
            'all_orders'                => $this->DashboardRepo->getAllOrders(),
            'top_product'               => $this->productRepo->getTopProductsOrderCount()

        ]);
    }


    public function chartOrder()
    {
        return $this->DashboardRepo->getChartSales();
    }
}
