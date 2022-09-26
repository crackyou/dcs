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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('incoming_number'); // Входящий номер документа
            $table->date('incoming_date'); // Входящий дата документа
            $table->integer('deadline');
            $table->string('sender_name'); // Имя гражданина или название организации
            $table->string('sender_surname');
            $table->string('sender_lastname');
            $table->unsignedBigInteger('document_type_id');

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->softDeletes();
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
        Schema::dropIfExists('documents');
    }
};
