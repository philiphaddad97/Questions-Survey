<?php

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Survey::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Question::class, 'parent_id')->nullable();
            $table->integer('question_no');
            $table->enum('parent_answer', ['Yes', 'No'])->nullable();
            $table->enum('type', ['root', 'node']);
            $table->string('text');
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
