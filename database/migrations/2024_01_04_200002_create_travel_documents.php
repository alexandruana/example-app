<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');
            $table->string('country');
            $table->string('document_number');
            $table->date('issuing_date');
            $table->date('expiry_date');
            $table->boolean('isDefault')->default(false); // Ensure this line exists
            $table->timestamps();
        });
        
        Schema::table('travel_documents', function (Blueprint $table) {
            $table->unique(['passenger_id', 'isDefault']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_documents');
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

};