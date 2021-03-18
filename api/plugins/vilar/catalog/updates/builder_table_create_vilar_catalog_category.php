<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVilarCatalogCategory extends Migration
{
    public function up()
    {
        Schema::create('vilar_catalog_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vilar_catalog_category');
    }
}
