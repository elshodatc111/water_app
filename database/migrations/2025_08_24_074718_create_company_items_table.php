<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::create('company_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->enum('status', ['true', 'false'])->default('true');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('company_items');
    }
};
