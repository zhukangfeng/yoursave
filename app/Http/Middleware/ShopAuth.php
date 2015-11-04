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
        $shop = Session::get('Shop');
        $shopUser = Session::get('ShopUser');
        if (!is_null($shop) && !is_null($shopUser) && $shopUser->status === DB_SHOP_USERS_STATUS_EFFECTIVE) {
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
