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
        Schema::table('leads', function (Blueprint $table) {
            $table->string('source')->nullable();
        });
    
        Schema::table('clients', function (Blueprint $table) {
            $table->string('source')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('source');
        });
    
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('source');
        });
    }
};
