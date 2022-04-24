<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('studio_id');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('studio_id')->references('id')->on('studios');
            $table->foreign('genre_id')->references('id')->on('genres');
        });

        for ($i = 1; $i <= 2; $i++) {
        DB::table('games')->insert([
            'title_id' => $i,
            'studio_id' => $i,
            'genre_id' => $i,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('games')->delete();
        Schema::dropIfExists('games');
    }
}
