<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('name')->unique();
            $table->date('founded_on');
            $table->string('slogan')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('description');
            $table->string('avatar')->default("http://res.cloudinary.com/devmarshall/image/upload/c_scale,q_100,w_100/v1527594622/default/default-avatar_brand.png");
            $table->float('score')->default(0.00);
            $table->string('category_id')->nullable($value = true);
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
        Schema::dropIfExists('brands');
    }
}
