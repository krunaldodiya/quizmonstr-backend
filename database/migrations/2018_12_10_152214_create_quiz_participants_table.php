<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id');
            $table->integer('participant_id');
            $table->text('answer_meta');
            $table->integer('points')->default(0);
            $table->integer('prize_amount')->default(0);
            $table->timestamps();
        });
    }

    public function getAnswerMeta()
    {
        $answers = [];
        for ($i = 0; $i < 10; $i++) {
            $answers[$i] = ["time" => '0', "status" => 'skipped'];
        }
        return json_encode($answers);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_participants');
    }
}
