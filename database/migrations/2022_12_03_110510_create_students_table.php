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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->unsignedSmallInteger('intake_month')->nullable();
            $table->unsignedSmallInteger('intake_year')->nullable();
            $table->enum('last_education', ['PHD', 'MBA', 'Masters', 'Bachelors', 'Diploma', 'HSC', 'SSC', 'A-levels', 'o-levels']);
            $table->date('completion_date')->nullable();
            $table->string('education_details')->nullable();
            $table->enum('english', ['IELTS', 'MOI', 'OIETC', 'PTE', 'Internal Test']);
            $table->string('english_result')->nullable();
            $table->string('job_experience')->nullable();
            $table->enum('status', ['Unknown', 'Potential', 'Not Potential'])->default('Unknown');
            $table->boolean('documents_pending')->default(true);
            $table->string('tag')->nullable();
            $table->foreignId('owner_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string('insert_type')->default('from_crm');
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
        Schema::dropIfExists('students');
    }
};
