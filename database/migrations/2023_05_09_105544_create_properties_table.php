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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('category')->nullable();
            $table->text('lint_in')->nullable();
            $table->text('price')->nullable();
            $table->text('address')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('zip')->nullable();
            $table->text('country')->nullable();
            $table->text('size_in_fit')->nullable();
            $table->text('lot_size_in_fit')->nullable();
            $table->text('rooms')->nullable();
            $table->text('bedrooms')->nullable();
            $table->text('bathrooms')->nullable();
            $table->text('garages')->nullable();
            $table->text('garage_size')->nullable();
            $table->year('year_built')->nullable();
            $table->date('available_from')->nullable();
            $table->text('basement')->nullable();
            $table->text('extra_details')->nullable();
            $table->text('roofing')->nullable();
            $table->text('exterior_material')->nullable();
            $table->text('structure_type')->nullable();
            $table->text('floors_no')->nullable();
            $table->text('house_type')->nullable();
            $table->text('image')->nullable();
            $table->text('file1')->nullable();
            $table->text('file2')->nullable();
            $table->text('file3')->nullable();
            $table->text('file4')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
