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
        Schema::table('services', function (Blueprint $table) {
            $table->string('service_name');
            $table->text('service_detail')->nullable();
            $table->string('service_image')->nullable();
            $table->string('service_location')->nullable();
            $table->string('service_rating')->nullable();
            $table->string('service_availability')->nullable();
            $table->string('service_payment_method')->nullable();
            $table->string('service_scheduling_policy')->nullable();
            $table->string('service_business_hour')->nullable();
            $table->string('service_email')->nullable();
            $table->string('service_phone')->nullable();
            $table->string('service_group');
            $table->string('service_employee_no')->nullable();
            $table->string('service_period_of_existence')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('service_name');
            $table->dropColumn('service_detail');
            $table->dropColumn('service_image');
            $table->dropColumn('service_location');
            $table->dropColumn('service_rating');
            $table->dropColumn('service_availability');
            $table->dropColumn('service_payment_method');
            $table->dropColumn('service_scheduling_policy');
            $table->dropColumn('service_business_hour');
            $table->dropColumn('service_email');
            $table->dropColumn('service_phone');
            $table->dropColumn('service_group');
        });
    }
};
