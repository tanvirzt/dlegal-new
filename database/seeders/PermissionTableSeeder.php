<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [
                'group_name' => 'user-management',
                'permissions' => [
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
                ]
            ],
            [
                'group_name' => 'counsel-or-lawyer',
                'permissions' => [
                    'counsel-list',
                    'counsel-add',
                    'counsel-edit',
                    'counsel-delete',
                    'chamber-staff-list',
                    'chamber-staff-add',
                    'chamber-staff-edit',
                    'chamber-staff-delete',
                    'chamber-list',
                    'chamber-add',
                    'chamber-edit',
                    'chamber-delete',
                    'internal-counsel-list',
                    'internal-counsel-add',
                    'internal-counsel-edit',
                    'internal-counsel-delete',
                ]
            ],
            [
                'group_name' => 'admin-setup',
                'permissions' => [
                    'accused-list',
                    'accused-create',
                    'accused-edit',
                    'accused-delete',
                    'allegation-claim-list',
                    'allegation-claim-create',
                    'allegation-claim-edit',
                    'allegation-claim-delete',
                ]
            ],


//            [
//                'group_name' => 'product',
//                'permissions' => [
//                    'product-list',
//                    'product-create',
//                    'product-edit',
//                    'product-delete',
//                ]
//            ],

//            'role-list',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'product-list',
//            'product-create',
//            'product-edit',
//            'product-delete',
//            'designations',
//            'add-designations',
//            'edit-designations',
//            'delete-designations'

        ];

//        foreach ($permissions as $permission) {
//            Permission::create(['name' => $permission]);
//        }


        for ($i = 0; $i<count($permissions); $i++){
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j<count($permissions[$i]['permissions']); $j++){
                Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            }
        }


    }
}
