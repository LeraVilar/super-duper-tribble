<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog4 extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->bigInteger('price')->nullable();
            $table->string('name', 191)->default('null')->change();
            $table->string('description', 191)->default('null')->change();
            $table->text('article')->default('null')->change();
            $table->text('images')->default('null')->change();
            $table->boolean('shild')->nullable()->change();
            $table->bigInteger('sale')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->dropColumn('price');
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('description', 191)->default('\'null\'')->change();
            $table->text('article')->default('NULL')->change();
            $table->text('images')->default('NULL')->change();
            $table->boolean('shild')->nullable(false)->change();
            $table->integer('sale')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
