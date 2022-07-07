<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocaleManagerTables extends Migration
{
    public function up()
    {
        Schema::create(config('nova-locale-manager.table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('locale')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('nova-locale-manager.table'));
    }
}
