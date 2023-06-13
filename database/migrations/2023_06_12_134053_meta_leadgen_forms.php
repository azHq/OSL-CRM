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
        Schema::create('meta_leadgen_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lead_id');
            $table->boolean('mapped')->default(true);
            $table->foreignId('mapped_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('meta_leadgen_forms');

    }
};
