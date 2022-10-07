<?php

namespace App\Repositories;

use App\Models\VerifyUser;
use App\Repositories\Interfaces\AuthRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Auth implements AuthRepository
{

    public function checkLogin($request, $table, $guardName, $routRedirect)
    {
        $request->validate([
            'email' => "required|email|string|exists:$table,email",
            'password' => 'required|string',
        ]);

        $user = $request->only(['email', 'password']);

        if (FacadesAuth::guard($guardName)->attempt($user)) {

            $name = FacadesAuth::guard($guardName)->user()->slug;

            Toastr::success("Dear Sir Welcome::" . $name);
            return redirect()->route($routRedirect, $name);
        } else {

            Toastr::error('Incorrect Password');
            return redirect()->back();
        }
    }


    public function storeDataRegister($request, $ModelName, $route_verify, $user_client_id, $routredirect)
    {

        $user   =  $ModelName::create([

            'name'     => $request->post('name'),
            'slug'     => Str::slug($request->post('name')),
            'email'    => $request->post('email'),
            'password' => Hash::make($request->post('password'))

        ]);

        $last_id    = $user->id;
        $token      = $last_id . hash('sha256', Str::random(120));
        $verify_url = route($route_verify, ['token' => $token]);

        VerifyUser::create([
            $user_client_id => $last_id,
            'token'   => $token,
        ]);

        $message = "Dear Sir:: <b>" . $request->name . "
            </b> <p>Thanks For Registering, We Just Need To Check Your Email Address To Complete Your Account Press The Button Below  </p> ";

        $mail_data = [
            'recipient'    => $request->email,
            'fromEmail'    => $request->email,
            'fromName'     => $request->name,
            'subject'      => 'Email Verification ',
            'body'         => $message,
            'actionLink'   => $verify_url,
        ];

        Mail::send('mail.template-email-verification', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'])
                ->subject($mail_data['subject']);
        });
        Toastr::success('You Need Verify Your Account. We Have Sent You An Activation Link, Please Check Your Email. :) ');
        return redirect()->route($routredirect);
    }


    public function storeResetLink($request, $table, $RoutePasswordReset)
    {
        $request->validate([
            'email'    => "required|email|exists:$table,email|string",
        ]);


        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->post('email'),
            'token'      => $token,
            'created_at' => Carbon::now()
        ]);

        $action_link = route(
            $RoutePasswordReset,
            [
                'token' => $token,
                'email' => $request->post('email')
            ]
        );

        $body = "we are received a request to reset the password for<b> your app name</b> account
            associated with " . $request->email . " you can reset your password by clicking the link below";

        Mail::send('mail.email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {

            $message->from('Freelancer@example.com', 'Freelancer');
            $message->to($request->email, 'Your Name')
                ->subject('Reset Password');
        });
        Toastr::success('The Link Has Been Sent To The Email To Verify The Owner Of The Account :) ');
        return redirect()->back();
    }


    public function confirmPassword($request, $table, $ModelName, $routredirect)
    {

        $request->validate([

            'email'                 => "required|email|string|exists:$table,email",
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);


        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if ($check_token) {

            $ModelName::where('email', $request->post('email'))->update([
                'password' => Hash::make($request->post('password'))
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            Toastr::success('Successfully Your Password Has Been Change :)');
            return redirect()->route($routredirect)->with('email', $request->email);
        } else {
            Toastr::error('Invalid Token :(');
            return redirect()->back();
        }
    }

    public function logout($request, $guardName, $routRedirect)
    {
        FacadesAuth::guard($guardName)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($routRedirect);
    }


    public function verify($request, $relation, $route)
    {
        $token = $request->token;

        $verify_user = VerifyUser::where('token', $token)->first(); 

        if (!is_null($verify_user)) {

            $user = $verify_user->$relation;

            if (!$user->email_verified) {

                $user->email_verified = 1;
                $user->save();

                Toastr::success('Your Email Is Verified Successfully You Can Login :)');
                return redirect()->route($route)->with('verifiyed_email', $user->email);
            } else {
                Toastr::info('Your Email Is Already Verified  You Can Login :)');
                return redirect()->route($route)->with('verifiyed_email', $user->email);
            }
        }
    }
}
