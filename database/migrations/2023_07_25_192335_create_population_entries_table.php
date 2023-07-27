<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('population_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atoll_id')->constrained();
            $table->integer('island_id');
            $table->unsignedInteger('men_count');
            $table->unsignedInteger('women_count');
            $table->unsignedInteger('local_count');
            $table->unsignedInteger('expat_count');
            $table->unsignedInteger('total_population');
            $table->date('logged_date');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_entries');
    }
};
