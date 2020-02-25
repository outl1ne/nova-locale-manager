<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultBoolean extends Migration
{
    public function up()
    {
        Schema::table('nova_locale_manager', function (Blueprint $table) {
            $table->boolean('default')->default(false);
        });
    }

    public function down()
    {
        Schema::table('nova_locale_manager', function (Blueprint $table) {
            $table->dropColumn('default');
        });
    }
}
