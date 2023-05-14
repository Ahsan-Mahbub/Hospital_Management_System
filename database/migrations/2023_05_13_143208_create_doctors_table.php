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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password')->nullable();
            $table->string('designation')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->string('sex')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('bdate')->nullable();
            $table->string('specialist')->nullable();
            $table->text('address')->nullable();
            $table->text('biography')->nullable();
            $table->text('education')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
