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
        Schema::create('plot_usages', function (Blueprint $table) {
            $table->id();
            $table->integer('plot_id');
            $table->string('owner_name');
            $table->string('purpose');
            $table->text('description')->nullable();
            $table->decimal('plot_value', 12, 4)->nullable(); // e.g., 999999999.9999
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_usages');
    }
};
