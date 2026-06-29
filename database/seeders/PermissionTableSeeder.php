<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [

            'invoices.menu',
            'invoices.list',
            'invoices.paid',
            'invoices.partial',
            'invoices.unpaid',
            'invoices.archive',
            'reports.menu',
            'reports.invoices',
            'reports.customers',
            'users.menu',
            'users.list',
            'roles.menu',
            'settings.menu',
            'products.menu',
            'sections.menu',


            'invoices.create',
            'invoices.delete',
            'invoices.export',
            'invoices.update_status',
            'invoices.edit',
            'invoices.archive_invoice',
            'invoices.print',
            'invoices.attachment_create',
            'invoices.attachment_delete',

            'users.create',
            'users.edit',
            'users.delete',

            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',

            'products.create',
            'products.edit',
            'products.delete',

            'sections.create',
            'sections.edit',
            'sections.delete',
            'notifications.menu',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
