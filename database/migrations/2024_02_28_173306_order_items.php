<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->bigInteger('product_id');
            $table->string('product_name')->nullable();
            $table->integer('quantity');
            $table->double('sale_price')->default('0');

            $table->double('price')->default('0');
            $table->double('offer_price')->default('0');
            $table->date('offer_from')->nullable();
            $table->date('offer_to')->nullable();
            $table->enum('is_book_or_product', ['1', '2'])->nullable();
            $table->enum('is_package', ['0', '1'])->default('0');
            $table->text('package_item_ids')->nullable();
            $table->enum('is_size', ['1', '0'])->default('0');
            $table->enum('is_size_wise_price', ['1', '0'])->default('0');

            $table->bigInteger('size_id')->nullable();
            $table->string('size_name')->nullable();
            $table->decimal('sz_price')->default(0);
            $table->decimal('sz_offer_price')->nullable();
            $table->date('sz_offer_from')->nullable();
            $table->date('sz_offer_to')->nullable();
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
