<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_remove_post_id_from_comments_table.php
// Новый файл миграции: database/migrations/XXXX_XX_XX_XXXXXX_remove_post_id_from_comments.php
public function up()
{
    Schema::table('comments', function (Blueprint $table) {
        if (Schema::hasColumn('comments', 'post_id')) {
            $table->dropColumn('post_id');
        }
    });
}

public function down()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->unsignedBigInteger('post_id')->nullable();
    });
}

    
    
};
