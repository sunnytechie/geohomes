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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('video')->nullable();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->text('office_heading')->nullable();
            $table->text('office_location')->nullable();
            $table->string('phone')->nullable()->default('08067772804');
            $table->string('email')->nullable()->default('contact@geohomesgroup.com');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
