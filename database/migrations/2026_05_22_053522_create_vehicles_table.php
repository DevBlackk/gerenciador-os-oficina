<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', static function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->foreignUuid('customer_uuid')
                ->references('uuid')
                ->on('customers')
                ->cascadeOnDelete();

            $table->string('plate')
                ->unique();

            $table->string('brand');

            $table->string('model');

            $table->integer('year')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
