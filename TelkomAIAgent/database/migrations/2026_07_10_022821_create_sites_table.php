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
        Schema::create('sites', function (Blueprint $table) {

            $table->id();

            // Site ID
            $table->string('site_id')->unique();

            // Nama Site
            $table->string('site_name')->nullable();

            // Wilayah
            $table->string('region')->nullable();

            // Status
            $table->string('status');

            // Catatan Teknisi
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
