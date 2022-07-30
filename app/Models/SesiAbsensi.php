<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SesiAbsensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function absens(): HasMany
    {
        return $this->hasMany(Absensi::class);
    }

    
    /**
     * Get the user that owns the SesiAbsensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
