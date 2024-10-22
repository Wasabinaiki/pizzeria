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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('name'); // Nombre del material
            $table->text('description')->nullable(); // Descripción opcional
            $table->integer('quantity'); // Cantidad en stock
            $table->decimal('price', 8, 2); // Precio por unidad
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade'); // Clave foránea a suppliers
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
        Schema::dropIfExists('raw_materials');
    }
};