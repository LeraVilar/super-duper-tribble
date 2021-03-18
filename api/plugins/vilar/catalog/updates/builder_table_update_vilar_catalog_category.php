<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalogCategory extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_category', function($table)
        {
            $table->renameColumn('id', 'value');
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_category', function($table)
        {
            $table->renameColumn('value', 'id');
        });
    }
}
