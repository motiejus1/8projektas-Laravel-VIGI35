<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            //Rysio stulpelis(foreign key)
            $table->unsignedBigInteger('group_id');

            //uzdejom isorini rakta ir sudarem rysi. Negalesim istrinti grupes kol yra studentu
            $table->foreign('group_id')->references('id')->on('groups');

            //Trinant grupe norime istrinti kartu ir visus susijusius studentus
            // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');




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
        Schema::dropIfExists('students');
    }
}
