<?php
namespace App\Http\Middleware;

// Models
use App\Models\ShopUser;

// Services
use Closure;
use Session;

class ShopUserOperateAuth
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
        $shopUser = Session::get('ShopUser');
        $operateShopUserId = $request->segment(3);

        if (!is_null($operateShopUserId) && $operateShopUserId !== 'create') {
            $operateShopUser = ShopUser::find($operateShopUserId);
            switch ($request->getMethod()) {
                case 'GET':
                    if (is_null($request->segment(4))) {
                        // 查看职员账户信息
                        if ($shopUser->type === DB_SHOP_USERS_TYPE_GUEST) {
                            // 商店阅览用户
                            if (is_null($operateShopUser)
                                || $operateShopUser->shop_id != $shopUser->shop_id
                                || $shopUser->id !== $operateShopUser->id) {
                                // 非所属商店账户或者商店阅览用户查看非本人账户
                                if ($request->ajax()) {
                                    return response(trans('error_messages.common.unauthorized'), 401);
                                } else {
                                    return redirect()->action('ShopUserController@index');
                                }
                            }
                        } else {
                            // 其他用户
                            if (is_null($operateShopUser)
                                || $operateShopUser->shop_id != $shopUser->shop_id) {
                                // 非所属商店账户或者商店阅览用户查看非本人账户
                                if ($request->ajax()) {
                                    return response(trans('error_messages.common.unauthorized'), 401);
                                } else {
                                    return redirect()->action('ShopUserController@index');
                                }
                            }
                        }
                    } elseif ($request->segment(4) === 'edit') {
                        // 修改职员账户信息
                        if (is_null($operateShopUser)
                            || $operateShopUser->shop_id != $shopUser->shop_id
                            || ($shopUser->type !== DB_SHOP_USERS_TYPE_ADMIN
                                && $shopUser->type >= $operateShopUser->type
                                 && $shopUser->id !== $operateShopUser->id)) {
                            // 不是自己商店的操作
                            if ($request->ajax()) {
                                return response(trans('error_messages.common.unauthorized'), 401);
                            } else {
                                return redirect()->action('ShopUserController@index');
                            }
                        }
                    }
                    break;
                case 'POST':
                    if (is_null($operateShopUser)
                        || $operateShopUser->shop_id != $shopUser->shop_id
                        || ($shopUser->type !== DB_SHOP_USERS_TYPE_ADMIN
                            && $shopUser->type >= $operateShopUser->type
                             && $shopUser->id !== $operateShopUser->id)) {
                        // 不是自己商店的操作
                        if ($request->ajax()) {
                            return response(trans('error_messages.common.unauthorized'), 401);
                        } else {
                            return redirect()->action('ShopUserController@index');
                        }
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }
        return $next($request);
    }
}
