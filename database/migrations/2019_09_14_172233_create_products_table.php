<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine='MYISAM';
            $table->Increments('id');
            $table->string('name',255);
            $table->text('description');
            $table->string('pdf',255);
            $table->string('image',255);
            $table->timestamps();
            $table->string('slug',255)->nullable();
            $table->string('video',255)->nullable();
            $table->softDeletes();
            $table->text('body');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_category');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
