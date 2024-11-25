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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('search_string')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('order_by')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->enum('is_home_view', ['1', '0'])->default('0');
            $table->enum('is_nav_view', ['1', '0'])->default('0');
            $table->enum('for_book_or_product', ['1', '2'])->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
