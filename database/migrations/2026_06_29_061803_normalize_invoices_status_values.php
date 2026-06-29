<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * @var array<int, string>
     */
    private array $map = [
        1 => 'paid',
        2 => 'unpaid',
        3 => 'partial',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (['invoices', 'invoices_details'] as $table) {
            foreach ($this->map as $valueStatus => $key) {
                DB::table($table)->where('Value_Status', $valueStatus)->update(['Status' => $key]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $arabic = [
            1 => 'مدفوعة',
            2 => 'غير مدفوعة',
            3 => 'مدفوعة جزئياً',
        ];

        foreach (['invoices', 'invoices_details'] as $table) {
            foreach ($arabic as $valueStatus => $label) {
                DB::table($table)->where('Value_Status', $valueStatus)->update(['Status' => $label]);
            }
        }
    }
};
