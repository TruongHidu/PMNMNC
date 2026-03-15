<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Foreign key
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->nullOnDelete();

            $table->string('name');
            $table->string('sku')->nullable();

            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('sale_price', 12, 2)->nullable();

            $table->integer('stock')->default(0);

            $table->text('description')->nullable();
            $table->string('image')->nullable();

            $table->boolean('is_active')->default(1);
            $table->boolean('is_delete')->default(0);

            $table->timestamps();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};