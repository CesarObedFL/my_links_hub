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
        Schema::create('link_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

            $table->hasMany('link_list_links', 'link_list_id');
        });

        Schema::create('link_list_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('link_list_id');
            $table->unsignedBigInteger('link_id');
            $table->timestamps();

            $table->foreign('link_list_id')->references('id')->on('link_lists')->onDelete('cascade');
            $table->foreign('link_id')->references('id')->on('saved_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_list_links');
        Schema::dropIfExists('link_lists');
    }
};
