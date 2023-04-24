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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            
            $table->uuid();
            $table->uuid('customer_id');

            $table->boolean('is_active')->default(true);
            
            $table->timestamp('start_time');

            $table->index('uuid');
            $table->index('customer_id');
            
            $table
                ->foreign('customer_id')
                ->references('uuid')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
