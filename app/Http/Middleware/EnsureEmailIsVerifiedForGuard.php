<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerifiedForGuard
{
    protected $guard;

    public function __construct($guard = null)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $guard = $guard ?? $this->guard;

        if (!Auth::guard($guard)->check()) {
            return redirect()->route("{$guard}.login");
        }
        
        /** @var Authenticatable&\Illuminate\Contracts\Auth\MustVerifyEmail|null $user */
        $user = Auth::guard($guard)->user();

        if (!$user || !$user->hasVerifiedEmail()) {
            return redirect()->route("{$guard}.verification.notice");
        }

        return $next($request);
    }
}
