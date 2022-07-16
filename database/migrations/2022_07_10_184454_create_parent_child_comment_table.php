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
        Schema::create('parent_child_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Comment::class, 'parent_comment_id');
            $table->foreignIdFor(\App\Models\Comment::class, 'child_comment_id');
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
        Schema::dropIfExists('parent_child_comment');
    }
};
