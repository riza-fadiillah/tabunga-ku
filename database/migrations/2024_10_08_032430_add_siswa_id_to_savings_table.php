<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiswaIdToSavingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void  
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->unsignedBigInteger('siswa_id')->after('user_id');
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
            $table->dropColumn('siswa_id');
        });
    }
}