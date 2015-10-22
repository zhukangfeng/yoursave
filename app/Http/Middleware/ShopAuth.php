<?php
namespace App\Http\Middleware;

// Models
use App\Models\Shop;
use App\Models\ShopUser;

// Services
use Closure;
use Session;

class ShopAuth
{
    /**
     * 查看是否为商店职员，不是跳转至主页.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('Shop') && Session::get('ShopUser')) {
            $user = Session::get('User');
            $shopUser = ShopUser::find($user->shop_user_id);
            Session::put('ShopUser', $shopUser);
            Session::put('Shop', Shop::find($shopUser->shop_id));
            return $next($request);
        } else {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/');
            }
        }
    }
}
