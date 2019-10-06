<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translate_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name', 191);
            $table->text('group_cover')->nullable();
            $table->text('group_description')->nullable();
            $table->text('group_slug');
            $table->text('group_url')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translate_groups');
    }
}
