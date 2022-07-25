<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tugas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tugas_users', 'tugas_id', 'user_id')->withPivot('status');
    }

    public function usersCompleted(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tugas_users', 'tugas_id', 'user_id')->wherePivot('status', '=', 1);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class, 'submission_id');
    }

}
