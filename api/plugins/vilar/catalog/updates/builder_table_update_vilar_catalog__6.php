<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog6 extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->string('name', 191)->default('null')->change();
            $table->string('description', 191)->default('null')->change();
            $table->text('article')->default('null')->change();
            $table->text('images')->default('null')->change();
            $table->bigInteger('price_new')->unsigned()->change();
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('description', 191)->default('\'null\'')->change();
            $table->text('article')->default('NULL')->change();
            $table->text('images')->default('NULL')->change();
            $table->bigInteger('price_new')->unsigned(false)->change();
        });
    }
}
