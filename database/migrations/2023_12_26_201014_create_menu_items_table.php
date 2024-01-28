<?php

use App\Models\MenuGroup;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MenuGroup::class)->constrained()->cascadeOnDelete();
            $table->string('title')->unique();
            $table->nullableMorphs('linkable');
            $table->text('link')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->boolean('new_tab')->default(false);
            $table->boolean('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
