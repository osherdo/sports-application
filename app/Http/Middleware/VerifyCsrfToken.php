<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'routine_details/update_routine'
    ];
/*
    public function handle($request, App\Http\Middleware\Closure $next)
    {
        //add this condition 
    foreach($this->openRoutes as $route) {

      if ($request->is($route)) {
        return $next($request);
      }
    }
    
    return parent::handle($request, $next);
  }
*/

/*
    protected function tokensMatch($request)
    {
    	$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
    	return $request->session()->token() == $token;
    }
    */
}
