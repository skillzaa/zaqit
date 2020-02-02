<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{

    public function up()
    {
Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->text("question")->required();
            $table->string("option1")->required();            $table->string("option2")->required();
            $table->string("option3")->required();
            $table->string("option4")->required();
            $table->string("correctOption")->required();

            $table->text("explanation")->nullable();
            $table->text("notes")->nullable();

           $table->enum('difficulty', ['easy','medium', 'hard'])->default('easy')->default('easy');

$table->bigInteger('subject_id')->nullable()->unsigned();
$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');

$table->bigInteger('level_id')->nullable()->unsigned();
        $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
