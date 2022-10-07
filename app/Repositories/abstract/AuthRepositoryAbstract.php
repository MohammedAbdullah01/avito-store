<?php

namespace App\Repositories\abstract;

use App\Models\VerifyUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

abstract class AuthRepositoryAbstract
{
    protected $verify_url;

    abstract public function checkLogin($request);

    abstract public function storeDataRegister($request);

    abstract public function storeResetLink($request);

    /**
     * @param int $id
     * @param string $nameRouteVerify
     * @param string $columnName
     * @return void
     */
    protected function storeVerifyUser(int $id, string $nameRouteVerify, string $columnName)
    {
        $last_id          = $id;
        $token            = $last_id . hash('sha256', Str::random(120));
        $this->verify_url = route($nameRouteVerify, ['token' => $token]);

        VerifyUser::create([
            $columnName => $last_id,
            'token'     => $token,
        ]);
    }

    /**
     * @param  string $token
     * @param  string $recipientEmail
     * @return string $routePasswordReset
     */
    protected function getRoutePasswordReset(string $routeName, string $token, string $recipientEmail)
    {
        $routePasswordReset = route(
            $routeName,
            [
                'token' => $token,
                'email' => $recipientEmail
            ]
        );
        return $routePasswordReset;
    }

    /**
     * @param  string $email
     * @param  string $token
     * @return Collection $check_token
     */
    protected function getPasswordReset(string $email, string $token)
    {
        $check_token = DB::table('password_resets')->where([
            'email' => $email,
            'token' => $token,
        ])->first();
        return $check_token;
    }

    protected function destroyPasswordReset(string $email)
    {
        DB::table('password_resets')->where([
            'email' => $email
        ])->delete();
    }


    public function confirmPassword($request)
    {
    }

    protected function getVerify($token)
    {
        $verify_user = VerifyUser::where('token', $token)->first();
        return $verify_user;
    }

    /**
     * @param Request $request
     * @param string $relation
     * @param string $route
     */
    protected function setVerify($token, string $relation, string $route)
    {
        $verify_user =  $this->getVerify($token);
        if (!is_null($verify_user)) {

            $user = $verify_user->$relation;

            if (!$user->email_verified) {

                $user->email_verified = 1;
                $user->save();

                return redirect()->route($route)
                    ->with('success', 'Your Email Is Verified Successfully You Can Login');
            }
            return redirect()->route($route)
                ->with('info', 'Your Email Is Already Verified  You Can Login');
        }
    }

    protected function logoutByTheGuard($request, $guardName, $routRedirect)
    {

        Auth::guard($guardName)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($routRedirect);
    }
}
