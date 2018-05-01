<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToLaravelSeoManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laravel_seo_managers', function (Blueprint $table) {
            $table->string('opegraph_type',50)->nullable();
            $table->string('locale',15)->nullable();
            $table->json('locales')->nullable();
            $table->string('canonical')->nullable();
            $table->tinyInteger('aws_s3')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laravel_seo_managers', function (Blueprint $table) {
            $table->dropColumn([
                'opegraph_type',
                'locale',
                'locales',
                'canonical',
                'aws_s3']);
        });
    }
}
