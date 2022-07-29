<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SesiAbsensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function absens(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }

    
    public function event(): HasOne
    {
        return $this->hasOne(Event::class);
    }
}
