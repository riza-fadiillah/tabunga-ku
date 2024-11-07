<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Savings extends Model
    {
        use HasFactory;

        
        protected $fillable = [
            'user_id',
            'siswa_id',
            'date',
            'deebit',
            'saldo',
            'note'
        ];
        

        // Relasi dengan tabel 'users'
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
        public function siswa()
        {
            return $this->belongsTo(Siswa::class, 'siswa_id');
        }

    }
