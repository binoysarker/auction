<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_desciption');
            $table->text('long_description');
            $table->string('image_file');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('end_date_time',10);
            $table->integer('price');
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('current_bid');
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
        Schema::dropIfExists('auction_items');
    }
}
