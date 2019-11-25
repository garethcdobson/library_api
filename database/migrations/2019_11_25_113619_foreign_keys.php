<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("first name", 100);
            $table->string("last name", 100);
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {

            // create the author_id column
            $table->bigInteger("author_id")->unsigned();

            $table->foreign("author_id")->references("id")
            ->on("authors")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
        
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign("author_id");
        });
    }
}
