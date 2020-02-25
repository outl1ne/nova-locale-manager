<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveBoolean extends Migration
{
    public function up()
    {
        Schema::table('nova_locale_manager', function (Blueprint $table) {
            $table->boolean('active')->default(true);
            $table->renameColumn('locale', 'slug');
        });
    }

    public function down()
    {
        Schema::table('nova_locale_manager', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->renameColumn('slug', 'locale');
        });
    }
}
