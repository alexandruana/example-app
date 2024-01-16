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
            $table->foreignId('passenger_id')->constrained()->onDelete('cascade');
            $table->string('country');
            $table->string('document_number');
            $table->date('issuing_date');
            $table->date('expiry_date');
            $table->boolean('isPrimary')->default(false); // Ensure this line exists
            $table->timestamps();
        });
        
        Schema::table('travel_documents', function (Blueprint $table) {
            $table->unique(['passenger_id', 'isPrimary']);
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