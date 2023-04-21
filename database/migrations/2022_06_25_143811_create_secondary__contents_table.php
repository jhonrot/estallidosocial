<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary__contents', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->string('url');
            $table->string('font');
            $table->date('date');
            $table->string('content_tab');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('maincontent_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('maincontent_id')->references('id')->on('main_contents')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secondary__contents');
    }
};
