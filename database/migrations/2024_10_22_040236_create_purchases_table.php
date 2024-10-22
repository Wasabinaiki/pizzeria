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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('cascade'); // Clave foránea a raw_materials
            $table->integer('quantity'); // Cantidad comprada
            $table->decimal('total_price', 10, 2); // Precio total de la compra
            $table->date('purchase_date'); // Fecha de la compra
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
        Schema::dropIfExists('purchases');
    }
};