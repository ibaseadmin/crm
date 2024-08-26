<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('client_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->string('activity_type'); // e.g., 'Lead Created', 'Marked as Client', 'Offer Made', 'Contract Signed'
            $table->timestamp('activity_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_activities');
    }
}
