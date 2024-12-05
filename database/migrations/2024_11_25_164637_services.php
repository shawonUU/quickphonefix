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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('product_name');
            $table->string('product_number')->nullable();;
            $table->string('details')->nullable();
            $table->double('bill');
            $table->integer('warranty_duration');
            $table->bigInteger('repaired_by');
            $table->enum('status', [0, 1])->default(1);
            $table->date('complated_date')->nullable();
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
