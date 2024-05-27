<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('reserve', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('users_id');
      $table->string('address');
      $table->string('packages');
      $table->timestamp('date')->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table
        ->foreign('users_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('reserve');
  }
};