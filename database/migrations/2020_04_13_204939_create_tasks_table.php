<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('phase');
            $table->string('company_name');
            $table->string('area');
            $table->date('received_date');
            $table->date('due_date');
            $table->string('category');
            $table->text('status');
            $table->string('status_person_in_charge');
            $table->date('status_date');
            $table->text('next');
            $table->string('next_person_in_charge');
            $table->date('next_date');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
