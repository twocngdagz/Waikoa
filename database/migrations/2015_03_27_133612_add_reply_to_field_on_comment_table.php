<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReplyToFieldOnCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('comments', function(Blueprint $table)
        {
            $table->integer('reply_to')->unsigned()->nullable()->default(NULL);
            $table->foreign('reply_to')->references('id')->on('comments');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('comments', function(Blueprint $table)
        {
            $table->dropForeign('comments_reply_to_foreign');
            $table->dropColumn('reply_to');
        });
	}

}
