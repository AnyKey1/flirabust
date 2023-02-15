<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->text('author_name');
            $table->string('category');
            $table->string('title');
            $table->string('serie');
            $table->string('some_id');
            $table->string('file_id');
            $table->string('file_size');
            $table->string('some_id_7');
            $table->string('some_id_8');
            $table->string('format');
            $table->string('lang');
            $table->string('some_id_12');
            $table->string('tags');
            $table->string('some_id_14');
        });

        Schema::table('books', function ($table) {
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
