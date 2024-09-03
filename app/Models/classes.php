<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected $fillable =[
        'major_id',
        'user_id',
        'name',
        'description',
    ];
}
