<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class SetAppLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // $local = $request->query('lang' , Session::get('lang' , 'en'));

        // Session::put('lang' , $local);

        // $accpet_languages = $request->header('accept-language');
        // $lang_arry = explode(',' , $accpet_languages);
        // $language = $lang_arry[0] ?? App::getLocale();

        // $locale = $request->route('lang' , $language);

        // $locales = ['ar' , 'en-US' , 'en'] ;

        // if(! in_array($locale , $locales)){
        //     abort(404);
        // }
        
        // App::setLocale($locale);

        // URL::defaults([
        //     'lang' => $locale
        // ]);
        // Route::current()->forgetParameter('lang');

        return $next($request);
    }
}
