<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaravelSeoManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_seo_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('page')->nullable();
            $table->text('title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('opegraph_type',50)->nullable();
            $table->string('locale',15)->nullable();
            $table->json('locales')->nullable();
            $table->string('canonical')->nullable();
            $table->tinyInteger('aws_s3')->default(0);
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
        Schema::dropIfExists('laravel_seo_managers');
    }
}
