<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', static function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->foreignUuid('service_order_uuid')
                ->references('uuid')
                ->on('service_orders')
                ->cascadeOnDelete();

            $table->enum('type', [
                'part',
                'service',
            ]);

            $table->text('description');

            $table->integer('quantity')
                ->default(1);

            $table->decimal('unit_price', 10, 2)
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
