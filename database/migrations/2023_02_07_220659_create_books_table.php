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
            $table->text('author_name'); //AUTHOR
            $table->string('category'); //GENRE
            $table->string('title'); //TITLE
            $table->string('serie'); //SERIES
            $table->string('some_id'); //SERNO
            $table->string('file_id'); //FILE
            $table->string('file_size'); //SIZE
            $table->string('some_id_7'); //LIBID
            $table->string('some_id_8'); //DEL
            $table->string('format'); //EXT
            $table->string('lang');
            $table->string('some_id_12');
            $table->string('tags');
            $table->string('some_id_14');
        });

        ;;;;;;;;;;DATE;INSNO;FOLDER;LANG;LIBRATE;KEYWORDS;


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
