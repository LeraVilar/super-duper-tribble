<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVilarCatalogAndCategory extends Migration
{
    public function up()
    {
        Schema::create('vilar_catalog_and_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('catalog_id');
            $table->integer('category_id');
            $table->primary(['catalog_id','category_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vilar_catalog_and_category');
    }
}
