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
        Schema::create('loaitins', function (Blueprint $table) {
            $table->id();
            $table->string('tenLoai', 100)->unique();
            $table->integer('ThuTu')->default(0);
            $table->boolean('AnHien')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaitins');
    }
};
