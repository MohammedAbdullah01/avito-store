<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IProfileRepository;
use App\Repositories\trait\Uploading;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Supplier;

class SupplierProfile implements IProfileRepository
{
    use Uploading;

    public function __construct(Supplier $supplierModel)
    {
        $this->supplierModel = $supplierModel;
    }

    public function getSuppliersActivate()
    {
        $suppliers = $this->supplierModel::where('status', 1)->with('products')
            ->withCount('products')->latest()->paginate();
        return $suppliers;
    }

    public function getSuppliersInActive()
    {
        $suppliers = $this->supplierModel::where('status', 0)->with('products')
            ->withCount('products')->latest()->paginate();
        return $suppliers;
    }

    public function setSupplierInActive($id)
    {
        $supplier = $this->supplierModel::findOrFail($id);
        $supplier->update([
            'status' => 1
        ]);
        return $supplier;
    }

    public function getProfile($slug)
    {
        $supplier  = $this->supplierModel::where('slug', $slug)
            ->with('products', 'notifications', 'orderSupplierProduct')
            ->withCount('products')
            ->firstOrFail();
        return $supplier;
    }

    public function getMemberProduct()
    {
        $products = $this->getProfile(Auth::guard('supplier')->user()->slug)
            ->products()
            ->with('ratings')
            ->latest()
            ->paginate();
        return $products;
    }

    public function getProductsSold()
    {
        $productSold =  $this->getProfile(Auth::guard('supplier')->user()->slug)
            ->orderProducts()
            ->select(
                'product_name',
                'product_id',
                'price',
                DB::raw('count(*) as product_count'),
                DB::raw('SUM(quantity) as sales '),
                DB::raw('SUM(price * quantity ) as total ')
            )
            ->groupBy('product_name', 'product_id', 'price')
            ->orderBy('price', 'DESC')
            ->paginate(2);
        return $productSold;
    }

    public function getSubTotal()
    {
        $subTotal = $this->getProfile(Auth::guard('supplier')->user()->slug)
            ->orderProducts()
            ->select(DB::raw('SUM(price * quantity ) as the_total_amount '))
            ->first();
        return $subTotal;
    }

    public function updateProfile($request)
    {
        $supplier = $this->getSupplier();

        $supplier->update([
            'name'     => $request->post('name'),
            'slug'     => Str::slug($request->post('name')),
            'phone'    => $request->post('phone'),
            'gander'   => $request->post('gander'),
            'location' => $request->post('location'),
            'about'    => $request->post('about')
        ]);

        $this->uploadFile($request->File('avatar'), 'Suppliers', $supplier, 'avatar', 'update');
        return $supplier;
    }


    public function changePassword($request)
    {

        $supplier = $this->getSupplier();
        if (!Hash::check($request->post('old_password'), $supplier->password)) {

            return redirect()->back()->with('error', 'The Old Password Is Incorrect');
        }
        $supplier->password = Hash::make($request->post('password'));
        $supplier->save();

        Auth::guard('supplier')->logout();

        return true;
    }

    public function destroySupplier($id)
    {
        $supplier = $this->supplierModel::findOrFail($id);
        $supplier->forceDelete();
        $this->checkTheExistingFileToDelete('suppliers', $supplier->avatar);
        return $supplier;
    }


    public function getSupplier()
    {
        $supplier = $this->supplierModel::findOrFail(Auth::guard('supplier')->id());
        return $supplier;
    }
}
