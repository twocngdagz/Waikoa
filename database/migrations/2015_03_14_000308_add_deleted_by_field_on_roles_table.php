<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedByFieldOnRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('roles', function(Blueprint $table)
        {
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function(Blueprint $table)
        {
            $table->dropForeign('roles_deleted_by_foreign');
            $table->dropColumn('deleted_by');
        });
    }

}
