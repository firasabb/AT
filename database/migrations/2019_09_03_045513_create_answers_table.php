<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('best')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('art_id')
                  ->references('id')
                  ->on('arts')
                  ->onDelete('cascade');
                  
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        
    }
}
