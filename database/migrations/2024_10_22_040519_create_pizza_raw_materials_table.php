<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_raw_materials', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade'); // Clave foránea a pizzas
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('cascade'); // Clave foránea a raw_materials
            $table->integer('quantity'); // Cantidad del ingrediente en la pizza
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_raw_materials');
    }
};