<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->where('Status', 'مفعل')->update(['Status' => 'active']);
        DB::table('users')->where('Status', 'غير مفعل')->update(['Status' => 'inactive']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('Status', 'active')->update(['Status' => 'مفعل']);
        DB::table('users')->where('Status', 'inactive')->update(['Status' => 'غير مفعل']);
    }
};
