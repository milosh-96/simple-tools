<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("choice_index");
            $table->string("choice_value");
            $table->unsignedBigInteger("question_id");
            $table->unsignedBigInteger("user_id");
        });

        Schema::table('question_answers',function (Blueprint $table)
        {
            $table->foreign("question_id")->references("id")->on("questions")->onDelete(("cascade"));
            $table->foreign("user_id")->references("id")->on("users")->onDelete(("cascade"));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answers');
    }
}
