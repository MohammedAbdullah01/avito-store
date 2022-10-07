<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Repositories\Interfaces\DashboardRepository;
use Illuminate\Support\Facades\DB;

class Dashboard implements DashboardRepository

{
    public function __construct(

        private User     $UserModel,
        private Supplier $SupplierModel,
        private Category $CategoryModel,
        private Product  $ProductModel,
        private Comment  $CommentModel,
        private Order    $OrderModel
    ) {
        $this->SupplierModel = $SupplierModel;
        $this->CategoryModel = $CategoryModel;
        $this->CommentModel  = $CommentModel;
        $this->ProductModel  = $ProductModel;
        $this->OrderModel    = $OrderModel;
        $this->UserModel     = $UserModel;
    }


    public function getAllUsers()
    {
        $all_users   = $this->UserModel::latest()->limit(6)->get();
        return $all_users;
    }


    public function getAllSuppliers()
    {
        $all_suppliers  = $this->SupplierModel::where('status', 0)->latest()->limit(6)->get();
        return $all_suppliers;
    }


    public function getSuppliersNotActivate()
    {
        $productsNotActivate  = $this->ProductModel::where('activate', 0)->latest()->limit(4)->get();
        return $productsNotActivate;
    }


    public function getAllComments()
    {
        $allComments   = $this->CommentModel::with('user', 'product')->latest()->limit(6)->get();
        return $allComments;
    }


    public function getAllOrders()
    {
        $allOrders  = $this->OrderModel::with('items')->latest()->limit(8)->get();
        return $allOrders;
    }


    public function getCountActivateSupplier()
    {
        $countSuppliers  = $this->SupplierModel::where('status', 1)->count();
        return $countSuppliers;
    }


    public function getCountNotActivateSupplier()
    {
        $countSuppliersNotActive   = $this->SupplierModel::where('status', 0)->count();
        return $countSuppliersNotActive;
    }


    public function getCountUsers()
    {
        $count_users  = $this->UserModel::count();
        return $count_users;
    }


    public function getCountProductsActivate()
    {
        $count_products  = $this->ProductModel::where('activate', 1)->count();
        return $count_products;
    }


    public function getCountProductsNotActivate()
    {
        $countProductsNotActive = $this->ProductModel::where('activate', 0)->count();
        return $countProductsNotActive;
    }


    public function getCountComments()
    {
        $count_comments  = $this->CategoryModel::count();
        return $count_comments;
    }


    public function getCountCategories()
    {
        $count_categories = $this->CategoryModel::count();
        return $count_categories;
    }


    public function getChartSales()
    {
        $orders = Order::select([
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(total) as total'),
            DB::raw('COUNT(*) as count'),
        ])->groupBy(['month', 'year'])->orderBy('month')->get();
        $labels = [
            '1' => 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'
        ];
        $total = $count =  [];
        foreach ($orders as $order) {
            $total[$order->month] = $order->total;
            $count[$order->month] = $order->count;
        }
        foreach ($labels as $month => $name) {
            if (!array_key_exists($month, $total)) {
                $total[$month] = 0;
            }
            if (!array_key_exists($month, $count)) {
                $count[$month] = 0;
            }
        }
        ksort($total);
        ksort($count);

        return [

            'labels' => array_values($labels),
            'datasets' => [
                [
                    'label'           => 'Total Sales',
                    'borderColor'     => 'rgb(84 112 198)',
                    'backgroundColor' => 'rgb(84 112 198)',
                    'data'            => array_values($total)

                ], [
                    'label' => 'Orders #',
                    'borderColor'     => 'rgb(145 204 117)',
                    'backgroundColor' => 'rgb(145 204 117)',
                    'data' => array_values($count)
                ]
            ],
        ];
    }
}
