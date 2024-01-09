<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payroll_id',50);
            $table->string('employee_id',50);
            $table->integer('salary_id');
            $table->integer('deduction_id');
            $table->integer('allowance_id');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('working_days');
            $table->string('mode_of_payment',30);
            $table->string('type',20);
            $table->boolean('is_audited');
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
        Schema::dropIfExists('payrolls');
    }
};
