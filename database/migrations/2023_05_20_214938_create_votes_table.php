<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('preference')->unsigned();
            $table->unsignedbiginteger('voters_id');
            $table->foreign('voters_id')->references('voters_id')->on('voters');
            $table->unsignedbiginteger('candidates_id');
            $table->foreign('candidates_id')->references('candidates_id')->on('candidates');
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
        Schema::dropIfExists('votes');
    }
}
