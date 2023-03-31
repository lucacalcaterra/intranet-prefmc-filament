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
            $table->string('surname');
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('qualifica_id')->unsigned()->nullable()->references('id')->on('qualifiche')->oneDelete('cascade');
            $table->integer('team_id')->unsigned()->nullable()->references('id')->on('teams')->oneDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            // custom
            $table->string('comune_nascita')->nullable();
            $table->char('provincia_nascita',2)->nullable();
            $table->date('data_nascita')->nullable();
            $table->char('sesso', 1)->nullable();
            $table->char('codice_fiscale',16)->nullable();
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
