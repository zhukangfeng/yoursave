<?php
namespace App\Models;

// Model
use Illuminate\Database\Eloquent\Model as ParentModel;

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
            foreach ($model->getDates() as $key) {
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
        $query->where(function ($query) use ($searchName, $searchData) {
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
                    if (is_array($searchName)) {
                        foreach ($searchName as $dbName) {
                            $query->orWhere($dbName, $splitString);
                        }
                    } else {
                        $query->orWhere($searchData, $splitString);
                    }
                }
            }
        });
        
        return $query;
    }
}
