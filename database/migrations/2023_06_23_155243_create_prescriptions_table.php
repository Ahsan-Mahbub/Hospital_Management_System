<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->nullable();
            $table->string('food_allergies')->nullable();
            $table->string('trendency_bleed')->nullable();
            $table->string('heart_disease')->nullable();
            $table->string('blood_presure')->nullable();
            $table->string('diabetic')->nullable();
            $table->string('surgery')->nullable();
            $table->string('accident')->nullable();
            $table->string('others')->nullable();
            $table->string('family_medical_history')->nullable();
            $table->string('current_medication')->nullable();
            $table->string('female_pregrancy')->nullable();
            $table->string('breast_feeding')->nullable();
            $table->string('helth_inssurance')->nullable();
            $table->string('low_income')->nullable();
            $table->string('reference')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
