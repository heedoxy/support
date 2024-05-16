<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Main
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'content',
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
