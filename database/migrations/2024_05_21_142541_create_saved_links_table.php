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
        Schema::create('saved_links', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->string('title');
            $table->string('platform');
            $table->string('thumbnail')->nullable();
            $table->unsignedBigInteger('link_list_id');
            $table->foreign('link_list_id')->references('id')->on('link_lists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_links');
    }
};
