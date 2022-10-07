<?php

namespace App\Repositories\Interfaces;

interface DashboardRepository
{
    public function getAllUsers();

    public function getAllSuppliers();

    public function getSuppliersNotActivate();

    public function getAllComments();

    public function getAllOrders();

    public function getCountActivateSupplier();

    public function getCountNotActivateSupplier();

    public function getCountUsers();

    public function getCountProductsActivate();

    public function getCountProductsNotActivate();

    public function getCountComments();

    public function getCountCategories();

    public function getChartSales();
}
