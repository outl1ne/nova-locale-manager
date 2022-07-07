<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultBoolean extends Migration
{
    public function up()
    {
        Schema::table(config('nova-locale-manager.table'), function (Blueprint $table) {
            $table->boolean('default')->default(false);
        });
    }

    public function down()
    {
        Schema::table(config('nova-locale-manager.table'), function (Blueprint $table) {
            $table->dropColumn('default');
        });
    }
}
