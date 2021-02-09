<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
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
        $id = $request->server('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        $logacesso = new LogAcesso();
        $logacesso->create(['log' => "$id requisitou a $rota"]);
        return $next($request);
    }
}
