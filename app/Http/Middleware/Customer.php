<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;


class Customer
{
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user())
        {
            switch ($this->auth->user()->status) {
                case true:
                    return $next($request);
                    break;
                case false:
                    $message = 'User Deactivated Contact Admin';
                    // Log the user out.
                    Auth::logout();
                    // Return them to the log in form.
                    return redirect('login')->with('message', 'User status disable Please contact admin.');
                    break;
                default:
                    return $next($request);
                    break;
            }
        }
        return $next($request);
    }
}
