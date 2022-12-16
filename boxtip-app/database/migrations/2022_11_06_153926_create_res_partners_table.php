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
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->char('code');
            $table->char('old_code')->nullable();
            $table->char('type');
            $table->char('name');
            $table->date('birth_date');
            $table->boolean('is_male');
            $table->char('email');
            $table->char('phone');
            $table->text('address');
            $table->char('province');
            $table->char('city');
            $table->char('district');
            $table->boolean('is_new_to_taobao')->nullable();
            $table->foreignId('regular_bought_product_id')->nullable();
            // ->nullable()
            // ->constrained('product_categories')
            // ->nullOnDelete()
            // ->cascadeOnUpdate();
            $table->foreignId('service_consideration_id')->nullable();
            // ->nullable()
            // ->constrained('service_considerations')
            // ->nullOnDelete()
            // ->cascadeOnUpdate();
        });
        /*
            alter table `res_partners` add constraint `res_partners_service_consideration_id_foreign` foreign key (`service_consideration_id`) references `service_considerations` (`id`) on delete set null on update cascade;
            alter table `res_partners` add constraint `res_partners_regular_bought_product_id_foreign` foreign key (`regular_bought_product_id`) references `product_categories` (`id`) on delete set null on update cascade;
        */
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
