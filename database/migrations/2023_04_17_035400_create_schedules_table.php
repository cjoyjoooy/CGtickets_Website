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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('cinema_id')
                ->constrained('cinemas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('movie_id')
                ->constrained('movie')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->time('time_start');
            $table->time('time_end');
            $table->date('date_schedule');
            $table->double('price');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
