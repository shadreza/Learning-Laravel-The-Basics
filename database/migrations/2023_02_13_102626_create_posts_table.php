<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

// create a migration for a new table
// php artisan make:migration create_posts_table --create="posts"

// to rollback to prev position and remove the table and loose the data
// php artisan migrate:rollback

// to modify a table like adding another column without rollback and loosing the current data
// php artisan make:migration add_is_admin_column_to_post_table

// this will roll things back and then migrate them again
// php artisan migrate:refresh
