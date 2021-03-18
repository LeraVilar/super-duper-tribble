<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog2 extends Migration
{
    public function up()
    {
        Schema::rename('vilar_catalog_items', 'vilar_catalog_');
        Schema::table('vilar_catalog_', function($table)
        {
            $table->string('name', 191)->default('null')->change();
            $table->string('description', 191)->default('null')->change();
            $table->integer('article')->default(null)->change();
            $table->text('images')->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::rename('vilar_catalog_', 'vilar_catalog_items');
        Schema::table('vilar_catalog_items', function($table)
        {
            $table->string('name', 191)->default('NULL')->change();
            $table->string('description', 191)->default('NULL')->change();
            $table->integer('article')->default(NULL)->change();
            $table->text('images')->default('NULL')->change();
        });
    }
}
