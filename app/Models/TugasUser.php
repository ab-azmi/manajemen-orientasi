<?php

namespace App\Models;

use App\Observers\TugasUserObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tugas_id',
        'user_id',
        'status'
    ];

}
