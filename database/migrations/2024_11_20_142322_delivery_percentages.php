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
        Schema::create('delivery_percentages', function (Blueprint $table) {
            $table->id();
            $table->decimal('min_amount', 10, 2)->comment('Minimum order amount for this range');
            $table->decimal('charge_percentage', 5, 2)->comment('Delivery charge percentage for this range');
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
