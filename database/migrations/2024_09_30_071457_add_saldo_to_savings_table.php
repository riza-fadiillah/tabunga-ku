<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        
        Schema::table('savings', function (Blueprint $table) {
            // Cek apakah kolom saldo sudah ada
            if (!Schema::hasColumn('savings', 'saldo')) {
                $table->decimal('saldo', 10, 2)->default(0); // Menambahkan kolom saldo
            }
        });
    }
    
    public function down()
    {
        Schema::table('savings', function (Blueprint $table) {
            // Hapus kolom saldo hanya jika ada
            if (Schema::hasColumn('savings', 'saldo')) {
                $table->dropColumn('saldo'); // Menghapus kolom saldo
            }
        });
    }
    
};
