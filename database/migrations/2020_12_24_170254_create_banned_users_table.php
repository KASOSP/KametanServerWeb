<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banned_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('xuid');
            $table->string('username');
            $table->ipAddress('ip_address');
            $table->unsignedInteger('expiration_date');
            $table->string('enforcer_sign');
            $table->string('reason');
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
        Schema::dropIfExists('banned_users');
    }
}
