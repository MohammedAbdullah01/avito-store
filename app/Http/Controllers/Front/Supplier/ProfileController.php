<?php

namespace App\Http\Controllers\Front\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\ChangePasswordProfileRequest;
use App\Http\Requests\Supplier\UpdateProfileRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\SupplierProfile;

class ProfileController extends Controller
{

    public function __construct(private SupplierProfile $profileRepo, private CategoryRepository $categoryRepository)
    {
        $this->profileRepo        = $profileRepo;
        $this->categoryRepository = $categoryRepository;
    }


    public function profile($slug)
    {
        return view(
            'front.pages.suppliers.profile',
            [
                'supplier'      => $this->profileRepo->getProfile($slug),
                'categories'    => $this->categoryRepository->getAll(),
                'products'      => $this->profileRepo->getMemberProduct(),
                'orderProducts' => $this->profileRepo->getProductsSold(),
                'subtotal'      => $this->profileRepo->getSubTotal()
            ]
        );

        // $supplier      = Supplier::where('slug', $name)->with('products', 'notifications', 'orderSupplierProduct')->withcount('products')->firstOrFail();

        // $products      = $supplier->products()->with('ratings')->latest()->paginate();

        // $orderProducts = $supplier->orderProducts()->select(
        //     'product_name',
        //     'product_id',
        //     'price',
        //     DB::raw('count(*) as product_count'),
        //     DB::raw('SUM(quantity) as sales '),
        //     DB::raw('SUM(price * quantity ) as total ')
        // )->groupBy('product_name', 'product_id', 'price')->orderBy('price', 'DESC')->paginate(2);

        // $subtotal = $supplier->orderProducts()->select(DB::raw('SUM(price * quantity ) as the_total_amount '))->first();


    }

    public function edit()
    {
        return view('front.pages.suppliers.editProfile' ,
        [
            'supplier' => $this->profileRepo->getSupplier()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->profileRepo->updateProfile($request);
        return redirect()->back()->with('success', 'Successfully Updated Profile');
    }

    public function changePassword(ChangePasswordProfileRequest $request)
    {
        $this->profileRepo->changePassword($request);
        return redirect()->route('supplier.login')->with('success', 'Successfully Changed Password');
    }
}
