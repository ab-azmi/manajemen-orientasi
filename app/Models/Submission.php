<?php

namespace App\Models;

use App\Observers\SubmissionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['date_submitted'];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tugas(): BelongsTo
    {
        return $this->belongsTo(Tugas::class);
    }
}
