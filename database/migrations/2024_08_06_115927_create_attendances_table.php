<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id'); // Add class_id if applicable
            $table->date('date');
            $table->enum('status', ['present', 'absent']);
            $table->timestamps();

       
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
