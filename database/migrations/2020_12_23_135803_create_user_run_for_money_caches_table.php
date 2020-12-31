<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRunForMoneyCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_run_for_money_caches', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->tinyInteger('clear');
            $table->tinyInteger('death');
            $table->tinyInteger('catch');
            $table->tinyInteger('surrender');
            $table->tinyInteger('revival');
            $table->unsignedInteger('max_result_id');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_run_for_money_caches');
    }
}
