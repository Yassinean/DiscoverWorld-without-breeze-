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
        Schema::create('recits', function (Blueprint $table) {
            $table->string('Title');
            $table->text('Description');
            $table->string('Aventure');
            $table->string('Destination');
            $table->string('Conseil');
            $table->unsignedBigInteger('image_id'); // Add this line to create the image_id column
            $table->foreignId('user_id')->constrained();

            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recits');
    }
};
