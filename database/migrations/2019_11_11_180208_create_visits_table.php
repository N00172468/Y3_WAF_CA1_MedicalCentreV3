<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-11T18:02:08+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-11T18:22:02+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            // $table->bigInteger('doctor_id')->unsigned();
            // $table->bigInteger('patient_id')->unsigned();
            $table->string('time_start');
            $table->string('time_end');
            $table->decimal('duration_of_visit', 6, 2);
            $table->decimal('cost_of_visit', 6, 2);
            $table->timestamps();


            // $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
