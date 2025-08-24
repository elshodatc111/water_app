<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('price');
            $table->enum('status', ['new', 'waiting', 'success', 'cancel'])->default('new');
            $table->enum('paymart_type', ['naqt', 'plastik']);
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('cancel_data')->nullable();
            $table->foreignId('cancel_user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->text('cancel_description')->nullable();
            $table->string('address');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
