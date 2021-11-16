<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code',15)->nullable()->default(null)->comment('Mã sinh viên');
            $table->string('password')->nullable()->default(null);
            $table->string('name');
            $table->string('major_code',15)->nullable()->comment('Mã ngành');
            $table->string('folk',50)->nullable()->comment('Dân tộc');;
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->string('cccd')->nullable()->comment('Căn cước công dân');
            $table->string('license_id')->nullable()->comment('Mã giấy báo nhập học');
            $table->string('gender',10)->nullable();
            $table->rememberToken()->nullable();
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
