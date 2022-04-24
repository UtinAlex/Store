<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('studio_games')->nullable()->comment('Студия игры');
        });

        DB::table('studios')->insert([
            'studio_games' => 'Chess Mentor',
            ]);
        DB::table('studios')->insert([
            'studio_games' => 'id Software',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('studios')->delete();
        Schema::dropIfExists('studios');
    }
}
