<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('slug');
            $table->string('title');
            $table->longText('body');
            $table->unsignedInteger("views")->default(0);
            $table->unsignedInteger("user_id");
            $table->unsignedInteger('media_id')->nullable();
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->softDeletes();
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
}
