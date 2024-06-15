<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epaper', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->year('edition_year')->nullable();
            $table->string('edition_month')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('folder')->nullable();
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
        Schema::dropIfExists('epapers');
    }
}
