<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSavedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_saved_items', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('slot');
            $table->integer('item_id');
            $table->integer('item_meta');
            $table->unsignedInteger('amount');
            $table->unique(['user_id', 'slot']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_saved_items');
    }
}
