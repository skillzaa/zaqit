<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paperitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('difficulty')->required();

$table->bigInteger('subject_id')->unsigned()->required();
$table->bigInteger('level_id')->unsigned()->required();

$table->bigInteger('paper_id')->unsigned()->required();
$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
$table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paperitems');
    }
}
