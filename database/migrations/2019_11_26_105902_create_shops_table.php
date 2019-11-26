<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
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
        Schema::create("shops", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name", 30);
            $table->string("url", 30);
        });

        // create the pivot table using the Eloquent naming convention
        Schema::create("book_shop", function (Blueprint $table) {
            // still have an id column
            $table->bigIncrements("id");
            // create the article id column and foreign key
            $table->bigInteger("book_id")->unsigned();
            $table->foreign("book_id")->references("id")
                ->on("books")->onDelete("cascade");
            // create the tag id column and foreign key
            $table->bigInteger("shop_id")->unsigned();
            $table->foreign("shop_id")->references("id")
                ->on("shops")->onDelete("cascade");
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
        // otherwise all the tags foreign key contraints would fail
        Schema::dropIfExists("book_shop");
        // then drop the tags table
        Schema::dropIfExists("shops");
    }
}
