<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\abstract\AuthRepositoryAbstract;
use App\Repositories\trait\SendMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthUserRepository extends AuthRepositoryAbstract
{
    use SendMail;

    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkLogin($request)
    {
        $request->validate([
            'email' => "required|email|string|exists:users,email",
            'password' => 'required|string',
        ]);

        $user = $request->only(['email', 'password']);

        if (Auth::guard('web')->attempt($user)) {

            $name = Auth::guard('web')->user()->slug;

            return redirect()->route('user.profile', $name)->with('success', "Welcome, Sir. [ $name ]");
        }
        return redirect()->back()->with('error', "Incorrect Password");
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDataRegister($request)
    {
        $request->validate([
            'firstName'             => 'required|alpha|between:4,15',
            'lastName'              => 'required|alpha|between:4,15',
            'email'                 => 'required|email|string|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ]);
        $user   =  $this->user::create([

            'firstName'  => $request->post('firstName'),
            'lastName'   => $request->post('lastName'),
            'slug'       => Str::slug($request->post('firstName').$request->post('lastName').uniqid()),
            'email'      => $request->post('email'),
            'password'   => Hash::make($request->post('password'))
        ]);

        $this->storeVerifyUser($user->id, 'user.verify', 'user_id');

        $this->sendMailVerification($request->post('firstName') . ' ' .$request->post('lastName') , $request->post('email'), $this->verify_url);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify($request)
    {
        return $this->setVerify($request->token, 'user', 'user.login');
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeResetLink($request)
    {
        $request->validate([
            'email'  => "required|email|exists:users,email|string",
        ]);

        $recipientEmail = $request->post('email');
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $recipientEmail,
            'token'      => $token,
            'created_at' => Carbon::now()
        ]);
        $routePasswordReset = $this->getRoutePasswordReset('user.password.reset',  $token, $recipientEmail);

        $this->sendMailForgotPassword($recipientEmail, $routePasswordReset);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setUpdatePassword($request)
    {
        $request->validate([

            'email'                 => "required|email|string|exists:users,email",
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = $this->getPasswordReset($request->post('email'), $request->post('token'));

        if ($check_token) {

            $this->user::where('email', $check_token->email)->update([
                'password' => Hash::make($request->post('password'))
            ]);

            $this->destroyPasswordReset($check_token->email);

            return redirect()->route('user.login')->with('success', 'Successfully Your Password Has Been Change');
        }
        return redirect()->back()->with('error', 'Invalid Token Or Email Address');
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout($request)
    {
        return $this->logoutByTheGuard($request, 'web', 'user.login');
    }
}
