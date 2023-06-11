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
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('patient_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('doctor_id')->nullable();
            $table->date('date')->nullable();
            $table->foreignId('schedule_time_id')->nullable();
            $table->text('problem')->nullable();
        });
    }
};
