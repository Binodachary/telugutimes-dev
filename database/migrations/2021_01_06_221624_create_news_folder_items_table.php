<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsFolderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_folder_items', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string("title",400)->nullable();
            $table->string("slug",400)->nullable();
            $table->enum("has_video",['YES','NO'])->default('NO')->nullable();
            $table->string("image",400)->nullable();
            $table->text("description")->nullable();
            $table->text("description2")->nullable();
            $table->text("description3")->nullable();
            $table->text("description4")->nullable();
            $table->text("description5")->nullable();
            $table->string("keywords",400)->nullable();
            $table->enum("title_language",['telugu','english'])->default("telugu");
            $table->boolean("is_active")->default(true);
            $table->string("news_folder_id",250)->nullable();
            $table->unsignedBigInteger("gallery_id")->nullable();
            $table->string("video_id")->nullable();
            $table->date("schedule_to")->nullable();
            $table->unsignedBigInteger("posted_by")->nullable();
            $table->unsignedBigInteger("updated_by")->nullable();
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
        Schema::dropIfExists('news_folder_items');
    }
}
