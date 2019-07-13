<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('production_id')->unsigned();
            $table->timestamps();
            $table->foreign('production_id')
                  ->references('id')
                  ->on('productions')
                  ->onDelete('restrict')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_images', function(Blueprint $table) {
            $table->dropForeign('production_images_production_id_foreign');
        });
        Schema::dropIfExists('production_images');
    }
}
