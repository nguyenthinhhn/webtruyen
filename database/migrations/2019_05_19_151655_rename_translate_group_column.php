<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTranslateGroupColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manga_translate_group', function(Blueprint $table) {
            $table->renameColumn('group_id', 'translate_group_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manga_translate_group', function(Blueprint $table) {
            $table->renameColumn('translate_group_id', 'group_id');
        });
    }
}
