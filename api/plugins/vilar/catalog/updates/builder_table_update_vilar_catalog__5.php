<?php namespace Vilar\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVilarCatalog5 extends Migration
{
    public function up()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->bigInteger('price_old');
            $table->bigInteger('price_new');
            $table->boolean('new');
            $table->boolean('hot');
            $table->string('name', 191)->default('null')->change();
            $table->string('description', 191)->default('null')->change();
            $table->text('article')->default('null')->change();
            $table->text('images')->default('null')->change();
            $table->boolean('sale')->nullable(false)->unsigned(false)->default(null)->change();
            $table->dropColumn('shild');
            $table->dropColumn('price');
        });
    }
    
    public function down()
    {
        Schema::table('vilar_catalog_', function($table)
        {
            $table->dropColumn('price_old');
            $table->dropColumn('price_new');
            $table->dropColumn('new');
            $table->dropColumn('hot');
            $table->string('name', 191)->default('\'null\'')->change();
            $table->string('description', 191)->default('\'null\'')->change();
            $table->text('article')->default('NULL')->change();
            $table->text('images')->default('NULL')->change();
            $table->bigInteger('sale')->nullable()->unsigned(false)->default(NULL)->change();
            $table->boolean('shild')->nullable()->default(NULL);
            $table->bigInteger('price')->nullable()->default(NULL);
        });
    }
}
