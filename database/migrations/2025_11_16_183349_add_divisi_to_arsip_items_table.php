<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('arsip_items', function (Blueprint $table) {
            $table->string('divisi')->nullable()->after('status_kasus');
        });
    }

    public function down(): void
    {
        Schema::table('arsip_items', function (Blueprint $table) {
            $table->dropColumn('divisi');
        });
    }
};
