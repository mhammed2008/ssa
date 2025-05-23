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
        Schema::create('grads', function (Blueprint $table) {
            $table->id();
            $table->string('material');
            $table->string('grad');
            $table->string('category');
            $table->foreignIdFor(\App\Models\User::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grads');
    }
};
