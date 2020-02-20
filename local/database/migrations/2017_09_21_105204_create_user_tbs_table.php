<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tbs', function (Blueprint $table) {
          $table->increments('user_id');
          $table->string('user_type',10);
          $table->string('user_fullname',100);
          $table->string('user_sex',10);
          $table->string('user_identity',13);
          $table->date('user_birth_date');
          $table->string('user_img_identity');
          $table->string('user_img_account_home');
          $table->string('user_address');
          $table->string('user_province',50);
          $table->string('user_zipcode',10);
          $table->string('user_tell',15);
          $table->string('user_bank_name',50);
          $table->string('user_account',20);
          $table->string('user_account_name',100);
          $table->string('user_account_type',20);
          $table->string('user_account_branch',50);
          $table->string('user_account_province',50);
          $table->string('user_email');
          $table->string('user_username',20);
          $table->string('user_password_origin');
          $table->string('user_password');
          $table->integer('user_status_confirm')->default(0);
          $table->integer('user_status_ban')->default(0);
          $table->date('user_ban_date');
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
        Schema::dropIfExists('user_tbs');
    }
}
