<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('production_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('production_id')->references('id')->on('productions')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreign('tag_id')->references('id')->on('tags')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tag', function(Blueprint $table){
            $table->dropForeign('production_tag_production_id_foreign');
            $table->dropForeign('production_tag_tag_id_foreign');
        });
        // Schema::dropIfExists('production_tag');
        Schema::dropSoftDeletes('production_tag');
    }
}
