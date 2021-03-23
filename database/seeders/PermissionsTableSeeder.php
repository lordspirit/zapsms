<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'product_location_create',
            ],
            [
                'id'    => 20,
                'title' => 'product_location_edit',
            ],
            [
                'id'    => 21,
                'title' => 'product_location_show',
            ],
            [
                'id'    => 22,
                'title' => 'product_location_delete',
            ],
            [
                'id'    => 23,
                'title' => 'product_location_access',
            ],
            [
                'id'    => 24,
                'title' => 'product_brand_create',
            ],
            [
                'id'    => 25,
                'title' => 'product_brand_edit',
            ],
            [
                'id'    => 26,
                'title' => 'product_brand_show',
            ],
            [
                'id'    => 27,
                'title' => 'product_brand_delete',
            ],
            [
                'id'    => 28,
                'title' => 'product_brand_access',
            ],
            [
                'id'    => 29,
                'title' => 'product_supplier_create',
            ],
            [
                'id'    => 30,
                'title' => 'product_supplier_edit',
            ],
            [
                'id'    => 31,
                'title' => 'product_supplier_show',
            ],
            [
                'id'    => 32,
                'title' => 'product_supplier_delete',
            ],
            [
                'id'    => 33,
                'title' => 'product_supplier_access',
            ],
            [
                'id'    => 34,
                'title' => 'quantity_unit_create',
            ],
            [
                'id'    => 35,
                'title' => 'quantity_unit_edit',
            ],
            [
                'id'    => 36,
                'title' => 'quantity_unit_show',
            ],
            [
                'id'    => 37,
                'title' => 'quantity_unit_delete',
            ],
            [
                'id'    => 38,
                'title' => 'quantity_unit_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 41,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 42,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 43,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 44,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 45,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 46,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 47,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 48,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 49,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 50,
                'title' => 'product_create',
            ],
            [
                'id'    => 51,
                'title' => 'product_edit',
            ],
            [
                'id'    => 52,
                'title' => 'product_show',
            ],
            [
                'id'    => 53,
                'title' => 'product_delete',
            ],
            [
                'id'    => 54,
                'title' => 'product_access',
            ],
            [
                'id'    => 55,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 56,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 57,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 58,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 59,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 60,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 61,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 62,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 63,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 64,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 65,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 66,
                'title' => 'task_create',
            ],
            [
                'id'    => 67,
                'title' => 'task_edit',
            ],
            [
                'id'    => 68,
                'title' => 'task_show',
            ],
            [
                'id'    => 69,
                'title' => 'task_delete',
            ],
            [
                'id'    => 70,
                'title' => 'task_access',
            ],
            [
                'id'    => 71,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 72,
                'title' => 'sub_category_create',
            ],
            [
                'id'    => 73,
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => 74,
                'title' => 'sub_category_show',
            ],
            [
                'id'    => 75,
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => 76,
                'title' => 'sub_category_access',
            ],
            [
                'id'    => 77,
                'title' => 'location_create',
            ],
            [
                'id'    => 78,
                'title' => 'location_edit',
            ],
            [
                'id'    => 79,
                'title' => 'location_show',
            ],
            [
                'id'    => 80,
                'title' => 'location_delete',
            ],
            [
                'id'    => 81,
                'title' => 'location_access',
            ],
            [
                'id'    => 82,
                'title' => 'sublocation_create',
            ],
            [
                'id'    => 83,
                'title' => 'sublocation_edit',
            ],
            [
                'id'    => 84,
                'title' => 'sublocation_show',
            ],
            [
                'id'    => 85,
                'title' => 'sublocation_delete',
            ],
            [
                'id'    => 86,
                'title' => 'sublocation_access',
            ],
            [
                'id'    => 87,
                'title' => 'country_create',
            ],
            [
                'id'    => 88,
                'title' => 'country_edit',
            ],
            [
                'id'    => 89,
                'title' => 'country_show',
            ],
            [
                'id'    => 90,
                'title' => 'country_delete',
            ],
            [
                'id'    => 91,
                'title' => 'country_access',
            ],
            [
                'id'    => 92,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 93,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 94,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 95,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 96,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 97,
                'title' => 'brand_create',
            ],
            [
                'id'    => 98,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 99,
                'title' => 'brand_show',
            ],
            [
                'id'    => 100,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 101,
                'title' => 'brand_access',
            ],
            [
                'id'    => 102,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
