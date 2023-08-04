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
        Schema::create('ecosystems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atoll_id')->constrained();
            $table->integer('island_id');

            $table->string('name');
            $table->text('description')->nullable();

            $table->boolean('is_documented')->default(false);
            $table->boolean('is_potentially_threatened')->default(false);
            $table->boolean('is_threatened')->default(false);
            $table->boolean('is_destroyed')->default(false);

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecosystems');
    }
};
