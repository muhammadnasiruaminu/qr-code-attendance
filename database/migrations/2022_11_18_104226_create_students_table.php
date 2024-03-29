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
            $table->string('uuid',50)->unique();
            $table->string('names');
            $table->string('registration_number',50)->unique();
            $table->string('email')->unique();
            $table->enum('is_staff',[1,0])->default(0);
            $table->enum('is_verified',[1,0])->default(0);
            $table->enum('is_active',[1,0])->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
