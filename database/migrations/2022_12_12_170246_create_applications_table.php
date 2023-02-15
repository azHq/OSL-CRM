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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string('course');
            $table->text('course_details')->nullable();
            $table->smallInteger('intake_year');
            $table->smallInteger('intake_month');
            $table->enum('status', ['Applied', 'Offer Received', 'Paid', 'Visa', 'Enrolled']);
            $table->enum('compliance', ['Pending', 'Approved', 'Rejected']);
            $table->foreignId('university_id')->references('id')->on('universities');
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
        Schema::dropIfExists('applications');
    }
};
