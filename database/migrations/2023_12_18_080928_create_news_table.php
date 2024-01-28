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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->boolean('featured');
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug')->nullable();
            $table->text('summary');
            $table->longText('body');
            $table->string('image');
            $table->timestamp('published_at')->default(now());
            $table->integer('views_count')->default(0);
            $table->string('resource_label')->nullable();
            $table->string('resource_url')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
