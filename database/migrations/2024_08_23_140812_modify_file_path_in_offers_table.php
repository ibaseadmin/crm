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
        Schema::table('offers', function (Blueprint $table) {
            // Dacă `file_path` deja există și vrei să-l faci opțional:
            $table->string('file_path')->nullable()->change();
    
            // Dacă vrei să setezi un default value:
            // $table->string('file_path')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->string('file_path')->nullable(false)->change();

        });
    }
};
