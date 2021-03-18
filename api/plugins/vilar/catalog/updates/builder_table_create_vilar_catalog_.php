<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVilarCatalog extends Migration
{
    public function up()
    {
        Schema::create('vilar_catalog_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('article')->nullable();
            $table->text('images')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vilar_catalog_');
    }
}
