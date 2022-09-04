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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('event_subscriber_id');
            $table->string('date');
            $table->string('time');
            $table->text('notes');
            $table->enum('status', ["pending", "upcoming", "ongoing", "missed", "finished"])->unique();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('event_subscriber_id')->references('id')->on('event_subscribers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
