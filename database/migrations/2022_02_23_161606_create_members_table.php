<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('birth_certificate_no')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('nationality');
            $table->string('name');
            $table->string('dob');
            $table->string('gender');
            $table->string('date_of_dose_1')->nullable();
            $table->string('name_of_dose_1')->nullable();
            $table->string('date_of_dose_2')->nullable();
            $table->string('name_of_dose_2')->nullable();
            $table->string('vaccination_center')->nullable();
            $table->string('vaccinated_by')->nullable();
            $table->integer('total_dose')->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('members');
    }
}
