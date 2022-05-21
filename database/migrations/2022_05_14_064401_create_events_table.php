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
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('name')->nullable()->default(NULL);
            $table->text('description')->nullable()->default(NULL);
            $table->date('start_date')->nullable()->default(NULL);
            $table->date('end_date')->nullable()->default(NULL);
            $table->string('organizer')->nullable()->default(NULL);
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
        Schema::dropIfExists('events');
    }
};
