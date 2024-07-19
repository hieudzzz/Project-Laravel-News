<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->text('noiDung');
            $table->text('tomTat')->nullable();
            $table->dateTime('ngayDang');
            $table->integer('xem')->default(0);
            $table->string('image')->nullable(); // Cột cho hình ảnh
            $table->unsignedBigInteger('idLT');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('idLT')
                  ->references('id')
                  ->on('loaitins')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
}
