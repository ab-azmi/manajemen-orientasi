<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the sesi_absensi that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sesi_absensi(): BelongsTo
    {
        return $this->belongsTo(SesiAbsensi::class);
    }

    /**
     * Get the user that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
