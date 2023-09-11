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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->boolean('bool_position');
            $table->foreignId('position_id');
            $table->string('inventory_number');
            $table->string('serial_number');
            $table->foreignId('manufacturer_id');
            $table->string('model');
            $table->string('submodel');
            $table->integer('year');
            $table->string('power_type');
            $table->string('power_rating');
            $table->string('speed');
            $table->string('processor');
            $table->string('bit');
            $table->boolean('keyboard_bool')->default('0');
            $table->string('keyboard');
            $table->boolean('monitor_bool')->default('0');
            $table->string('monitor');
            $table->string('icon');
            $table->longtext('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
