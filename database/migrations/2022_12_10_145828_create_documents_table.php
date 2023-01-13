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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('masters');
            $table->string('bachelors');
            $table->string('hsc');
            $table->string('ssc');
            $table->string('cv');
            $table->string('passport');
            $table->string('sop');
            $table->string('job_experience')->nullable();
            $table->string('recommendation_1');
            $table->string('recommendation_2');
            $table->string('visa_refused')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
