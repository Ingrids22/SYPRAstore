<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Modificar columnas existentes
            $table->string('name', 50)->nullable()->change();
            $table->string('last_name', 50)->nullable()->change();
            $table->string('address', 100)->nullable()->change();
            $table->string('phone', 10)->nullable()->change();
            
            // Verificar si ya existe el índice único antes de agregar uno nuevo
            if (!Schema::hasColumn('customers', 'email')) {
                $table->string('email', 255)->unique()->change();
            }
            
            $table->datetime('email_verified_at')->nullable()->change(); // Cambiado a datetime
            $table->string('password', 1024)->nullable()->change();
            $table->rememberToken()->change();
            $table->string('photo')->nullable()->change();
            $table->string('role')->nullable()->change();
            $table->string('status', 10)->default('activo')->change();

            // Verificar si la columna google_id no existe antes de agregarla
            if (!Schema::hasColumn('customers', 'google_id')) {
                $table->string('google_id')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            // Aquí puedes revertir los cambios realizados en 'up'
            $table->dropColumn('google_id'); // Para revertir el cambio del nuevo campo
        });
    }
};
