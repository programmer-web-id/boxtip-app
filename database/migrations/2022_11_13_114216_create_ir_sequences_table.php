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
        Schema::create('ir_sequences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('model');
            $table->char('sequence_code');
            $table->boolean('is_number');
            $table->char('prefix');
            $table->integer('length');
            $table->integer('running_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ir_sequences');
    }
};
