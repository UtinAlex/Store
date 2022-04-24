<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('title_games')->nullable()->comment('Название игры');
        });

        DB::table('titles')->insert([
            'title_games' => 'Шахматы',
            ]);
        DB::table('titles')->insert([
            'title_games' => 'DOOM',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('titles')->delete();
        Schema::dropIfExists('titles');
    }
}
