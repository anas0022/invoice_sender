<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use APP\Models\users;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('clients_company_name');
            $table->string('attention_clients_name');
            $table->string('street_number_and_name_or_po_box');
            $table->string('state_and_post_code');
            $table->string('country');
            $table->date('invoice_date');
            $table->string('invoice_number');
            $table->string('reference_po')->nullable();
            $table->string('your_company_name');
            $table->string('your_street_number_and_name');
            $table->string('your_state_and_post_code');
            $table->string('total');
            $table->string('hours_worked');
            $table->string('wage_per_hour');
            $table->string('admin_time');
            $table->string('planning_time');
            $table->string('total_hour');
            $table->string('wage_owed');
            $table->json('items')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
