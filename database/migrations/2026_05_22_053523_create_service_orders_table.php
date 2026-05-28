<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_orders', static function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->foreignUuid('vehicle_uuid')
                ->references('uuid')
                ->on('vehicles')
                ->cascadeOnDelete();

            $table->enum('status', [
                'estimate',
                'approved',
                'in_progress',
                'finished',
                'canceled',
            ])->default('estimate');

            $table->text('problem_description')
                ->nullable();

            $table->decimal('total_value', 10, 2)
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
