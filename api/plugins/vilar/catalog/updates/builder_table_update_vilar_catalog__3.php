<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog3 extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->boolean('shild');
            $table->integer('sale');
            $table->string('name', 191)->default('null')->change();
            $table->string('description', 191)->default('null')->change();
            $table->text('article')->nullable()->unsigned(false)->default('null')->change();
            $table->text('images')->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->dropColumn('shild');
            $table->dropColumn('sale');
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('description', 191)->default('\'null\'')->change();
            $table->integer('article')->nullable()->unsigned(false)->default(NULL)->change();
            $table->text('images')->default('NULL')->change();
        });
    }
}
