<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title','slug'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
