<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("title",400)->nullable();
            $table->string("slug",400)->nullable();
            $table->enum("has_video",['YES','NO'])->default('NO');
            $table->string("image",400)->nullable();
            $table->string("video_id")->nullable();
            $table->text("description")->nullable();
            $table->text("description2")->nullable();
            $table->text("description3")->nullable();
            $table->text("description4")->nullable();
            $table->text("description5")->nullable();
            $table->string("keywords",400)->nullable();
            $table->json("news_folder_id")->nullable();
            $table->unsignedBigInteger("gallery_id")->default(0);
            $table->enum("title_language",['telugu','english'])->default("telugu");
            $table->string("category")->nullable();
            $table->enum("is_highlighted",['YES','NO'])->default("NO");
            $table->boolean("is_active")->default(true);
            $table->boolean("archived")->default(false);
            $table->decimal("movie_rating",3,1)->nullable();
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
        Schema::dropIfExists('news');
    }
}
