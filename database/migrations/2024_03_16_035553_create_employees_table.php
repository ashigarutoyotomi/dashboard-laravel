<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mid_name')->nullable();
            $table->integer('age')->default(18);
            $table->date('bday');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->date('employed_day');
            $table->date('fired_day')->nullable();
            $table->string('status')->default(0);
            $table->string('file_id')->nullable();
            $table->timestamps();
            $table->enum('sex', ['male', 'female', 'hermaphrodite']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
