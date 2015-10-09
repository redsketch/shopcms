<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store', function(Blueprint $table) {
			$table->string('address')->after('name');
			$table->integer('phone1')->after('email');
			$table->integer('phone2')->after('phone1');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store', function(Blueprint $table) {
			$table->dropColumn('address');
			$table->dropColumn('phone1');
			$table->dropColumn('phone2');
		});
    }
}
