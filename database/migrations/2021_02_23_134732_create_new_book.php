<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_book', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('uploaded_photo_path')->nullable();
            $table->longText('auteur')->nullable();
            $table->longText('titre')->nullable(); 
            $table->longText('collection')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_book');
    }
}
