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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->year('year_of_joining')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(2)->comment('1-Admin,2-User');
            $table->tinyInteger('blocked')->default(2)->comment('0-Approved,1-Rejected,2-Pending');
            $table->text('profile_image')->nullable();
            $table->string('name_org')->nullable();
            $table->string('designation')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('pincode',20)->nullable();
            $table->string('city')->nullable();
            $table->integer('state')->nullable();
            $table->string('ca_no')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('gender')->nullable();
            $table->string('marital_status',30)->nullable();
            $table->date('marriagn_ann')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('degree')->nullable();
            $table->integer('shared_status')->nullable();
            $table->text('wrk_area')->nullable();
            $table->text('subject')->nullable();
            $table->text('name_ngo')->nullable();
            $table->text('memory_gbc')->nullable();
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
        Schema::dropIfExists('users');
    }
};
