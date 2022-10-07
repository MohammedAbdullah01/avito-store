<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Repositories\AuthUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var \App\Repositories\AuthUserRepository $authRepo
     */
    private $authRepo;


    public function __construct(AuthUserRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authRepo->storeDataRegister($request);
        return redirect()->route('user.login')
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        return  $this->authRepo->checkLogin($request);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLink(Request $request)
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
        return view('front.pages.users.auth.confirmPassword')->with(['token' => $token, 'email' => $request->email]);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmPasswordUpdate(Request $request)
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
}
