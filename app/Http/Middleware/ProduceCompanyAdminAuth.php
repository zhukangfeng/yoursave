<?php
namespace App\Http\Middleware;

// Services
use Closure;
use Session;

class ProduceCompanyAdminAuth
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
        if (Session::get('ProduceCompanyUser')->type === DB_SHOP_USERS_TYPE_ADMIN) {
            return $next($request);
        } else {
            if ($request->ajax()) {
                return response(trans('error_messages.common.unauthorized'), 401);
            } else {
                return redirect('/');
            }
        }
    }
}
