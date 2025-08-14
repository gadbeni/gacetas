<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class System
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
        // 1. Siempre deja pasar assets y rutas críticas
        $open = [
            'admin/login',
            'admin/logout',
            'admin/password/*',
            'admin/voyager-assets*',
            '/',
        ];
        if ($request->is($open)) {
            return $next($request);
        }
        // 2. Verificar modo mantenimiento
        if (setting('configuracion.maintenance') === '1') {   
            // 3. Permitir acceso SOLO a admins AUTENTICADOS
            if (auth()->check() && auth()->user()->hasRole(['admin', 'Administrador'])) {
                return $next($request);
            }
            // 4. BLOQUEAR a todos los demás (incluye usuarios NO logueados)
            return response()->view('errors.503', [], 503);
        }
        return $next($request);
    }
}
