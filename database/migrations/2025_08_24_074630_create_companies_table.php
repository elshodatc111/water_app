<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->integer('order_price')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('star', 3, 2)->default(5.0);
            $table->unsignedInteger('star_count')->default(0);
            $table->integer('balance')->default(0);
            $table->integer('price')->default(0);
            $table->enum('status', ['true', 'false'])->default('true');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('companies');
    }
};
