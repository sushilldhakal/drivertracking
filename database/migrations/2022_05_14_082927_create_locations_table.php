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
        Schema::create('locations', function (Blueprint $table) {
            $table->uuid('id')->default(\DB::raw('(UUID()) primary key'));
            $table->string('name');
            $table->string('address');
            $table->string('truck_type_id');
            $table->string('supplier_id');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('truck_types', function (Blueprint $table) {
            $table->uuid('id')->default(\DB::raw('(UUID()) primary key'));
            $table->string('name');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->uuid('id')->default(\DB::raw('(UUID()) primary key'));
            $table->string('name');
            $table->string('user_id');
            $table->timestamps();
        });

        Schema::create('depots', function (Blueprint $table) {
            $table->uuid('id')->default(\DB::raw('(UUID()) primary key'));
            $table->string('name');
            $table->string('location_id');
            $table->integer('number_of_cage');
            $table->integer('number_of_pallet');
            $table->string('user_id');
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
        Schema::dropIfExists('locations');
        Schema::dropIfExists('truck_types');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('depots');
    }
};
