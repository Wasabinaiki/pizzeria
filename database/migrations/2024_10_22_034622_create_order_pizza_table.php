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
        Schema::create('order_pizza', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Relación con orders
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade'); // Relación con pizzas
            $table->foreignId('size_id')->constrained('pizza_size')->onDelete('cascade'); // Relación con pizza_size
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
        Schema::dropIfExists('order_pizza');
    }
};