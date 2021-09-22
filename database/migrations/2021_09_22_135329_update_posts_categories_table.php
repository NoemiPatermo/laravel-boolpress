<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');  //è la FK [indica id della categoria]

            $table->foreign('category_id') //crei il vincolo di FK indicando 
            ->references('id') // a quale colonna 
            ->on('categories');// di quale tabella fai riferimento [see also ->constrained()]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropForeign('posts_category_id_foreign');//esegui l'inverso di ciò che hai fato sopra, prima cancelli la FK 
            $table->dropColumn('category_id');//poi cancelli la colonna

        });
    }
}
