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
        Schema::create('dashboard_carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('photo_url');
            $table->integer('sort');
            $table->unsignedInteger('client_id'); // Change the type to unsignedInteger
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_carousels');
    }
};
