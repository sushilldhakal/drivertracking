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
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->integer('truck_type_id');
            $table->integer('supplier_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('truck_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('location_id');
            $table->integer('number_of_cage');
            $table->integer('number_of_pallet');
            $table->integer('user_id');
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
