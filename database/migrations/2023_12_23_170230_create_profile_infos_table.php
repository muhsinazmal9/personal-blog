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
        Schema::create('profile_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrainedTo('users')->onDelete('cascade');
            $table->string('username')->nullable();
            $table->string('avatar')->nullable();
            $table->string('bio')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_infos');
    }
};
