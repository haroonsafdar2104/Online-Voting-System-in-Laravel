<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_supports', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('voters_id');
            $table->foreign('voters_id')->references('voters_id')->on('voters')->onDelete('cascade');
            $table->unsignedbiginteger('candidates_id');
            $table->foreign('candidates_id')->references('candidates_id')->on('candidates')->onDelete('cascade');
            $table->string("description",200);
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
        Schema::dropIfExists('candidate_supports');
    }
}
