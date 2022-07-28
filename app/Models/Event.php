<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
