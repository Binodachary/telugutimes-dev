<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_folders', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->integer("news_folder_id")->nullable();
            $table->string("name",400)->nullable();
            $table->string("slug",400)->nullable();
            $table->enum("title_language",['telugu','english'])->default("telugu");
            $table->string("image",400)->nullable();
            $table->boolean("is_active")->default(true);
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
        Schema::dropIfExists('news_folders');
    }
}
