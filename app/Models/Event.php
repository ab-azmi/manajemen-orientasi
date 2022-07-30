<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the event_day associated with the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function event_day(): BelongsTo
    {
        return $this->belongsTo(EventDay::class);
    }

    /**
     * Get all of the sesi_absens for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sesi_absens(): HasMany
    {
        return $this->hasMany(SesiAbsensi::class);
    }
}
