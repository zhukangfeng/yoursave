<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'begin_time', 'end_time'];

    protected $fillable = [
        'good_id',
        'shop_id',
        'original_price',
        'discount_price',
        'collect_times',
        'figure',
        'begin_time',
        'end_time',
        'is_public',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Get last preference information from special time;
     * @param int|array $publictType preferences' public type; default null
     * @param string $beforeAt last preference time point
     * @return array (Object Preference)
     * @author Kangfeng Zhu
     */
    public function getLastPreference($publicType = null, $beforeAt = null, $showNumber = null) {
        if (is_null($publicType)) {
            $publicType = DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL;
        }
        if (is_null($beforeAt)) {
            $beforeAt = date('Y-m-d H:i:s');
        }
        if (is_null($showNumber)) {
            $showNumber = config('pages.preferences.index.default_show_number');
        }

        return  self::ofConditions([
            'begin_time' => $beforeAt,
            'begin_time_condition' => 'before',
            'public_type' => $publicType,
            'sort_conditions' => [
                'preferences.begin_at' => 'DESC'
            ]
        ])
            ->get($showNumber);

    }

    /**
     * Set preferences search conditions
     * @param $query db query
     * @param array $conditions array(
     *    'begin_time' => '2016-06-28 15:01:01'
     *    'begin_time_condition' => 'before' // before|after
     *    'end_time' => '2016-06-28 15:01:01'
     *    'end_time_condition' => 'before' // before|after
     *    'shop_name' => 'test shop'
     *    'shop_id' => 12
     *    'sort_conditions' => [
     *          'preferences.begin_at' => 'ASC' // key: sort name; value: sort type
     *      ]
     * )
     *  default []
     * @return scope
     * @author Kangfeng Zhu
     */
    public function scopeOfCondtion($query, $conditions = []) {
        if (isset($conditions['begin_time'])) {
            // preferences begin time condition
            if (
                isset($conditions['begin_time_condition']
                && $conditions['begin_time_condition'] === 'before'
            ) {
                $query->where('preferences.begin_time', '<=', $conditions['begin_time']);
            } else {
                $query->where('preferences.begin_time', '>=', $conditions['begin_time']);
            }
        }
        if (isset($conditions['end_time'])) {
            // preferences end time condition
            if (
                isset($conditions['end_time_condition']
                && $conditions['end_time_condition'] === 'before'
            ) {
                $query->where('preferences.end_time', '<=', $conditions['end_time']);
            } else {
                $query->where('preferences.end_time', '>=', $conditions['end_time']);
            }
        }

        if (isset($conditions['shop_name'])) {
            // search by shop name
            $query->leftJoin('shops', function($join) {
                $join->on('preferences.shop_id', '=', 'shops.id')
                    ->whereNotNull('preferences.shop_id');
            })
                ->where(function($query) {
                    $query->where('preferences.shop_name', 'LIKE', $conditions['shop_name'])
                        ->orWhere('shops.name', 'LIKE', $conditions['shop_name']);
                });
        }

        if (isset($conditions['shop_id'])) {
            // search by shop id
            $query->where('preferences.shop_id', '=', $conditions['shop_id']);
        }

        if (isset($condition['public_type'])) {
            if (is_array($conditions['public_type'])) {
                $query->whereIn('preferences.public_type', $conditions['public_type']);
            } eles {
                $query->where('preferences.public_type', '=', $conditions['public_type']);
            }
        }

        return $query;
    }
}
