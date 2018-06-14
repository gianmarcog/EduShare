<?php

namespace App\Http\Middleware;

use App\role;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (empty($user)) {
            return redirect('/')->withErrors(['Du bist nicht autorisiert auf diese Seite zuzugreifen.', 'msg']);
        }
        $role = role::where('user_id', '=', $user->id)->first();

        if ($role->role === 1) {
            return $next($request);
        }

        return redirect('/')->withErrors(['Du bist nicht autorisiert auf die Admin Seite zuzugreifen.', 'msg']);
    }
}
