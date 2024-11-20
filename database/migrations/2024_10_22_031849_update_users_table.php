<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar la columna 'role' con valores predeterminados
            $table->enum('role', ['cliente', 'empleado', 'administrador'])->default('cliente')->after('password');
            // La columna 'profile_picture' permanece igual
            $table->string('profile_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar la columna 'role'
            $table->dropColumn('role');
            // Eliminar la columna 'profile_picture'
            $table->dropColumn('profile_picture');
        });
    }
};
