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
        Schema::create('checkplus_logs', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('domain_group_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('dupinfo', 100);
            $table->string('requestnumber', 50);
            $table->string('responsenumber', 50);
            $table->string('authtype', 2);
            $table->string('name', 40);
            $table->string('mobileno', 20);
            $table->string('mobileco', 10)->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('nationalinfo', 2)->nullable();
            $table->tinyText('conninfo', 1)->nullable();
            $table->string('ip', 20)->nullable();
            $table->string('etc', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkplus_logs');
    }
};
