<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title' , 255);
            $table->string('slug' , 255);
            $table->string('date')->default(Carbon::now());
            $table->string('image' , 260);
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->enum('posted', ['yes', 'no'])->default('no');
            $table->enum('type', ['adverd', 'post' , 'course' , 'movies'])->default('post');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
