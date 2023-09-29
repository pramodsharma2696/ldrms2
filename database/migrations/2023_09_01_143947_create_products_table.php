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
            $table->string('Type');
            $table->unsignedBigInteger('BrandID');
            $table->string('ProductName');
            $table->string('Processor');
            $table->string('Screen');
            $table->string('RAM');
            $table->string('Storage');
            $table->string('Charges');
            $table->string('RentalPrice');
            $table->string('ProductModel');
            $table->text('ProductDescription');
            // $table->integer('stock_quantity')->default(0);
            $table->string('Image')->nullable();
            $table->string('Image1')->nullable();
            $table->string('Image2')->nullable();
            $table->string('Image3')->nullable();
            $table->string('Image4')->nullable();
            $table->string('Image5')->nullable();
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
