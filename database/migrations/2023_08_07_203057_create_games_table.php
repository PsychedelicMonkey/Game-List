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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 120)->unique();
            $table->date('release_date');
            $table->mediumText('description')->nullable();
            $table->jsonb('urls')->nullable();
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('developer_id')->references('id')->on('developers')->cascadeOnDelete();
            $table->foreign('genre_id')->references('id')->on('genres')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
