<?php

use App\Models\ProduceCompany;

use Illuminate\Database\Seeder;

class ProduceCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produce_companies')
            ->where('id', '<', DB::raw(3))
            ->delete();

        $produceCompanyData = [];
        $produceCompanyData[] = [
            'id'    => 1,
            'name'  => '生产厂家1',
            'address'   => '生产厂家1的地址',
            'phone_num' => '0123456789',
            'post_addr' => '123-4567',
            'response_email'    => 'admin@produce_company1.com',
            'response_user_id'  => 17,
            'corp_info' => '这是生产厂家1',
            'status'    => DB_PRODUCE_COMPANYS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 24,
            'updated_by'    => 24
        ];
        $produceCompanyData[] = [
            'id'    => 2,
            'name'  => '生产厂家2',
            'address'   => '生产厂家2的地址',
            'phone_num' => '0123456789',
            'post_addr' => '123-4567',
            'response_email'    => 'admin@produce_company1.com',
            'response_user_id'  => 24,
            'corp_info' => '这是生产厂家1',
            'status'    => DB_PRODUCE_COMPANYS_STATUS_UNAUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 24,
            'updated_by'    => 24
        ];

        ProduceCompany::multiCreate($produceCompanyData);
    }
}
