<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Repositories\SupplierProfile;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    public function __construct(private SupplierProfile $supplierRepo)
    {
        $this->supplierRepo = $supplierRepo;
    }
    public function index()
    {
        return view(
            'admin.pages.suppliers.index',
            [
                'suppliers' => $this->supplierRepo->getSuppliersActivate(),
            ]
        );
    }

    public function inActive()
    {
        return view(
            'admin.pages.suppliers.is_not_activate',
            [
                'suppliers' => $this->supplierRepo->getSuppliersInActive
            ]
        );
    }

    public function activateSupplier($id)
    {
        $this->supplierRepo->setSupplierInActive($id);
        return redirect()->back()->with('success', 'Supplier Activated Successfully');
    }
    public function destroy($id)
    {
        $this->supplierRepo->destroySupplier($id);
        return redirect()->back()->with('success', 'Supplier Deleted Successfully');
    }
}
