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
       Schema::table('siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->after('nama');
            $table->unsignedBigInteger('major_id')->after('class_id');

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['major_id']);
            $table->dropColumn(['class_id', 'major_id']);
        });
    }
};
