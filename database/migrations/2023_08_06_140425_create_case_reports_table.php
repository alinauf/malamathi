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
        Schema::create('case_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atoll_id')->constrained();
            $table->integer('island_id');

            $table->integer('ecosystem_id')->nullable();

            $table->string('title');
            $table->text('statement');

            $table->string('submitted_by')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->boolean('is_verified')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_reports');
    }
};
