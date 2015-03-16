<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_url')->nullable();
            $table->boolean('is_share_profile_student')->default(false);
            $table->boolean('is_share_profile_public')->default(false);
            $table->string('telephone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('fax')->nullable();
            $table->boolean('is_share_contact')->default(false);
            $table->enum('level', ['level_1', 'level_2', 'level_3']);
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
            $table->dropColumn([
                'job_title',
                'company_name',
                'company_url',
                'is_share_profile_student',
                'is_share_profile_public',
                'telephone',
                'mobile_phone',
                'address',
                'fax',
                'is_share_contact',
                'level',
            ]);
        });
	}

}
