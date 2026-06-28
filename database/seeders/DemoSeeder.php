<?php

namespace Database\Seeders;

use App\Models\invoices;
use App\Models\invoices_details;
use App\Models\products;
use App\Models\sections;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'owner')->first();

        $demoUser = User::create([
            'name' => 'Demo Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('password'),
            'Status' => 'مفعل',
        ]);

        if ($role) {
            $demoUser->assignRole([$role->id]);
        }

        $sectionsData = [
            ['section_name' => ['ar' => 'قسم المبيعات', 'en' => 'Sales Department'], 'description' => 'فواتير المبيعات والعقود'],
            ['section_name' => ['ar' => 'قسم التسويق', 'en' => 'Marketing Department'], 'description' => 'فواتير الحملات التسويقية'],
            ['section_name' => ['ar' => 'قسم تقنية المعلومات', 'en' => 'IT Department'], 'description' => 'فواتير الخدمات التقنية'],
            ['section_name' => ['ar' => 'قسم الموارد البشرية', 'en' => 'HR Department'], 'description' => 'فواتير التدريب والتوظيف'],
        ];

        $createdSections = [];
        foreach ($sectionsData as $sectionData) {
            $createdSections[] = sections::create([
                'section_name' => $sectionData['section_name'],
                'description' => $sectionData['description'],
                'Created_by' => $demoUser->name,
            ]);
        }

        $productNames = [
            ['ar' => 'باقة استشارية', 'en' => 'Consulting Package'],
            ['ar' => 'تصميم هوية بصرية', 'en' => 'Brand Identity Design'],
            ['ar' => 'صيانة دورية', 'en' => 'Periodic Maintenance'],
            ['ar' => 'دورة تدريبية', 'en' => 'Training Course'],
            ['ar' => 'ترخيص برمجي', 'en' => 'Software License'],
            ['ar' => 'حملة إعلانية', 'en' => 'Advertising Campaign'],
        ];

        $createdProducts = [];
        foreach ($createdSections as $section) {
            foreach (array_slice($productNames, 0, 3) as $name) {
                $createdProducts[] = products::create([
                    'Product_name' => $name,
                    'description' => $name['ar'] . ' - ' . $section->getTranslation('section_name', 'ar'),
                    'section_id' => $section->id,
                ]);
            }
        }

        $statuses = [
            1 => 'مدفوعة',
            2 => 'غير مدفوعة',
            3 => 'مدفوعة جزئياً',
        ];

        for ($i = 1; $i <= 60; $i++) {
            $section = $createdSections[array_rand($createdSections)];
            $product = $createdProducts[array_rand($createdProducts)];
            $valueStatus = [1, 1, 2, 2, 3][array_rand([1, 1, 2, 2, 3])];

            $amountCommission = rand(500, 5000);
            $discount = rand(0, 200);
            $rateVat = [' 5%', '10%'][array_rand([' 5%', '10%'])];
            $rateVatNumber = (float) trim($rateVat, '% ');
            $base = $amountCommission - $discount;
            $valueVat = round($base * $rateVatNumber / 100, 2);
            $total = round($base + $valueVat, 2);

            $invoiceDate = now()->subDays(rand(0, 180));

            $invoice = invoices::create([
                'invoice_number' => 'DEMO-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'invoice_Date' => $invoiceDate->format('Y-m-d'),
                'Due_date' => $invoiceDate->copy()->addDays(14)->format('Y-m-d'),
                'product' => $product->Product_name,
                'section_id' => $section->id,
                'Amount_collection' => rand(1000, 8000),
                'Amount_Commission' => $amountCommission,
                'Discount' => $discount,
                'Value_VAT' => $valueVat,
                'Rate_VAT' => $rateVat,
                'Total' => $total,
                'Status' => $statuses[$valueStatus],
                'Value_Status' => $valueStatus,
                'note' => 'فاتورة بيانات تجريبية',
                'Payment_Date' => $valueStatus == 1 ? $invoiceDate->copy()->addDays(rand(1, 10))->format('Y-m-d') : null,
            ]);

            invoices_details::create([
                'id_Invoice' => $invoice->id,
                'invoice_number' => $invoice->invoice_number,
                'product' => $product->Product_name,
                'Section' => $section->id,
                'Status' => $statuses[$valueStatus],
                'Value_Status' => $valueStatus,
                'note' => 'فاتورة بيانات تجريبية',
                'user' => $demoUser->name,
                'Payment_Date' => $invoice->Payment_Date,
            ]);
        }
    }
}
