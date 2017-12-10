<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectRolesAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            # Remove the field associated with the old way we were storing roles

            # Add a new INT field called `role_id` that has to be unsigned (i.e. positive)
            $table->integer('role_id')->unsigned();

            # This field `role_id` is a foreign key that connects to the `id` field in the `roles` table
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('users_role_id_foreign');

            $table->dropColumn('role_id');
        });
    }
}
