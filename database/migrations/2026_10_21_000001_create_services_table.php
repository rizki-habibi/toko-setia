<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name', 120);
            $table->string('category', 100)->index();
            $table->string('title', 180);
            $table->string('slug', 200)->unique();
            $table->string('summary', 280);
            $table->text('description');
            $table->decimal('price_from', 12, 2)->default(0);
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->unsignedInteger('orders_count')->default(0);
            $table->unsignedSmallInteger('delivery_days')->default(1);
            $table->boolean('is_featured')->default(false)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->string('cover_url', 500)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
