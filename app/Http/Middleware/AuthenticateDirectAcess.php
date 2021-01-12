<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;

	class AuthenticateDirectAcess
	{
		public function handle($request, Closure $next)
	    {
	    	if ($request->user() && $request->user()->usertype != 'admin')
	        {
	           return new Response(view('Errors.Unauthorized')->with('usertype', 'member'));
	        }
	        return $next($request);
	    }
	}
}