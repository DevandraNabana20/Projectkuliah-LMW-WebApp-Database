<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Periksa apakah kolom tidak ada sebelum ditambahkan
            if (!Schema::hasColumn('registrations', 'file_url')) {
                $table->string('file_url')->nullable();
            }

            if (!Schema::hasColumn('registrations', 'file_name')) {
                $table->string('file_name')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (Schema::hasColumn('registrations', 'file_url')) {
                $table->dropColumn('file_url');
            }

            if (Schema::hasColumn('registrations', 'file_name')) {
                $table->dropColumn('file_name');
            }
        });
    }
};
