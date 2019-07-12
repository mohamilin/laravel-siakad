<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('user_type') == 'guru') {
        	return $next($request);
    		} else {
    			echo '<script type="text/javascript">alert("Anda tidak diizinkan mengakses halaman ini!");</script>';
          abort(403, 'Unauthorized action.');
    			// return redirect('/')->withError('Anda tidak memiliki akses sebagai admin');
    		}
    }
}
