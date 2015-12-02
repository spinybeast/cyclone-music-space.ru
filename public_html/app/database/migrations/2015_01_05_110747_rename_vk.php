<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameVk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('comments', function(Blueprint $table)
        {
            $table->renameColumn('vk_profile', 'social_link');
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
            $table->renameColumn('social_link', 'vk_profile');
        });
	}

}
