<?php
namespace App\Models;

// Model
use Illuminate\Database\Eloquent\Model as ParentModel;

// SEervices
use App;
use DB;
use Config;

/**
 * 数据库模型
 * 用户自定义模型，继承laravel内部模型
 *
 * @todo 所有模型公用函数
 */
class Model extends ParentModel
{
    /**
     * 多数据同时插入，并且加入updated_at,created_at等数据
     *
     * @param array $createData[][]
     * @return bool
     */
    public static function multiCreate($createData)
    {
        $model = new static();
        $model->updateTimestamps();
        foreach ($createData as &$data) {
            foreach (['created_at', 'updated_at'] as $key) {
                if (!array_key_exists($key, $data)) {
                    $data += [ $key => $model->serializeDate($model->asDateTime($model->{$key}))];
                }
            }
        }
        $query = $model->newQueryWithoutScopes();
        return $query->insert($createData);
    }

    /**
     * 数据库多字段搜索
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchName 要搜索的数据库字段
     * @param string $searchString 搜索数据库字段值
     * @param string int $searchType 搜索方式（0：并且；1:或者）
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public static function scopeSearchQuery($query, $searchName, $searchString, $searchType = null)
    {
        $searchString = trim($searchString);
        //エスケープ
        $searchString = str_replace('%', '\\%', $searchString);
        $searchString = str_replace('_', '\\_', $searchString);
        

        $searchData =  preg_split('/[\s|\x{3000}]+/u', $searchString);
        $query->where(function ($query) use ($searchName, $searchData, $searchType) {
            if ($searchType === Config::get('const_value.search_query_type.and', 0)) {
                // 多条件并且符合
                foreach ($searchData as $splitString) {
                    if ($splitString === '') {
                        continue;
                    }
                    if (is_array($searchName)) {
                        $query->where(function ($query) use ($searchName, $splitString) {
                            for ($i = 0; $i < count($searchName); $i++) {
                                $query->orWhere($searchName[$i], 'like', '%'.$splitString.'%');
                            }
                        });
                    } else {
                        $query->where($searchName, 'like', '%'.$splitString.'%');
                    }
                }
            } else {
                // 多条件符合一项
                foreach ($searchData as $splitString) {
                    if ($splitString == '') {
                        continue;
                    }
                    if (is_array($searchName)) {
                        foreach ($searchName as $dbName) {
                            $query->orWhere($dbName, 'like', '%' . $splitString . '%');
                        }
                    } else {
                        $query->orWhere($searchName, 'like', '%' . $splitString . '%');
                    }
                }
            }
        });
        
        return $query;
    }

    /**
     * 有效的商品
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithEffective($query, $tableName = null, $invaidValue = null)
    {
        if (is_null($tableName)) {
            $tableName = with(new static)->getTable();
        }
        if (is_null($invaidValue)) {
            $invaidValue = DB_COMMON_STATUS_INVALID;
        }
        return $query->where($tableName . '.status', '!=', $invaidValue);
    }


    /**
     * 除去意见删除的数据
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeUndeleted($query, $tableName = null)
    {
        if (!is_null($tableName)) {
            $query->whereNull($tableName . '.deleted_at');
        } else {
            $query->whereNull(with(new self)->getTable() . '.deleted_at');
        }

        return $query;
    }

    /**
     * 获得创建者的姓名拼接，区分英语，中文，日语差别
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要写，系统自动赋值>
     * @param string $createdBy 创建者数据列名称 <可选>
     * @param string $tableName join后创建者数据表名称 <可选>
     * @param string $fullname 创建者全名的名称 <可选>
     * @return \Illuminate\Database\Eloquent\Builder $query
     *
     * @author zhukangfeng
     */
    public function scopeWithCreatedUser(
        $query,
        $createdBy = 'created_by',
        $tableName = 'created_user',
        $fullname = 'created_user_fullname',
        $uname = 'created_user_uname'
    ) {
        $query->leftJoin('users AS ' . $tableName, function ($join) use ($createdBy, $tableName) {
            $join->on($createdBy, '=', $tableName . '.id')
                ->on($tableName . '.deleted_at', ' IS ', DB::raw('NULL'));
        });
        if (App::getLocale() === 'en') {
            return $query->addSelect(
                $tableName . '.u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                $tableName . '.u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }
    }

    /**
     * 获得更新者的姓名拼接，区分英语，中文，日语差别
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param string $createdBy 更新者数据列名称 <可选>
     * @param string $tableName join后创建者数据表名称 <可选>
     * @param string $fullname 更新者全名的名称 <可选>
     * @return \Illuminate\Database\Eloquent\Builder $query
     *
     * @author zhukangfeng
     */
    public function scopeWithUpdatedUser(
        $query,
        $updatedBy = 'updated_by',
        $tableName = 'updated_user',
        $fullname = 'updated_user_fullname',
        $uname = 'updated_user_uname'
    ) {
        $query->leftJoin('users AS ' . $tableName, function ($join) use ($updatedBy, $tableName) {
            $join->on($updatedBy, '=', $tableName . '.id')
                ->on($tableName . '.deleted_at', ' IS ', DB::raw('NULL'));
        });
        if (App::getLocale() === 'en') {
            return $query->addSelect(
                $tableName . 'u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                $tableName . '.u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }
    }

    /**
     * 获得负责人的姓名拼接，区分英语，中文，日语差别
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param string $createdBy 负责人数据列名称 <可选>
     * @param string $tableName join后创建者数据表名称 <可选>
     * @param string $fullname 负责人全名的名称 <可选>
     * @return \Illuminate\Database\Eloquent\Builder $query
     *
     * @author zhukangfeng
     */
    public function scopeWithResponsedUser(
        $query,
        $responseUser = 'response_user_id',
        $tableName = 'response_user',
        $fullname = 'response_user_fullname',
        $uname = 'response_user_uname'
    ) {
        $query->leftJoin('users AS ' . $tableName, function ($join) use ($responseUser, $tableName) {
            $join->on($responseUser, '=', $tableName . '.id')
                ->on($tableName . '.deleted_at', ' IS ', DB::raw('NULL'));
        });
        if (App::getLocale() === 'en') {
            return $query->addSelect(
                $tableName . '.u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                $tableName . '.u_name AS ' . $uname,
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }
    }
}
