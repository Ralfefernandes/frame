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
        Schema::create('frames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('photo_url')->nullable();
            $table->string('filename');
            $table->integer('sort')->nullable();
            $table->string('edit')->nullable();
            $table->integer('margin_top')->nullable();
            $table->integer('margin_bottom')->nullable();
            $table->integer('margin_left')->nullable();
            $table->integer('margin_right')->nullable();
            $table->unsignedInteger('client_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frames');
    }
};
