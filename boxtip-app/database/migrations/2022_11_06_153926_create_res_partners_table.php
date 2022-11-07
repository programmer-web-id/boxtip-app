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
        Schema::create('res_partners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->char('code');
            $table->char('old_code');
            $table->char('name');
            $table->date('birth_date');
            $table->boolean('is_male');
            $table->char('email');
            $table->char('phone');
            $table->char('province');
            $table->char('city');
            $table->char('district');
            $table->boolean('is_new_to_taobao');
            $table->char('regular_bought_product');
            $table->char('import_consideration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_partners');
    }
};
