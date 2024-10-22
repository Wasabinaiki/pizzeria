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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade'); // Relación con clients
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade'); // Relación con branches
            $table->decimal('total_price', 8, 2);
            $table->timestamp('order_date')->useCurrent();
            $table->enum('status', ['pending', 'preparing', 'delivered', 'cancelled'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};