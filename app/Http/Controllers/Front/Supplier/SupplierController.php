<?php

namespace App\Http\Controllers\Front\Supplier;

use App\Http\Controllers\Controller;
use App\Repositories\AuthSupplierRepository;
use App\Http\Requests\Supplier\CheckLoginRequest;
use App\Http\Requests\Supplier\FormForgotPasswordRequest;
use App\Http\Requests\Supplier\StoreDataRegisterRequest;
use App\Http\Requests\Supplier\StoreResetLinkRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    private $authRepo;
    private $supplier;

    public function __construct(AuthSupplierRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }


    /**
     * @param  \App\Http\Requests\Supplier\StoreDataRegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRegisterRequest $request)
    {
        $this->authRepo->storeDataRegister($request);
        return redirect()->route('supplier.login')
            ->with(['email' => $request->email,  'success' => __('You Need Verify Your Account. We Have Sent You An Activation Link, Please Check Your Email')]);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        return $this->authRepo->verify($request);
    }


    /**
     * @param  \App\Http\Requests\Supplier\CheckLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function check(CheckLoginRequest $request)
    {
        return  $this->authRepo->checkLogin($request);
    }


    /**
     * @param  \App\Http\Requests\Supplier\StoreResetLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLink(StoreResetLinkRequest $request)
    {
        $this->authRepo->storeResetLink($request);
        return redirect()->back()->with('success', 'The Link Has Been Sent To The Email To Verify The Owner Of The Account');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function showPasswordResetForm(Request $request, $token = null)
    {
        return view('front.pages.suppliers.auth.confirmPassword')->with(['token' => $token, 'email' => $request->email]);
    }


    /**
     * @param  \App\Http\Requests\Supplier\FormForgotPasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmPasswordUpdate(FormForgotPasswordRequest $request)
    {
        return $this->authRepo->setUpdatePassword($request);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        return $this->authRepo->logout($request);
    }






    // public function store(AuthRequest $request)
    // {
    //     return $this->authRepo->storeDataRegister(
    //         $request,
    //         $this->supplier,
    //         'supplier.verify',
    //         'supplier_id',
    //         'supplier.login'
    //     );
    // }

    // public function verify(Request $request)
    // {
    //     return $this->authRepo->verify(
    //         $request,
    //         'supplier',
    //         'supplier.login',
    //     );
    // }

    // public function check(Request $request)
    // {
    //     return  $this->authRepo->checkLogin(
    //         $request,
    //         'suppliers',
    //         'supplier',
    //         'supplier.profile'
    //     );
    // }


    // public function sendResetLink(Request $request)
    // {
    //     return  $this->authRepo->storeResetLink(
    //         $request,
    //         'suppliers',
    //         'supplier.password.reset',
    //     );
    // }


    // public function showPasswordResetForm(Request $request, $token = null)
    // {
    //     return view('front.pages.suppliers.auth.confirmPassword')->with(['token' => $token, 'email' => $request->email]);
    // }


    // public function confirmPasswordUpdate(Request $request)
    // {

    //     return $this->authRepo->confirmPassword(
    //         $request,
    //         'suppliers',
    //         $this->supplier,
    //         'supplier.login'
    //     );
    // }

    // public function logout(Request $request)
    // {
    //     return $this->authRepo->logout(
    //         $request,
    //         'supplier',
    //         'supplier.login'
    //     );
    // }
}
