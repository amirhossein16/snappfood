<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_details', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignIdFor(\App\Models\restaurantCategories::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->boolean('is_open')->default(0);
            $table->bigInteger('accountNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('ShippingCost')->nullable();
            $table->string('phone')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('restaurant_details');
    }
};
