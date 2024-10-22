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
        Schema::create('order_extra_ingredient', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Relación con orders
            $table->foreignId('ingredient_id')->constrained('ingredients')->onDelete('cascade'); // Relación con ingredients
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
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
        Schema::dropIfExists('order_extra_ingredient');
    }
};