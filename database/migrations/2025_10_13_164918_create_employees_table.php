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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();

            $table->unsignedBigInteger('birth_place_id')->nullable();
            $table->foreign('birth_place_id')->references('id')->on('places');

            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('places');

            $table->foreignId('birth_date_id')->constrained();
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('golongan_id')->constrained();
            $table->foreignId('eselon_id')->nullable()->constrained();
            $table->foreignId('position_id')->nullable()->constrained();

            $table->unsignedBigInteger('work_place_id')->nullable();
            $table->foreign('work_place_id')->references('id')->on('places');

            $table->foreignId('religion_id')->constrained();
            $table->foreignId('work_unit_id')->nullable()->constrained();
            $table->string('phone_number')->nullable()->unique();
            $table->string('npwp')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
