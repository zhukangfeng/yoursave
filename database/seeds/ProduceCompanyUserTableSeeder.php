<?php

use App\Models\ProduceCompanyUser;
use App\Models\User;

use Illuminate\Database\Seeder;

class ProduceCompanyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produce_company_users')->delete();

        $produceCompanyUserData = [];
        
        // 生产厂家1
        // 生产厂家1管理员
        $produceCompanyUserData[] = [
            'id'    => 1,
            'produce_company_id'    => 1,
            'user_id'   => 17,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_ADMIN,
            'created_by'    => 17,
            'updated_by'    => 17,
        ];
        // 生产厂家1经理1
        $produceCompanyUserData[] = [
            'id'    => 2,
            'produce_company_id'    => 1,
            'user_id'   => 18,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER,
            'created_by'    => 17,
            'updated_by'    => 17,
        ];
        // 生产厂家1经理2
        $produceCompanyUserData[] = [
            'id'    => 3,
            'produce_company_id'    => 1,
            'user_id'   => 19,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER,
            'created_by'    => 17,
            'updated_by'    => 17,
        ];
        // 生产厂家1普通用户1
        $produceCompanyUserData[] = [
            'id'    => 4,
            'produce_company_id'    => 1,
            'user_id'   => 20,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 18,
            'updated_by'    => 18,
        ];
        // 生产厂家1普通用户2
        $produceCompanyUserData[] = [
            'id'    => 5,
            'produce_company_id'    => 1,
            'user_id'   => 21,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 18,
            'updated_by'    => 18,
        ];
        // 生产厂家1普通用户3
        $produceCompanyUserData[] = [
            'id'    => 6,
            'produce_company_id'    => 1,
            'user_id'   => 22,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 19,
            'updated_by'    => 19,
        ];
        // 生产厂家1普通用户4
        $produceCompanyUserData[] = [
            'id'    => 7,
            'produce_company_id'    => 1,
            'user_id'   => 23,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 19,
            'updated_by'    => 19,
        ];

        // 生产厂家2
        // 生产厂家2管理员
        $produceCompanyUserData[] = [
            'id'    => 8,
            'produce_company_id'    => 2,
            'user_id'   => 24,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_ADMIN,
            'created_by'    => 24,
            'updated_by'    => 24,
        ];
        // 生产厂家2经理1
        $produceCompanyUserData[] = [
            'id'    => 9,
            'produce_company_id'    => 2,
            'user_id'   => 25,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER,
            'created_by'    => 24,
            'updated_by'    => 24,
        ];
        // 生产厂家2经理2
        $produceCompanyUserData[] = [
            'id'    => 10,
            'produce_company_id'    => 2,
            'user_id'   => 26,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER,
            'created_by'    => 24,
            'updated_by'    => 24,
        ];
        // 生产厂家2普通用户1
        $produceCompanyUserData[] = [
            'id'    => 11,
            'produce_company_id'    => 2,
            'user_id'   => 27,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 25,
            'updated_by'    => 25,
        ];
        // 生产厂家2普通用户2
        $produceCompanyUserData[] = [
            'id'    => 12,
            'produce_company_id'    => 2,
            'user_id'   => 28,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 25,
            'updated_by'    => 25,
        ];
        // 生产厂家2普通用户3
        $produceCompanyUserData[] = [
            'id'    => 13,
            'produce_company_id'    => 2,
            'user_id'   => 29,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 26,
            'updated_by'    => 26,
        ];
        // 生产厂家2普通用户4
        $produceCompanyUserData[] = [
            'id'    => 14,
            'produce_company_id'    => 2,
            'user_id'   => 30,
            'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE,
            'type'      => DB_PRODUCE_COMPANY_USERS_TYPE_COMMON,
            'created_by'    => 26,
            'updated_by'    => 26,
        ];

        ProduceCompanyUser::multiCreate($produceCompanyUserData);
        User::where('id', 17)->update(['produce_company_user_id' => 1]);
        User::where('id', 18)->update(['produce_company_user_id' => 2]);
        User::where('id', 19)->update(['produce_company_user_id' => 3]);
        User::where('id', 20)->update(['produce_company_user_id' => 4]);
        User::where('id', 21)->update(['produce_company_user_id' => 5]);
        User::where('id', 22)->update(['produce_company_user_id' => 6]);
        User::where('id', 23)->update(['produce_company_user_id' => 7]);
        User::where('id', 24)->update(['produce_company_user_id' => 8]);
        User::where('id', 25)->update(['produce_company_user_id' => 9]);
        User::where('id', 26)->update(['produce_company_user_id' => 10]);
        User::where('id', 27)->update(['produce_company_user_id' => 11]);
        User::where('id', 28)->update(['produce_company_user_id' => 12]);
        User::where('id', 29)->update(['produce_company_user_id' => 13]);
        User::where('id', 30)->update(['produce_company_user_id' => 14]);
    }
}
