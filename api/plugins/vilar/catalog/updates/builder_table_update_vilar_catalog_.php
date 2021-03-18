<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('name', 191)->default(null)->change();
            $table->string('description', 191)->default(null)->change();
            $table->integer('article')->default(null)->change();
            $table->text('images')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('name', 191)->default('NULL')->change();
            $table->string('description', 191)->default('NULL')->change();
            $table->integer('article')->default(NULL)->change();
            $table->text('images')->default('NULL')->change();
        });
    }
}
