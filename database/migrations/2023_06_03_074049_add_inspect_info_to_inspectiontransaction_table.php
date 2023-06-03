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
        Schema::table('inspectiontransactions', function (Blueprint $table) {
            $table->date('schedule_date')->nullable();
            $table->time('schedule_time')->nullable();
            $table->string('schedule_status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspectiontransactions', function (Blueprint $table) {
            //
        });
    }
};
