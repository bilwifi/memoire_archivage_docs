<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



        Schema::create('departements', function (Blueprint $table) {
            $table->bigIncrements('iddepartements');
            $table->string('lib');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('iddocuments');
            $table->string('titre');
            $table->text('description')->nullable();
            $table->text('file');
            $table->unsignedBigInteger('iddepartements');
            $table->foreign('iddepartements')
                  ->references('iddepartements')->on('departements')->onDelete('cascade');
            $table->timestamps();
            

        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idusers');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->unsignedBigInteger('iddepartements');
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->foreign('iddepartements')
                  ->references('iddepartements')->on('departements')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('idadmins');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('pseudo')->unique();
            $table->string('password');
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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('departements');
    }
}
