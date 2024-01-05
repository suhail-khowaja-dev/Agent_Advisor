<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
class Admin_Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        $User_role = auth()->user()->type;
            if($User_role != 3 )
            {
            return redirect('/agent_advisor');
            }
        }else
            {
          // return redirect()->back();
              return  redirect('/agent_advisor');
            }

    $response = $next($request);
   $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','no-cache');
        $response->headers->set('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
        return $response;


    }
}
