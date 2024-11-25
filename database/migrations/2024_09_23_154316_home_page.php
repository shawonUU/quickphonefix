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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->enum('for_book_or_product', ['1', '2'])->nullable();
            $table->bigInteger('item_type');
            $table->bigInteger('item_id');
            $table->bigInteger('view_type')->default(1);
            $table->integer('order_by')->default(0);
            $table->text('title')->nullable();
            $table->text('more_button_title')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
