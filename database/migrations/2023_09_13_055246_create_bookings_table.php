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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('BookingNumber')->unique();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('BrandID');
            $table->unsignedBigInteger('StateID');
            $table->unsignedBigInteger('CityID');
            $table->date('FromDate');
            $table->date('ToDate');
            $table->string('UsedFor');
            $table->string('GSTNO')->nullable();
            $table->string('stock_quantity')->nullable();
            $table->integer('Quantity');
            $table->text('DeliveryAddress');
            $table->text('AddressProof');
            $table->timestamp('DateofBooking');
            $table->decimal('TotalCost', 10, 2);
            $table->text('Remark')->nullable();
            $table->enum('status', ['approved','unapproved','new'])->default('new');
            $table->timestamp('RemarkDate')->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('ProductID')->references('id')->on('products');
            $table->foreign('BrandID')->references('id')->on('brands');
            $table->foreign('StateID')->references('id')->on('states');
            $table->foreign('CityID')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
