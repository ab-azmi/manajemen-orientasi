<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Tugas extends Model
{
    use HasFactory, HasSlug, HasRichText;

    protected $guarded = ['id'];
    protected $richTextFields = ['deskripsi'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
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
