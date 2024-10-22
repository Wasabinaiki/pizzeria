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
            // Aquí puedes agregar columnas o hacer cambios
            // Por ejemplo, agregar una columna 'profile_picture'
            $table->string('profile_picture')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Aquí debes eliminar la columna que agregaste
            $table->dropColumn('profile_picture');
        });
    }
};
