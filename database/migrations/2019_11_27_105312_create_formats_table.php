<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    // create the tags table
    // it's a termlist so call the string column name
    // don't need timestamps - not very useful here
    Schema::create("formats", function (Blueprint $table) {
        $table->bigIncrements("id");
        $table->string("name", 30);
    });

    // create the pivot table using the Eloquent naming convention
    Schema::create("book_format", function (Blueprint $table) {
        // still have an id column
        $table->bigIncrements("id");
        // create the article id column and foreign key
        $table->bigInteger("book_id")->unsigned();
        $table->foreign("book_id")->references("id")
            ->on("books")->onDelete("cascade");
        // create the tag id column and foreign key
        $table->bigInteger("format_id")->unsigned();
        $table->foreign("format_id")->references("id")
            ->on("formats")->onDelete("cascade");
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remove the pivot table first
        Schema::dropIfExists("book_format");
        Schema::dropIfExists('formats');
    }
}

