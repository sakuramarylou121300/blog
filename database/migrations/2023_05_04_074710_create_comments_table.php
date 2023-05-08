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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('body');
            $table->timestamps();

            // $table->unsignedBigInteger('post_id');//to associate which post does the comment belong, the type from the foreign should be similar here
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();//simply means, post_id field connected to id in the posts table, and when one posts is deleted,then delete its corresponding comments too.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
