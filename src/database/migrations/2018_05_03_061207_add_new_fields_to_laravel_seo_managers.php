<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToLaravelSeoManagers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laravel_seo_managers', function (Blueprint $table) {
            $table->string('opegraph_type',50)->nullable()->after('url');
            $table->string('locale',15)->nullable()->after('opegraph_type');
            $table->json('locales')->nullable()->after('locale');
            $table->string('canonical')->nullable()->after('locales');
            $table->tinyInteger('aws_s3')->default(0)->after('canonical');
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
               'aws_s3'
           ]);
        });
    }
}
