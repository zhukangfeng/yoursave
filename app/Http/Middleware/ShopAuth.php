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
        $shopUser = Session::get('ShopUser');
        if (is_null($shopUser)) {
            if ($request->ajax()) {
                return response(trans('error_messages.common.unauthorized'), 401);
            } else {
                return redirect('/');
            }            
        }
        $shopUser = ShopUser::find($shopUser->id);
        $shop = Shop::find($shopUser->shop_id);

        Session::put('ShopUser', $shopUser);
        Session::put('Shop', $shop);
        if (!is_null($shop) && !is_null($shopUser) && $shopUser->status === DB_SHOP_USERS_STATUS_EFFECTIVE) {
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
