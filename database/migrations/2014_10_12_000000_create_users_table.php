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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type',['normal user','maintenance technician']);
            $table->string('personal_photo');
            $table->string('telephone');
            $table->string('name_of_the_bank')->nullable();
            $table->string('account_number')->nullable();
            $table->string('residence_photo');
            $table->string('location');
            $table->enum('status',['Pending','Accepted','Denied'])->nullable();
            $table->rememberToken();
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
