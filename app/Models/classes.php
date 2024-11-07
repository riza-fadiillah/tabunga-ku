<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Majors;
use App\Models\User;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_id',
        'user_id',
        'name',
        'description',
    ];

    
    public function major(): BelongsTo
    {
        return $this->belongsTo(Majors::class);
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
