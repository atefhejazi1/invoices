<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->json('section_name_translatable')->nullable()->after('section_name');
        });

        DB::table('sections')->select('id', 'section_name')->orderBy('id')->each(function ($row) {
            DB::table('sections')->where('id', $row->id)->update([
                'section_name_translatable' => json_encode([
                    'ar' => $row->section_name,
                    'en' => $row->section_name,
                ]),
            ]);
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn('section_name');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->renameColumn('section_name_translatable', 'section_name');
        });
    }

    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->string('section_name_plain', 999)->nullable()->after('section_name');
        });

        DB::table('sections')->select('id', 'section_name')->orderBy('id')->each(function ($row) {
            $decoded = json_decode($row->section_name, true);
            DB::table('sections')->where('id', $row->id)->update([
                'section_name_plain' => $decoded['ar'] ?? $row->section_name,
            ]);
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn('section_name');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->renameColumn('section_name_plain', 'section_name');
        });
    }
};
