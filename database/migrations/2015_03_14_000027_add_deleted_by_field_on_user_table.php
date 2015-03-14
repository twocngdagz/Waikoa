<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedByFieldOnUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign('users_deleted_by_foreign');
            $table->dropColumn('deleted_by');
        });
    }

}
