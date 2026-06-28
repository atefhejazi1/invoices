<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('Product_name_translatable')->nullable()->after('Product_name');
        });

        DB::table('products')->select('id', 'Product_name')->orderBy('id')->each(function ($row) {
            DB::table('products')->where('id', $row->id)->update([
                'Product_name_translatable' => json_encode([
                    'ar' => $row->Product_name,
                    'en' => $row->Product_name,
                ]),
            ]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('Product_name');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('Product_name_translatable', 'Product_name');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('Product_name_plain', 999)->nullable()->after('Product_name');
        });

        DB::table('products')->select('id', 'Product_name')->orderBy('id')->each(function ($row) {
            $decoded = json_decode($row->Product_name, true);
            DB::table('products')->where('id', $row->id)->update([
                'Product_name_plain' => $decoded['ar'] ?? $row->Product_name,
            ]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('Product_name');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('Product_name_plain', 'Product_name');
        });
    }
};
