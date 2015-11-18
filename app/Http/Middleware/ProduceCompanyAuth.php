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
        $produceCompanyUser = Session::get('ProduceCompanyUser');
        $produceCompanyUser = ProduceCompanyUser::find($produceCompanyUser->id);
        Session::put('ProduceCompanyUser', $produceCompanyUser);
        Session::put('ProduceCompany', ProduceCompany::find($produceCompanyUser->produce_company_id));

        if (Session::get('ProduceCompany') && Session::get('ProduceCompanyUser')) {
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
