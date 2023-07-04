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
        Schema::create('preservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 20);
            $table->dateTime('preservation_date');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preservation_id');
            $table->string('member_name', 10);
            $table->integer('position')->default(0);
            $table->BigInteger('money')->default(10000);
            $table->unsignedInteger('order')->default(0);
            $table->integer('finish')->default(0);
            $table->integer('card')->default(0);
            $table->foreign('preservation_id')->references('id')->on('preservations');
            $table->timestamps();
        });

        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->integer('money_flow')->default(0);
            $table->string('comment', 150);
            $table->integer('move')->default(0);
            $table->integer('rest')->default(0);
            $table->integer('color')->default(0);
            $table->integer('yellocard')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaces');
        Schema::dropIfExists('members');
        Schema::dropIfExists('preservations');
    }
};
