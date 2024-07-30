<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 1024)->nullable();
            $table->rememberToken();
            $table->string('photo')->nullable();
            $table->string('role')->nullable();
            $table->string('status', 10)->default('activo');
            $table->string('google_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
