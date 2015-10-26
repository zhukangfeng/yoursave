<?php
namespace App\Http\Middleware;

// Models
use App\Models\ProduceCompany;
use App\Models\ProduceCompanyUser;

// Services
use Closure;
use Session;

class ProduceCompanyAuth
{
    /**
     * 查看是否为生产厂家职员，不是跳转至主页.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('ProduceCompany') && Session::get('ProduceCompanyUser')) {
            $user = Session::get('User');
            $produceCompanyUser = ProduceCompanyUser::find($user->produce_company_user_id);
            Session::put('ProduceCompanyUser', $produceCompanyUser);
            Session::put('ProduceCompany', ProduceCompany::find($produceCompanyUser->produce_company_id));

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
