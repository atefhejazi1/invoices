<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * @var array<string, string>
     */
    private array $map = [
        'الفواتير' => 'invoices.menu',
        'قائمة الفواتير' => 'invoices.list',
        'الفواتير المدفوعة' => 'invoices.paid',
        'الفواتير المدفوعة جزئيا' => 'invoices.partial',
        'الفواتير الغير مدفوعة' => 'invoices.unpaid',
        'ارشيف الفواتير' => 'invoices.archive',
        'التقارير' => 'reports.menu',
        'تقرير الفواتير' => 'reports.invoices',
        'تقرير العملاء' => 'reports.customers',
        'المستخدمين' => 'users.menu',
        'قائمة المستخدمين' => 'users.list',
        'صلاحيات المستخدمين' => 'roles.menu',
        'الاعدادات' => 'settings.menu',
        'المنتجات' => 'products.menu',
        'الاقسام' => 'sections.menu',

        'اضافة فاتورة' => 'invoices.create',
        'حذف الفاتورة' => 'invoices.delete',
        'تصدير EXCEL' => 'invoices.export',
        'تغير حالة الدفع' => 'invoices.update_status',
        'تعديل الفاتورة' => 'invoices.edit',
        'ارشفة الفاتورة' => 'invoices.archive_invoice',
        'طباعةالفاتورة' => 'invoices.print',
        'اضافة مرفق' => 'invoices.attachment_create',
        'حذف المرفق' => 'invoices.attachment_delete',

        'اضافة مستخدم' => 'users.create',
        'تعديل مستخدم' => 'users.edit',
        'حذف مستخدم' => 'users.delete',

        'عرض صلاحية' => 'roles.view',
        'اضافة صلاحية' => 'roles.create',
        'تعديل صلاحية' => 'roles.edit',
        'حذف صلاحية' => 'roles.delete',

        'اضافة منتج' => 'products.create',
        'تعديل منتج' => 'products.edit',
        'حذف منتج' => 'products.delete',

        'اضافة قسم' => 'sections.create',
        'تعديل قسم' => 'sections.edit',
        'حذف قسم' => 'sections.delete',
        'الاشعارات' => 'notifications.menu',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->map as $old => $new) {
            DB::table('permissions')->where('name', $old)->update(['name' => $new]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->map as $old => $new) {
            DB::table('permissions')->where('name', $new)->update(['name' => $old]);
        }
    }
};
