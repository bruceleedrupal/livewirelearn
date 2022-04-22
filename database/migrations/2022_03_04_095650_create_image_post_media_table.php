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
        Schema::create('image_page_media', function (Blueprint $table) {
            $table->foreignId("media_id")->references('id')->on('media')->cascadeOnDelete();
            $table->foreignId("page_id")->references('id')->on('pages');
            $table->primary(array('media_id', 'page_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_page_media');
    }
};
