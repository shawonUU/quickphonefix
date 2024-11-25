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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('search_string')->nullable()->default(null);
            $table->text('category_id')->nullable();
            $table->text('sub_category_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->text('writer_id')->nullable();
            $table->text('publisher_id')->nullable();
            $table->text('subject_id')->nullable();
            $table->text('description')->nullable();         
            $table->string('image')->nullable();
            $table->double('price')->default('0');
            $table->double('offer_price')->default('0');
            $table->date('offer_from')->nullable();
            $table->date('offer_to')->nullable();
            $table->enum('status', ['1', '0'])->default('1');
            $table->enum('is_book_or_product', ['1', '2'])->nullable();
            $table->enum('is_package', ['0', '1'])->default('0');
            $table->text('package_item_ids')->nullable();
            $table->enum('is_size', ['1', '0'])->default('0');
            $table->enum('is_size_wise_price', ['1', '0'])->default('0');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
