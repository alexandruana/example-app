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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id'); // Foreign key to passengers table
            $table->string('company_name');
            $table->string('company_street');
            $table->string('company_postcode');
            $table->string('company_city');
            $table->string('company_country');
            $table->string('company_tax_id')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
