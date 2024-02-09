<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegsTable extends Migration
{
    public function up()
    {
        Schema::create('legs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained()->onDelete('cascade');
            $table->string('from_location');
            $table->string('to_location');
            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('pax');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('legs');
    }
}
