<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRunForMoneyResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_run_for_money_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('run_for_money_id');
            $table->tinyInteger('clear');
            $table->tinyInteger('death');
            $table->tinyInteger('catch');
            $table->tinyInteger('surrender');
            $table->tinyInteger('revival');
            $table->boolean('is_valid')->default(true);
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
        Schema::dropIfExists('user_run_for_money_results');
    }
}
