<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWebReceivedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_web_received_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->tinyInteger('type');
            $table->integer('item_id');
            $table->integer('item_meta');
            $table->unsignedInteger('amount');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_web_received_items');
    }
}
