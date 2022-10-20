<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

use App\Models\Cookie as CookieModel;
use App\Repositories\CookieRepository;

class EnsureUserHasCookie
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
        $cookie_value = $request->cookie("c_id");
        if ( !is_null($cookie_value) && $user_cookie = CookieRepository::whereCookie($cookie_value) ) 
        {
            # cookie defined, user retrived
        }else{
            $cookie_value = md5(time());
            CookieRepository::newUser($cookie_value);
        }
        return $next($request)
            ->withCookie(cookie()->forever('c_id', $cookie_value));
    }
}
