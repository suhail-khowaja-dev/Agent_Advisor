<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('agent_id');
            $table->string('contact_note');
            $table->string('meeting_note');
            $table->string('contract_note');
            $table->string('closed_note');
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
        Schema::dropIfExists('update_notes');
    }
}
