<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // e.g., rose, sunflower, etc.
            $table->integer('stage')->default(1); // 1: seed, 2: leaflet, 3: young plant, 4: full bloom
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
