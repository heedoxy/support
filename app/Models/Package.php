<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function category() : HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function tag() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
