<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa'; 
    protected $fillable =[
        'user_id',
        'class_id',
        'major_id',
    ];
   
    public function savings()
    {
        return $this->hasMany(Savings::class, 'siswa_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
   
}
