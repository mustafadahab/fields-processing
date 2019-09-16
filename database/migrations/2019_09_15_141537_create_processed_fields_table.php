<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessedFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tractor_id');
            $table->bigInteger('field_id');
            $table->Integer('no_of_tractors');
            $table->double('processed_area', 8, 2);
            $table->timestamp('added_on');
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
        Schema::dropIfExists('processed_fields');
    }
}
