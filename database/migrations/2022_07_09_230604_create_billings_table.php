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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->string('provider_detail');
            // $table->string('service_description');
            $table->text('service_description');
            $table->decimal('total_charge', 10, 2);
            $table->decimal('total_payment', 10, 2)->nullable();
            $table->decimal('total_adjustment', 10, 2)->nullable();
            $table->decimal('account_balance', 10, 2)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('due_date')->nullable();
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
        Schema::dropIfExists('billings');
    }
};
/**
 * 	1. statement_date -> created_at
 *	2. due_date
 *	3. service description
 *	4. total charges
 *	5. total payment and adjustments
 *	6. account balance
 *	7. status -> [ completed, incompleted]
 *	8. patient_id -> foreign id
 *	9. provider_id -> foreign id
 *
 * total charge : 800
 * total payment : -500
 * total adjustment: -200
 * account balance: 100
 * ( since account_balance != 0 -> status: incomplete)
 *
 *
 *
 *
*/