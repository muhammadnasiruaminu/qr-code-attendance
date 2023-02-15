<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',100)->unique();
            $table->string('course_uuid',100);
            $table->string('starts_at',100);
            $table->string('ends_at',100);
            $table->string('token',50);
            $table->enum('active_status',[1,0])->default(1);
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
        Schema::dropIfExists('create_attendances');
    }
}
