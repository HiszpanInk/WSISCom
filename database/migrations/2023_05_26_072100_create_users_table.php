<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('username', 30);
            $table->string('name', 60);
            $table->string('surname', 60);
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->boolean('confirmed')->default(true); //until mailer is setted up for now we gonna always assume email is confirmed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
