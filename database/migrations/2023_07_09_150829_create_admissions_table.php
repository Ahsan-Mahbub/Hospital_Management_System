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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('doctor_id')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('case')->nullable();
            $table->string('casuality')->nullable();
            $table->string('patient_type')->nullable();
            $table->string('reference')->nullable();
            $table->text('details')->nullable();
            $table->text('creadit_limit')->nullable();
            $table->foreignId('room_id')->nullable();
            $table->foreignId('ward_id')->nullable();
            $table->foreignId('bed_id')->nullable();
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
        Schema::dropIfExists('admissions');
    }
};
