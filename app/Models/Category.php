<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'title',
        'class',
    ];

    public function package() : BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo($this);
    }

}
