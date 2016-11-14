<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      // $pos=strpos($request->route()->getName(),'pedidos');
      // dd($pos !== false);
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        else
        {
          if(strpos($request->route()->getName(),'pedidos') !== false || strpos($request->route()->getName(),'cupons') !== false || strpos($request->route()->getName(),'citas') !== false)
          {
            if($request->user()->tipo_usuario == 'administrador' || $request->user()->tipo_usuario == 'vendedor' )
            {
              return $next($request);
            }
            else
            {
              return redirect('/');
            }
          }
          if(strpos($request->route()->getName(),'user') !== false || strpos($request->route()->getName(),'cliente') !== false )
          {
            if($request->user()->tipo_usuario == 'administrador')
            {
              return $next($request);
            }
            else
            {
              return redirect('/');
            }
          }
          if(strpos($request->route()->getName(),'colors') !== false || strpos($request->route()->getName(),'marcas') !== false || strpos($request->route()->getName(),'modelos') !== false || strpos($request->route()->getName(),'almacens') !== false || strpos($request->route()->getName(),'compras') !== false)
          {
            if($request->user()->tipo_usuario == 'administrador' || $request->user()->tipo_usuario == 'comprador' )
            {
              return $next($request);
            }
            else
            {
              return redirect('/');
            }
          }
          if(strpos($request->route()->getName(),'produccion') !== false)
          {
            if($request->user()->tipo_usuario == 'administrador' || $request->user()->tipo_usuario == 'productor' )
            {
              return $next($request);
            }
            else
            {
              return redirect('/');
            }
          }
          if(strpos($request->route()->getName(),'instalacion') !== false)
          {
            if($request->user()->tipo_usuario == 'administrador' || $request->user()->tipo_usuario == 'instalador' )
            {
              return $next($request);
            }
            else
            {
              return redirect('/');
            }
          }
        }
        //return $next($request);
    }
}
