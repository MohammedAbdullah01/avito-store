<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Models\User;
use App\Models\VerifyUser;
use App\Repositories\abstract\AuthRepositoryAbstract;
use App\Repositories\Interfaces\SendMailRepositoryInterface;
use App\Repositories\trait\SendMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthSupplierRepository extends AuthRepositoryAbstract
{
    use SendMail;
    public $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkLogin($request)
    {
        // $request->validate([
        //     'email' => "required|email|string|exists:suppliers,email",
        //     'password' => 'required|string',
        // ]);

        $supplier = $request->only(['email', 'password']);

        if (Auth::guard('supplier')->attempt($supplier)) {

            $supplierName = Auth::guard('supplier')->user()->slug;

            return redirect()->route('user.profile', $supplierName)->with('success', "Welcome, Sir. [ $supplierName ]");
        }
        return redirect()->back()->with('error', "Incorrect Password Or Email");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDataRegister($request)
    {
        $supplier   =  $this->supplier::create([

            'name'     => $request->post('name'),
            'slug'     => Str::slug($request->post('name')),
            'email'    => $request->post('email'),
            'password' => Hash::make($request->post('password'))
        ]);

        $this->storeVerifyUser($supplier->id, 'supplier.verify', 'supplier_id');

        $this->sendMailVerification($request->post('name'), $request->post('email'), $this->verify_url);
        return $supplier;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify($request)
    {
        return $this->setVerify($request->token, 'supplier', 'supplier.login');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeResetLink($request)
    {
        // $request->validate([
        //     'email'  => "required|email|exists:suppliers,email|string",
        // ]);

        $recipientEmail = $request->post('email');
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $recipientEmail,
            'token'      => $token,
            'created_at' => Carbon::now()
        ]);
        $routePasswordReset = $this->getRoutePasswordReset('supplier.password.reset',  $token, $recipientEmail);

        $this->sendMailForgotPassword($recipientEmail, $routePasswordReset);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setUpdatePassword($request)
    {
        // $request->validate([

        //     'email'                 => "required|email|string|exists:suppliers,email",
        //     'password'              => 'required|string|min:8|confirmed',
        //     'password_confirmation' => 'required',
        // ]);

        $check_token = $this->getPasswordReset($request->post('email'), $request->post('token'));

        if (!$check_token) {
            return redirect()->back()->with('error', 'Invalid Token Or Email Address');
        }

        $this->supplier::where('email', $check_token->email)->update([
            'password' => Hash::make($request->post('password'))
        ]);

        $this->destroyPasswordReset($check_token->email);

        return redirect()->route('supplier.login')->with('success', 'Successfully Your Password Has Been Change');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout($request)
    {
        return $this->logoutByTheGuard($request, 'supplier', 'supplier.login');
    }
}
