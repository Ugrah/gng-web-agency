<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recipient');
            $table->longText('content');
            $table->bigInteger('user_message_id')->unsigned();
			$table->foreign('user_message_id')
				  ->references('id')
				  ->on('user_messages')
				  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->timestamps();
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
        Schema::table('admin_responses', function(Blueprint $table) {
            $table->dropForeign('admin_responses_user_message_id_foreign');
        });

        // Schema::dropIfExists('admin_responses');
        Schema::dropSoftDeletes('admin_responses');

    }
}
