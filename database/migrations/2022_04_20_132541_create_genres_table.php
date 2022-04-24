<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre_games')->nullable()->comment('Жанр игры');
        });

        DB::table('genres')->insert([
            'genre_games' => 'Настольная логическая',
            ]);
        DB::table('genres')->insert([
            'genre_games' => 'Шутер',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('genres')->delete();
        Schema::dropIfExists('genres');
       
    }
}
