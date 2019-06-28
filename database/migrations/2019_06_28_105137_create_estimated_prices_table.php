<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatedPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimated_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('qualityOption');
            $table->string('typeOption');
            $table->string('designOption');
            $table->string('profitableOption');
            $table->string('loginOption');
            $table->string('userSpaceOption');
            $table->string('websiteIntagrationOption');
            $table->string('adminSpaceOption');
            $table->string('languageOption');
            $table->string('advancedFeaturesOption');
            $table->string('statusProjectOption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimated_prices');
    }
}
