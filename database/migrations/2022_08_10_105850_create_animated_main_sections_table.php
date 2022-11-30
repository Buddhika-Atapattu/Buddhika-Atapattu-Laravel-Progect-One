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
        Schema::create('animated_main_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('selected_id')->nullable();
            $table->string('name')->nullable();
            $table->string('style')->nullable();
            $table->string('js')->nullable();
            $table->string('html')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('animated_main_sections');
    }
};
