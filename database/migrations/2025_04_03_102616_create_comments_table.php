<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');  // Имя комментатора
            $table->text('content');     // Текст комментария
            
            // Полиморфные связи
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            
            $table->timestamps();
            
            // Индексы для оптимизации
            $table->index(['commentable_id', 'commentable_type']);
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
