<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{


    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string("nis")->unique();
            $table->string("nama")->nullable();;
//            $table->string("kelas");
            $table->Date('tanggal_lahir')->default(now())->nullable();;
            $table->Text("alamat")->nullable();

            $table->foreignId('kelas_id')->default(0);
            $table->foreignId('user_id')->default(0);
            $table->foreignId('extra_id')->default(0);


            $table->foreign("user_id")->on("users")->references("id");
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
