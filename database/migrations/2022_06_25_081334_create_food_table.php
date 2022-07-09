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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\foodCategories::class)->constrained();
            $table->foreignIdFor(\App\Models\RestaurantDetail::class)->constrained();
            $table->string('title', '150');
            $table->bigInteger('price');
            $table->text('raw_material');
            $table->json('off')->default(NULL)->nullable();
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
        Schema::dropIfExists('food');
    }
};
