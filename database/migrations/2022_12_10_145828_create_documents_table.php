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
            $table->foreignId('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string('passport');
            $table->string('academics');
            $table->string('cv');
            $table->string('moi');
            $table->string('recommendation');
            $table->string('job_experience')->nullable();
            $table->string('sop');
            $table->string('others');
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
